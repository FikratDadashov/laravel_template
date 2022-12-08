<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\SlideText;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function __construct()
    {
        Cache::put('page', 'slide');
        $this->slides = Slide::all();
        $this->statuses = Status::all();
        $this->languages = Language::all();
        $this->setting = Setting::query()->first();

        $this->data = [
            'slides' => $this->slides,
            'languages' => $this->languages,
            'statuses' => $this->statuses,
            'setting' => $this->setting
        ];
    }

    public function index()
    {
        return view('admin.slide.index')->with($this->data);
    }

    public function create()
    {
        $this->data += [
            'operation' => 'create',
            'language_id' => $this->setting->default_language_id
        ];

        return view('admin.slide.create')->with($this->data);
    }

    public function store(Request $request)
    {
        $request->file('image')->store('/assets/uploads');

        try {
            $slide = new Slide();
            $slide->image = $request->file('image')->hashName();
            $slide->status_id = $request->status_id;
            $slide->save();
            $last_id = DB::getPdo()->lastInsertId();

            $slide_text = new SlideText();
            $slide_text->title = $request->title;
            $slide_text->text = $request->text;
            $slide_text->slide_id = $last_id;
            $slide_text->language_id = $this->setting->default_language_id;
            $slide_text->save();

            return redirect('admin/slide')->with('success', 'Slayd uğurla əlavə olundu!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $slide = Slide::query()->findOrFail($id);
        $this->data += [
            'slide' => $slide
        ];

        return view('admin.slide.edit')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        // validate form inputs with some rules
        $request->validate([
            'image' => ['required'],
            'status_id' => ['required']
        ]);

        $slide = Slide::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $slide->image);

        try {
            $slide->status_id = $request->status_id;

            if ($request->file('image')) {
                $request->file('image')->store('/assets/uploads');
                $slide->image = $request->file('image')->hashName();
                // kohne seklin olub olmamasina baxir varsa silir
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }

            $slide->save();

            return redirect("admin/slide")->with('success', 'Slaydda dəyişiklik uğurla tamamlandı!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit_text($id, $language_id)
    {
        $slide = Slide::query()->findOrFail($id);
        $language = Language::query()->findOrFail($language_id);
        $slide_text = $slide->text->where('language_id', $language_id)->first();

        $this->data += [
            'slide' => $slide,
            'slide_text' => $slide_text,
            'language_id' => $language_id
        ];

        return view('admin.slide.text_edit')->with($this->data);
    }

    public function update_text(Request $request, $id, $language_id)
    {
        // validate form inputs with some rules
        $request->validate([
          'title' => ['required'],
          'text' => ['required']
        ]);
        try {
            $slide_text = SlideText::query()->where('slide_id', $id)->where('language_id', $language_id)->firstOrNew();
            $slide_text->title = $request->title;
            $slide_text->text = $request->text;
            $slide_text->language_id = $language_id;
            $slide_text->slide_id = $id;
            $slide_text->save();
            return redirect("admin/slide")->with('success', 'Slaydda dəyişiklik uğurla tamamlandı!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $slide = Slide::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $slide->image);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        try {
            SlideText::where('slide_id', $id)->delete();
            Slide::destroy($id);
            return redirect('admin/slide')->with('success', 'Slayd müvəffəqiyyətlə silindi!');
        } catch (Exception $e) {
            return redirect('admin/slide')->with('error', 'Slayd silinə bilmədi - ' . $e->getMessage());
        }
    }

}

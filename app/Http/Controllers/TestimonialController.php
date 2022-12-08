<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\TestimonialText;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function __construct()
    {
        Cache::put('page', 'testimonial');
        $this->testimonials = Testimonial::all();
        $this->statuses = Status::all();
        $this->languages = Language::all();
        $this->setting = Setting::query()->first();

        $this->data = [
            'testimonials' => $this->testimonials,
            'languages' => $this->languages,
            'statuses' => $this->statuses,
            'setting' => $this->setting
        ];
    }

    public function index()
    {
        return view('admin.testimonial.index')->with($this->data);
    }

    public function create()
    {
        $this->data += [
            'operation' => 'create',
            'language_id' => $this->setting->default_language_id
        ];

        return view('admin.testimonial.create')->with($this->data);
    }

    public function store(Request $request)
    {
        $request->file('image')->store('/assets/uploads');

        try {
            $testimonial = new Testimonial();
            $testimonial->image = $request->file('image')->hashName();
            $testimonial->status_id = $request->status_id;
            $testimonial->save();
            $last_id = DB::getPdo()->lastInsertId();

            $testimonial_text = new TestimonialText();
            $testimonial_text->title = $request->title;
            $testimonial_text->text = $request->text;
            $testimonial_text->testimonial_id = $last_id;
            $testimonial_text->language_id = $this->setting->default_language_id;
            $testimonial_text->save();

            return redirect('admin/testimonial')->with('success', 'Müştəri rəyi uğurla əlave olundu');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        $this->data += [
            'testimonial' => $testimonial
        ];

        return view('admin.testimonial.edit')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        // validate form inputs with some rules
        $request->validate([
            'image' => ['required'],
            'status_id' => ['required']
        ]);

        $testimonial = Testimonial::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $testimonial->image);

        try {
            $testimonial->status_id = $request->status_id;

            if ($request->file('image')) {
                $request->file('image')->store('/assets/uploads');
                $testimonial->image = $request->file('image')->hashName();
                // kohne seklin olub olmamasina baxir varsa silir
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }

            $testimonial->save();

            return redirect("admin/testimonial")->with('success', 'Müştəri rəyində dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit_text($id, $language_id)
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        $language = Language::query()->findOrFail($language_id);
        $testimonial_text = $testimonial->text->where('language_id', $language_id)->first();

        $this->data += [
            'testimonial' => $testimonial,
            'testimonial_text' => $testimonial_text,
            'language_id' => $language_id
        ];

        return view('admin.testimonial.text_edit')->with($this->data);
    }

    public function update_text(Request $request, $id, $language_id)
    {
        // validate form inputs with some rules
        $request->validate([
          'title' => ['required'],
          'text' => ['required']
        ]);
        try {
            $testimonial_text = TestimonialText::query()->where('testimonial_id', $id)->where('language_id', $language_id)->firstOrNew();
            $testimonial_text->title = $request->title;
            $testimonial_text->text = $request->text;
            $testimonial_text->language_id = $language_id;
            $testimonial_text->testimonial_id = $id;
            $testimonial_text->save();
            return redirect("admin/testimonial")->with('success', 'Müştəri rəyində dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $testimonial->image);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        try {
            TestimonialText::where('testimonial_id', $id)->delete();
            Testimonial::destroy($id);
            return redirect('admin/testimonial')->with('success', 'Müştəri rəyi müvəffəqiyyətlə silindi');
        } catch (Exception $e) {
            return redirect('admin/testimonial')->with('error', 'Müştəri rəyi silinə bilmədi - ' . $e->getMessage());
        }
    }

}

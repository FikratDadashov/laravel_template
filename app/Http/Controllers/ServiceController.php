<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\Service;
use App\Models\ServiceText;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function __construct()
    {
        Cache::put('page', 'service');
        $this->services = Service::all();
        $this->statuses = Status::all();
        $this->languages = Language::all();
        $this->setting = Setting::query()->first();

        $this->data = [
            'services' => $this->services,
            'languages' => $this->languages,
            'statuses' => $this->statuses,
            'setting' => $this->setting
        ];
    }

    public function index()
    {
        return view('admin.service.index')->with($this->data);
    }

    public function create()
    {
        $this->data += [
            'operation' => 'create',
            'language_id' => $this->setting->default_language_id
        ];

        return view('admin.service.create')->with($this->data);
    }

    public function store(Request $request)
    {
        $request->file('image')->store('/assets/uploads');

        try {
            $service = new Service();
            $service->image = $request->file('image')->hashName();
            $service->status_id = $request->status_id;
            $service->save();
            $last_id = DB::getPdo()->lastInsertId();

            $service_text = new ServiceText();
            $service_text->title = $request->title;
            $service_text->text = $request->text;
            $service_text->service_id = $last_id;
            $service_text->language_id = $this->setting->default_language_id;
            $service_text->save();

            return redirect('admin/service')->with('success', 'Xidmət Ugurla Elave Olundu');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $service = Service::query()->findOrFail($id);
        $this->data += [
            'service' => $service
        ];

        return view('admin.service.edit')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        // validate form inputs with some rules
        $request->validate([
            'image' => ['required'],
            'status_id' => ['required']
        ]);

        $service = Service::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $service->image);

        try {
            $service->status_id = $request->status_id;

            if ($request->file('image')) {
                $request->file('image')->store('/assets/uploads');
                $service->image = $request->file('image')->hashName();
                // kohne seklin olub olmamasina baxir varsa silir
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }

            $service->save();

            return redirect("admin/service")->with('success', 'Xidmətdə dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit_text($id, $language_id)
    {
        $service = Service::query()->findOrFail($id);
        $language = Language::query()->findOrFail($language_id);
        $service_text = $service->text->where('language_id', $language_id)->first();

        $this->data += [
            'service' => $service,
            'service_text' => $service_text,
            'language_id' => $language_id
        ];

        return view('admin.service.text_edit')->with($this->data);
    }

    public function update_text(Request $request, $id, $language_id)
    {
        // validate form inputs with some rules
        $request->validate([
          'title' => ['required'],
          'text' => ['required']
        ]);
        try {
            $service_text = ServiceText::query()->where('service_id', $id)->where('language_id', $language_id)->firstOrNew();
            $service_text->title = $request->title;
            $service_text->text = $request->text;
            $service_text->language_id = $language_id;
            $service_text->service_id = $id;
            $service_text->save();
            return redirect("admin/service")->with('success', 'Xidmətdə dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $service = Service::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $service->image);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        try {
            ServiceText::where('service_id', $id)->delete();
            Service::destroy($id);
            return redirect('admin/service')->with('success', 'Xidmət müvəffəqiyyətlə silindi');
        } catch (Exception $e) {
            return redirect('admin/service')->with('error', 'Xidmət silinə bilmədi - ' . $e->getMessage());
        }
    }

}

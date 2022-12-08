<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\SettingText;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->setting = Setting::first();
        $this->languages = Language::all()->where('status',0);
        $this->data = [
            'setting' => $this->setting,
            'languages' => $this->languages
        ];
    }
    public function index(){
        return view('admin.setting.index', $this->data);
    }

    public function edit($id)
    {
        $setting = Setting::query()->findOrFail($id);
        $this->data += [
            'setting' => $setting,
            'operation'=>'edit'
        ];

        return view('admin.setting.crud')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::query()->findOrFail($id);
        $file_path = public_path().('/assets/uploads/'.$setting->logo);

        try {

            // kohne seklin olub olmamasina baxir varsa silir
            if (File::exists($file_path))
            {
                File::delete($file_path);
            }

            if ($request->file('image')) {
                $request->file('image')->store('/assets/uploads');
                $setting->logo = $request->file('image')->hashName();
            }
            $setting->telephone = $request->input('telephone');
            $setting->phone = $request->input('phone');
            $setting->instagram = $request->input('instagram');
            $setting->facebook = $request->input('facebook');
            $setting->whatsapp = $request->input('whatsapp');
            $setting->email = $request->input('email');


            $setting->save();

            return redirect("admin/setting")->with('success', 'Tənzimləmələrdə dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit_text($id, $language_id)
    {
        $setting = Setting::query()->findOrFail($id);
        $setting_text = $setting->text->where('language_id',$language_id)->first();
        $this->data += [
            'setting' => $setting,
            'setting_text' => $setting_text,
            'operation'=>'edit_text'
        ];

        return view('admin.setting.crud')->with($this->data);
    }

    public function update_text(Request $request, $id, $language_id)
    {
        // validate form inputs with some rules
        $request->validate([
            'address' => ['required'],
        ]);

        try {
            $setting_text = SettingText::query()->where('setting_id', $id)->where('language_id', $language_id)->first();
            $setting_text->address = $request->input('address');
            $setting_text->save();
            return redirect("admin/setting")->with('success', 'Tənzimləmələrdə dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

}

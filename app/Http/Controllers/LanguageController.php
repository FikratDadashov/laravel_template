<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Status;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{

    public function __construct()
    {
        Cache::put('page', 'language');

        $this->languages = Language::all();
        $this->statuses = Status::all();
        $this->setting = Setting::first();

        $this->data = [
            'languages' => $this->languages,
            'statuses' => $this->statuses,
            'setting' => $this->setting
        ];
    }

    public function index()
    {
        return view('admin.language.index', $this->data);
    }

    public function create()
    {
        $this->data += [
            'operation'=>'create'
        ];
        return view('admin.language.crud')->with($this->data);
    }

    public function store(Request $request)
    {
        // validate form inputs with some rules
        $request->validate([
            'status_id' => ['required'],
            'name' => ['required'],
            'shortname' => ['required'],
            'image' => ['required']
        ]);

        // create model entry with given inputs
        try {
            $request->file('image')->store('/assets/uploads');
            $language = new Language();
            $language->name = $request->name;
            $language->shortname = $request->shortname;
            $language->status_id = $request->status_id;
            $language->image = $request->file('image')->hashName();
            $language->save();

            return redirect('admin/language')->with('success', 'Dil əlavə olundu');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $language = Language::query()->findOrFail($id);
        $this->data += [
            'language' => $language,
            'operation'=>'edit'
        ];

        return view('admin.language.crud')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        // validate form inputs with some rules
        $request->validate([
            'status_id' => ['required'],
            'name' => ['required'],
            'shortname' => ['required']
        ]);

        $language = Language::query()->findOrFail($id);
        $file_path = public_path().('/assets/uploads/'.$language->image);

        try {

            $language->name = $request->name;
            $language->shortname = $request->shortname;
            $language->status_id = $request->status_id;
            // kohne seklin olub olmamasina baxir varsa silir
            if ($request->file('image'))
            {
                $request->file('image')->store('/assets/uploads');
                $language->image = $request->file('image')->hashName();
                if (File::exists($file_path)){
                    File::delete($file_path);
                }
            }
            $language->save();
            return redirect("admin/language")->with('success', 'Dildə dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $language = Language::query()->findOrFail($id);
        try {
            $file_path = public_path().('/assets/uploads/'.$language->image);
            // kohne seklin olub olmamasina baxir varsa silir
            if (File::exists($file_path))
            {
                File::delete($file_path);
            }

            Language::destroy($id);
            return redirect('admin/language')->with('success', 'Dil müvəffəqiyyətlə silindi');
        } catch (Exception $e) {
            return redirect('admin/language')->with('error', 'Dil silinə bilmədi - ' . $e->getMessage());
        }
    }


}

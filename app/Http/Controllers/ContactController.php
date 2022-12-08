<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactText;
use App\Models\Language;
use App\Models\Setting;
use App\Models\SettingText;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function __construct()
    {
        Cache::put('page', 'contact');
        $this->setting = Setting::query()->first();
        $this->contact = Contact::query()->first();
        $this->languages = Language::all();
        $this->data = [
            'setting' => $this->setting,
            'contact' => $this->contact,
            'languages' => $this->languages
        ];
    }
    public function index(){
        return view('admin.contact.index', $this->data);
    }

    public function edit($id)
    {
        $contact = Contact::query()->findOrFail($id);
        $this->data += [
            'contact' => $contact
        ];

        return view('admin.contact.edit')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::query()->findOrFail($id);
        // validate form inputs with some rules
        $request->validate([
            'mobile' => ['required'],
            'facebook' => ['required'],
            'instagram' => ['required'],
            'email' => ['required']
        ]);

        try {

            $contact->mobile = $request->mobile;
            $contact->instagram = $request->instagram;
            $contact->facebook = $request->facebook;
            $contact->email = $request->email;

            $contact->save();

            return redirect("admin/contact")->with('success', 'Əlaqə məlumatlarında dəyişiklik uğurla tamamlandı!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit_text($id, $language_id)
    {
        $contact = Contact::query()->findOrFail($id);
        $contact_text = $contact->text->where('language_id',$language_id)->first();
        $this->data += [
            'contact' => $contact,
            'contact_text' => $contact_text,
            'language_id' => $language_id
        ];

        return view('admin.contact.text_edit')->with($this->data);
    }

    public function update_text(Request $request, $id, $language_id)
    {
        // validate form inputs with some rules
        $request->validate([
            'address' => ['required'],
        ]);

        try {
            $contact_text = ContactText::query()->where('contact_id', $id)->where('language_id', $language_id)->firstOrNew();
            $contact_text->contact_id = $id;
            $contact_text->language_id = $language_id;
            $contact_text->address = $request->address;
            $contact_text->save();
            return redirect("admin/contact")->with('success', 'Əlaqə məlumatlarında dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Setting;
use App\Models\Blog;
use App\Models\BlogText;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function __construct()
    {
        Cache::put('page', 'blog');
        $this->blogs = Blog::all();
        $this->statuses = Status::all();
        $this->languages = Language::all();
        $this->setting = Setting::query()->first();

        $this->data = [
            'blogs' => $this->blogs,
            'languages' => $this->languages,
            'statuses' => $this->statuses,
            'setting' => $this->setting
        ];
    }

    public function index()
    {
        return view('admin.blog.index')->with($this->data);
    }

    public function create()
    {
        $this->data += [
            'operation' => 'create',
            'language_id' => $this->setting->default_language_id
        ];

        return view('admin.blog.create')->with($this->data);
    }

    public function store(Request $request)
    {
        $request->file('image')->store('/assets/uploads');

        try {
            $blog = new Blog();
            $blog->image = $request->file('image')->hashName();
            $blog->status_id = $request->status_id;
            $blog->save();
            $last_id = DB::getPdo()->lastInsertId();

            $blog_text = new BlogText();
            $blog_text->title = $request->title;
            $blog_text->text = $request->text;
            $blog_text->blog_id = $last_id;
            $blog_text->language_id = $this->setting->default_language_id;
            $blog_text->save();

            return redirect('admin/blog')->with('success', 'Blog uğurla əlave olundu');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $blog = Blog::query()->findOrFail($id);
        $this->data += [
            'blog' => $blog
        ];

        return view('admin.blog.edit')->with($this->data);
    }

    public function update(Request $request, $id)
    {
        // validate form inputs with some rules
        $request->validate([
            'image' => ['required'],
            'status_id' => ['required']
        ]);

        $blog = Blog::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $blog->image);

        try {
            $blog->status_id = $request->status_id;

            if ($request->file('image')) {
                $request->file('image')->store('/assets/uploads');
                $blog->image = $request->file('image')->hashName();
                // kohne seklin olub olmamasina baxir varsa silir
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }

            $blog->save();

            return redirect("admin/blog")->with('success', 'Blogda dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function edit_text($id, $language_id)
    {
        $blog = Blog::query()->findOrFail($id);
        $language = Language::query()->findOrFail($language_id);
        $blog_text = $blog->text->where('language_id', $language_id)->first();

        $this->data += [
            'blog' => $blog,
            'blog_text' => $blog_text,
            'language_id' => $language_id
        ];

        return view('admin.blog.text_edit')->with($this->data);
    }

    public function update_text(Request $request, $id, $language_id)
    {
        // validate form inputs with some rules
        $request->validate([
          'title' => ['required'],
          'text' => ['required']
        ]);
        try {
            $blog_text = BlogText::query()->where('blog_id', $id)->where('language_id', $language_id)->firstOrNew();
            $blog_text->title = $request->title;
            $blog_text->text = $request->text;
            $blog_text->language_id = $language_id;
            $blog_text->blog_id = $id;
            $blog_text->save();
            return redirect("admin/blog")->with('success', 'Blogda dəyişiklik uğurla tamamlandı.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $blog = Blog::query()->findOrFail($id);
        $file_path = public_path() . ('/assets/uploads/' . $blog->image);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        try {
            BlogText::where('blog_id', $id)->delete();
            Blog::destroy($id);
            return redirect('admin/blog')->with('success', 'Blog müvəffəqiyyətlə silindi');
        } catch (Exception $e) {
            return redirect('admin/blog')->with('error', 'Blog silinə bilmədi - ' . $e->getMessage());
        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Image;

class BlogController extends Controller
{
    //blog method
    public function all()
    {
        $items = Blog::where('status', '!=', 2)->latest()->paginate(15);
        return view('pages.blog.index', compact('items'));
    }

    //blog create method
    public function create()
    {
        return view('pages.blog.create');
    }

    //blog edit method
    public function edit($id)
    {
        $item = Blog::find($id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        return view('pages.blog.edit', compact('id', 'item'));
    }

    //blog store method
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'short_desc' => 'required|string',
            'desc' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
            'meta_og_thumb' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'meta_tags' => 'required|string',
            'meta_desc' => 'required|string',
        ]);

        //generate slug
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->input('title'));

        //get category name
        // $category = Blog::find($request->category);
        // $categoryName = $category->category;

        //create new service
        $item = new Blog();
        $item->title = $request->title;
        $item->slug = $slug;
        $item->desc = $request->desc;
        $item->short_desc = $request->short_desc;
        $item->meta_title = $request->meta_title;
        $item->meta_author = $request->meta_author;
        $item->meta_tags = $request->meta_tags;
        $item->meta_desc = $request->meta_desc;
        $item->status = 1;

        if ($request->hasFile('cover_photo')) {
            $image = $request->cover_photo;
            $input['imageName'] = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('uploads/img');
            $img = Image::make($image->getRealPath());
            $img->save($destination . '/' . $input['imageName'], 70);
            $item->cover_photo = 'uploads/img/' . $input['imageName'];
        }

        if ($request->hasFile('meta_og_thumb')) {
            $metaImage = $request->meta_og_thumb;
            $input['metaImageName'] = time() . '.' . $metaImage->getClientOriginalExtension();
            $metaDestination = public_path('uploads/img');
            $metaImg = Image::make($metaImage->getRealPath());
            $metaImg->save($metaDestination . '/' . $input['metaImageName'], 70);
            $item->meta_og_thumb = 'uploads/img/' . $input['metaImageName'];
        }
        // save service
        $item->save();
        // return success message with toaster
        toastr()->success('Blog created successfully');
        return redirect()->route('blog.all');
    }

    //blog update method
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'desc' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
            'meta_tags' => 'required|string',
            'meta_desc' => 'required|string',
            'status' => 'required',
        ]);

        $item = Blog::find($request->id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }

        if ($item->title !== $request->input('title')) {
            //generate slug
            $slug = SlugService::createSlug(Blog::class, 'slug', $request->input('title'));

            $item->slug = $slug;
        }

        $item->title = $request->input('title');
        $item->short_desc = $request->input('short_desc');
        $item->desc = $request->input('desc');
        $item->meta_title = $request->input('meta_title');
        $item->meta_author = $request->input('meta_author');
        $item->meta_tags = $request->input('meta_tags');
        $item->meta_desc = $request->input('meta_desc');
        $item->status = $request->input('status');

        // Handle file uploads
        if ($request->hasFile('cover_photo')) {
            $image = $request->cover_photo;
            $input['imageName'] = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('uploads/img');
            $img = Image::make($image->getRealPath());
            $img->save($destination . '/' . $input['imageName'], 70);
            $item->cover_photo = 'uploads/img/' . $input['imageName'];
        }

        if ($request->hasFile('meta_og_thumb')) {
            $metaImage = $request->meta_og_thumb;
            $input['metaImageName'] = time() . '.' . $metaImage->getClientOriginalExtension();
            $metaDestination = public_path('uploads/img');
            $metaImg = Image::make($metaImage->getRealPath());
            $metaImg->save($metaDestination . '/' . $input['metaImageName'], 70);
            $item->meta_og_thumb = 'uploads/img/' . $input['metaImageName'];
        }

        $item->save();
        // return success message with toaster
        toastr()->success('Blog updated successfully');
        return redirect()->route('blog.edit', ['id' => $request->id]);
    }

    //blog delete method
    public function delete(Request $request)
    {
        $item = Blog::find($request->id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        $item->status = '2';
        $item->save();

        toastr()->success('Blog deleted successfully');
        return redirect()->route('blog.all');
    }
}

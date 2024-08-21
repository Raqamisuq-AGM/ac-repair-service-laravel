<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Image;

class TeamController extends Controller
{
    //team method
    public function all()
    {
        $items = Team::latest()->paginate(15);
        return view('pages.team.index', compact('items'));
    }

    //team create method
    public function create()
    {
        return view('pages.team.create');
    }

    //team edit method
    public function edit($id)
    {
        $item = Team::find($id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        return view('pages.team.edit', compact('id', 'item'));
    }

    //team store method
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string',
            'facebook' => 'required|url|regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.+$/',
            'instagram' => 'required|url|regex:/^(https?:\/\/)?(www\.)?instagram\.com\/.+$/',
            'twitter' => 'required|url|regex:/^(https?:\/\/)?(www\.)?x\.com\/.+$/',
            'whatsapp' => 'required',
        ]);

        //generate slug
        $slug = SlugService::createSlug(Team::class, 'slug', $request->input('name'));

        //get category name
        // $category = Category::find($request->category);
        // $categoryName = $category->category;

        //create new team
        $item = new Team();
        $item->name = $request->name;
        $item->slug = $slug;
        $item->position = $request->position;
        $item->description = $request->description;
        $item->fb = $request->facebook;
        $item->instagram = $request->instagram;
        $item->twitter = $request->twitter;
        $item->whatsapp = $request->whatsapp;

        if ($request->hasFile('photo')) {
            $image = $request->photo;
            $input['imageName'] = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('uploads/img');
            $img = Image::make($image->getRealPath());
            $img->save($destination . '/' . $input['imageName'], 70);
            $item->photo = 'uploads/img/' . $input['imageName'];
        }
        // save team
        $item->save();
        // return success message with toaster
        toastr()->success('Team member created successfully');
        return redirect()->route('team.all');
    }

    //team update method
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'description' => 'required|string',
            'facebook' => 'required|url|regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.+$/',
            'instagram' => 'required|url|regex:/^(https?:\/\/)?(www\.)?instagram\.com\/.+$/',
            'twitter' => 'required|url|regex:/^(https?:\/\/)?(www\.)?x\.com\/.+$/',
            'whatsapp' => 'required',
        ]);

        //generate slug
        $slug = SlugService::createSlug(Team::class, 'slug', $request->input('name'));

        //get category name
        // $category = Category::find($request->category);
        // $categoryName = $category->category;

        //create new team
        $item = Team::find($request->id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }

        if ($item->name !== $request->input('name')) {
            //generate slug
            $slug = SlugService::createSlug(Team::class, 'slug', $request->input('name'));

            $item->update([
                'slug' => $slug,
            ]);
        }

        $item->name = $request->name;
        $item->position = $request->position;
        $item->description = $request->description;
        $item->fb = $request->facebook;
        $item->instagram = $request->instagram;
        $item->twitter = $request->twitter;
        $item->whatsapp = $request->whatsapp;

        if ($request->hasFile('photo')) {
            $image = $request->photo;
            $input['imageName'] = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('uploads/img');
            $img = Image::make($image->getRealPath());
            $img->save($destination . '/' . $input['imageName'], 70);
            $item->photo = 'uploads/img/' . $input['imageName'];
        }
        // save team
        $item->save();
        // return success message with toaster
        toastr()->success('Team member updated successfully');
        return redirect()->route('team.edit', ['id' => $item->id]);
    }

    //team delete method
    public function delete(Request $request)
    {
        $item = Team::find($request->id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        $item->delete();

        toastr()->success('Team deleted successfully');
        return redirect()->route('team.all');
    }
}

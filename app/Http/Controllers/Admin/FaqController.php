<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //faq method
    public function all()
    {
        $items = Faq::latest()->paginate(15);
        return view('pages.faq.index', compact('items'));
    }

    //faq create method
    public function create()
    {
        return view('pages.faq.create');
    }

    //faq edit method
    public function edit($id)
    {
        $item = Faq::find($id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        return view('pages.faq.edit', compact('id', 'item'));
    }

    //faq store method
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        //create new faq
        $item = new Faq();
        $item->ques = $request->question;
        $item->ans = $request->question;
        $item->save();

        // return success message with toaster
        toastr()->success('faq created successfully');
        return redirect()->route('faq.all');
    }

    //faq update method
    public function update(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        //create new faq
        $item = Faq::find($request->id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        $item->ques = $request->question;
        $item->ans = $request->question;
        $item->save();

        // return success message with toaster
        toastr()->success('faq updated successfully');
        return redirect()->route('faq.edit', ['id' => $request->id]);
    }

    //faq delete method
    public function delete(Request $request)
    {
        $item = Faq::find($request->id);
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        $item->delete();

        toastr()->success('faq deleted successfully');
        return redirect()->route('faq.all');
    }
}

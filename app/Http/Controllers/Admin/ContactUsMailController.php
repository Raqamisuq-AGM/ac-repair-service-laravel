<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMail;
use Illuminate\Http\Request;

class ContactUsMailController extends Controller
{
    //contact us mail method
    public function all()
    {
        $items = ContactUsMail::latest()->paginate(15);
        $counts = ContactUsMail::where('status', '0')->count();
        return view('pages.contact.index', compact('items', 'counts'));
    }

    //contact us mail view method
    public function view($id)
    {
        $item = ContactUsMail::where('id', $id)->first();
        if ($item == null) {
            toastr()->warning('Item not found');
            return redirect()->back();
        }
        $item->status = '1';
        $item->save();
        return view('pages.contact.view', compact('item'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //home index method
    public function index()
    {
        return view(themeView('index'));
    }

    //about method
    public function about()
    {
        return view(themeView('pages.about.index'));
    }

    //faq method
    public function faq()
    {
        return view(themeView('pages.faq.index'));
    }

    //contact method
    public function contact()
    {
        return view(themeView('pages.contact.index'));
    }

    //contact submit method
    public function contactSubmit(Request $request) {}

    //all service method
    public function allService()
    {
        return view(themeView('pages.service.index'));
    }

    //service details method
    public function serviceDetails()
    {
        return view(themeView('pages.service.details'));
    }

    //all team method
    public function allTeam()
    {
        return view(themeView('pages.team.index'));
    }

    //team details method
    public function teamDetails()
    {
        return view(themeView('pages.team.details'));
    }

    //all Blog method
    public function allBlog()
    {
        return view(themeView('pages.blog.index'));
    }

    //blog details method
    public function blogDetails()
    {
        return view(themeView('pages.blog.details'));
    }
}

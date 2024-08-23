<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactUsMail;
use App\Models\Faq;
use App\Models\Service;
use App\Models\SystemSeo;
use App\Models\SystemShortInfo;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //home index method
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->limit(3)->get();
        $teams = Team::orderBy('id', 'desc')->limit(4)->get();
        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        return view(themeView('index'), compact('services', 'teams', 'blogs', 'systemInfo', 'systemSeo'));
    }

    //about method
    public function about()
    {
        return view(themeView('pages.about.index'));
    }

    //faq method
    public function faq()
    {
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        $faqs = Faq::orderBy('id', 'desc')->get();
        return view(themeView('pages.faq.index'), compact('faqs', 'systemSeo', 'systemInfo'));
    }

    //contact method
    public function contact()
    {
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        return view(themeView('pages.contact.index'), compact('systemInfo', 'systemSeo'));
    }

    //contact submit method
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contactMail = new ContactUsMail();
        $contactMail->name = $request->input('name');
        $contactMail->email = $request->input('email');
        $contactMail->phone = $request->input('phone');
        $contactMail->subject = $request->input('subject');
        $contactMail->message = $request->input('message');
        $contactMail->status = '0';
        $contactMail->save();

        toastr()->success('Your message has been sent successfully. We will get back to you soon.');
        return back();
    }

    //all service method
    public function allService()
    {
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        $services = Service::orderBy('id', 'desc')->paginate(9);
        return view(themeView('pages.service.index'), compact('services', 'systemSeo', 'systemInfo'));
    }

    //service details method
    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        return view(themeView('pages.service.details'), compact('service', 'systemInfo'));
    }

    //all team method
    public function allTeam()
    {
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        $teams = Team::orderBy('id', 'desc')->paginate(9);
        return view(themeView('pages.team.index'), compact('teams', 'systemSeo', 'systemInfo'));
    }

    //team details method
    public function teamDetails($slug)
    {
        $team = Team::where('slug', $slug)->first();
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        return view(themeView('pages.team.details'), compact('team', 'systemInfo', 'systemSeo'));
    }

    //all Blog method
    public function allBlog()
    {
        $systemInfo = SystemShortInfo::where('id', '1')->first();
        $systemSeo = SystemSeo::where('id', '1')->first();
        $blogs = Blog::orderBy('id', 'desc')->paginate(9);
        return view(themeView('pages.blog.index'), compact('blogs', 'systemSeo', 'systemInfo'));
    }

    //blog details method
    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blogs = Blog::where('slug', '!=', $slug)->limit(5)->get();
        return view(themeView('pages.blog.details'), compact('blog', 'blogs'));
    }
}

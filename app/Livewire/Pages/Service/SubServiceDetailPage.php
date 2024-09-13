<?php

namespace App\Livewire\Pages\Service;

use App\Models\Service;
use App\Models\SubService;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Agent;
use App\Models\UserTraffic;
use App\Models\SystemInfo;

class SubServiceDetailPage extends Component
{
    public $slug;
    public $subServiceSlug;

    public function mount($slug, $subServiceSlug)
    {
        $this->slug = $slug;
        $this->subServiceSlug = $subServiceSlug;

        // Determine the IP address
        if (config('app.env') === 'production') {
            $ip = request()->ip();
        } else {
            $ip = '103.144.201.192'; // Use a default IP in non-production environment
        }

        // Get browser, platform, and device info using Agent
        $agent = new Agent();
        $browser = $agent->browser();
        $platform = $agent->platform();
        $device = $agent->device();

        // Get location information using Location package
        $location = Location::get($ip);

        // Prepare data for UserTraffic model
        $userTraffic = new UserTraffic();
        $userTraffic->visited_page = '/service' . '/' . $this->slug;
        $userTraffic->ip = $ip ?? null;
        $userTraffic->country = $location->countryName ?? null;
        $userTraffic->city = $location->cityName ?? null;
        $userTraffic->zip_code = $location->zipCode ?? null;
        $userTraffic->platform = $platform ?? null;
        $userTraffic->device = $device ?? null;
        $userTraffic->browser = $browser ?? null;
        // $userTraffic->countryCode = $location->countryCode ?? null;
        $userTraffic->save();
    }


    public function render()
    {
        $parentService = Service::where('slug', $this->slug)->first();
        $otherServices = Service::where('slug', '!=', $this->slug)->get();
        $service = SubService::where('slug', $this->subServiceSlug)->first();
        $systemInfo = SystemInfo::first();
        return view('pages.service.sub-service-details-page', compact('service', 'systemInfo', 'parentService', 'otherServices'))->layout('partials.app-layout');
    }
}

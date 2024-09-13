<?php

namespace App\Livewire\Pages\Other;

use App\Models\Service;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Agent;
use App\Models\UserTraffic;

class AboutPage extends Component
{
    public function mount()
    {
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
        $userTraffic->visited_page = '/about';
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

    public function placeholder()
    {
        return view('components.service.skeleton');
    }

    public function render()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('pages.other.about-page', compact('services'))->layout('partials.app-layout');
    }
}

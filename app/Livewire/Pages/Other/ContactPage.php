<?php

namespace App\Livewire\Pages\Other;

use App\Models\GuestUserMail;
use App\Models\SystemInfo;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Agent;
use App\Models\UserTraffic;

class ContactPage extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $phone = '';
    public $message = '';
    public $isSubmitting = false;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'message' => 'required|string|max:1000',
    ];

    // Custom validation messages (optional)
    protected $messages = [
        'name.required' => 'Name is required.',
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'subject.required' => 'Subject is required.',
        'phone.required' => 'Phone is required.',
        'message.required' => 'Message is required.',
    ];

    public function submitForm()
    {
        $this->isSubmitting = true;
        $this->validate();

        GuestUserMail::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => GuestUserMail::STATUS_UNREAD,
            'type' => GuestUserMail::TYPE_INCOMING,
        ]);

        $this->reset('email', 'phone', 'subject', 'subject', 'message');

        $this->isSubmitting = false;
    }

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
        $userTraffic->visited_page = '/contact';
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
        $systemInfo = SystemInfo::first();
        return view('pages.other.contact-page', compact('systemInfo'))->layout('partials.app-layout');
    }
}

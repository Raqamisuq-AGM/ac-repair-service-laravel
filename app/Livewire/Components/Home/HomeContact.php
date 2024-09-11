<?php

namespace App\Livewire\Components\Home;

use App\Models\GuestUserMail;
use Livewire\Component;

class HomeContact extends Component
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

        toastr()->success('Your message has been sent successfully! We will contact you soon');
    }

    public function render()
    {
        return view('components.home.home-contact');
    }
}

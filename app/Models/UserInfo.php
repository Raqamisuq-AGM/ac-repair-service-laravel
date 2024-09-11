<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'employee_id',
        'seller_id',
        'client_id',
        'buyer_id',
        'about',
        'phone',
        'address',
        'avatar',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'portfolio',
        'dribble',
        'github',
        'tiktok',
        'wechat',
        'whatsapp',
        'telegram',
        'skype',
        'youtube',
        'tubmlr',
        'medium',
        'twitch',
        'threads',
        'discord',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    // Relationship with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relationship with Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relationship with Buyer
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}

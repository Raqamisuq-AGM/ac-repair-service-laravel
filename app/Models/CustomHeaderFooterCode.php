<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomHeaderFooterCode extends Model
{
    use HasFactory;

    protected $fillable = ['header_code', 'footer_code'];
}

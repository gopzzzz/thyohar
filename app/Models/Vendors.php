<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = [
        'vendor_name',
        'phone_number',
        'mail_id',
        'address',
        'bio',
        'logo',
    ];
}
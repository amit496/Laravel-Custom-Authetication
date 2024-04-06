<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'contact', 'password', 'profile', 'dob' ,'email_varification_status', 'email_varification_date', 'status',];
}

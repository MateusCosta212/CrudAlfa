<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'contact', 'email'];

    public static $rules = [
        'name' => 'required|string|min:5',
        'contact' => 'required|digits:9|unique:contacts',
        'email' => 'required|email|unique:contacts'
    ];
}

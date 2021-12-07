<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['rep_id', 'name', 'email', 'phone', 'subject', 'content', 'reply', 'status'];
}

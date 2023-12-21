<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client'; // Specify the table name

    protected $fillable = [
        'name',
        'email',
        'google_id',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        // Add other fillable columns as needed
    ];

    // Your model's relationships, scopes, and other methods can be defined here
}
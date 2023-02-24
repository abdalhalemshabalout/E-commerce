<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'role_id',
        'name',
        'surname',
        'telephone',
        'email',
        'password',
        'image',
        'identity_number',
        'country_id',
        'gender',
        'address',
        'isActive',
        'isDeleted',
    ];
}

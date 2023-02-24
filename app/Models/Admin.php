<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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
        'isActive',
        'isDeleted'
    ];
}

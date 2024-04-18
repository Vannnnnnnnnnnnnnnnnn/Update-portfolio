<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;

    protected $fillable = ([

        'name',
        'role',
        'description',
       'month',
       'day',
       'year',
       'site',
       'course',
       'location',
       'age',
       'email',
       'phone',
       'freelance'
    ]);
}

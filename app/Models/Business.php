<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'website',
        'slug',
        'andress',
        'email',
        'contact',
        'categoryName',
        'subcategoryName',
        'country',
        'fax',
        'city',
        'image'
    ];
}

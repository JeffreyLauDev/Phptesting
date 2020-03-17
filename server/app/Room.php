<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $visible  = ['name', 'price','bedrooms','bathrooms','storeys','garages'];
    protected $fillable = ['name', 'price','bedrooms','bathrooms','storeys','garages'];
}

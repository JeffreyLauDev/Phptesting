<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $allowedFilteringParameters = ['name', 'price','bedrooms','bathrooms','storeys','garages'];
    public function index(Request $request)
    {
        
        echo $request;
        return Room::all();

    }

}

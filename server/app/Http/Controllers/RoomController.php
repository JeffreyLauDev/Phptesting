<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $allowedFilteringParameters = ['name', 'priceFrom','priceTo','bedrooms','bathrooms','storeys','garages'];
    public function index(Request $request, Room $room)
    {

        $room = $room->newQuery();
        if ($request->has('name')) {
            $name = $request->input('name');
            $room->where('name','LIKE' ,'%'.$name.'%');
        }
     
        if ($request->has('bedrooms')) {
            $room->where('bedrooms', $request->input('bedrooms'));
        }
        if ($request->has('bathrooms')) {
            $room->where('bathrooms', $request->input('bathrooms'));
        }
        if ($request->has('storeys')) {
            $room->where('storeys', $request->input('storeys'));
        }
        if ($request->has('garages')) {
            $room->where('garages', $request->input('garages'));
        }
        if ($request->has('priceFrom') && $request->has('priceTo')) {
             $room->whereBetween('price', array($request->input('priceFrom'),$request->input('priceTo')));           
        }    
        return $room->get();

    }

}

<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TestController extends Controller
{
    public function show()
    {
        $list = Restaurant::join('categories', 'categories.id', 'restaurants.category_id')
            ->select('categories.name_category as nameCategory', 'restaurants.*')
            ->get();
        return response()->json($list, Response::HTTP_OK);
    }
    public function index(Request $request)
    {
        if (!isset($request->search))
            $food = Restaurant::join('categories', 'categories.id', 'restaurants.category_id')
                ->select('categories.name_category as nameCategory', 'restaurants.*')
                ->get();
        else {
            $food = Restaurant::join('categories', 'categories.id', 'restaurants.category_id')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('price', '=',  $request->search)
                ->select('categories.name_category as nameCategory', 'restaurants.*')
                ->get();
        }
        return response()->json($food, Response::HTTP_OK);
    }
    public function statistical()
    {
        $count_category = Restaurant::join('categories', 'categories.id', 'restaurants.category_id')
            ->selectRaw('categories.name_category, count(*) as total')
            ->groupBy('categories.name_category')
            ->get();
            return response()->json($count_category, Response::HTTP_OK
        );
                  
}

    
    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
  public function index()
  {
    $foods = Food::select("id", "name", "description", "price", "img")->get();
    return view('list', [
      'foods' => $foods
    ]);
  }
}

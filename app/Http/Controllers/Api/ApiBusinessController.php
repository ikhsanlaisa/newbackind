<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\business;
use App\business_detail;
use App\menu;
use App\city;
use Auth;
use Storage;

class ApiBusinessController extends Controller
{
  public function getTourism()
  {
    $tourism = business::where('id_menu', 1)->get();
    return response()->json($tourism);
  }
  public function getHomestay()
  {
    $homestay = business::where('id_menu', 2)->get();
    return response()->json($homestay);
  }
}

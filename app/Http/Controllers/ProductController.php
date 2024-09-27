<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
	{
		return response()->json(['status' => true, 'data' => Product::all()]);
	}

}

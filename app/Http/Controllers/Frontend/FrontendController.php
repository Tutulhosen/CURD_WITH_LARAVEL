<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * load the index file
     */
    public function index()
    {
        $data= Product::latest()->get();
        return view('frontend.index', [
            'product_data'          =>$data
        ]);
    }









}

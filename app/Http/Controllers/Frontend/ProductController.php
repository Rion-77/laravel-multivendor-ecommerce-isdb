<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('frontend.products.show');
    }

    
}

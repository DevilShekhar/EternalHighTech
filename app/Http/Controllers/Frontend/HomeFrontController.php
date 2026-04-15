<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeFrontController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }
}
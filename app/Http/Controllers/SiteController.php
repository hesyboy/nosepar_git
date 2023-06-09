<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('site.index');
    }
    public function aboutUs(){
        return view('site.about-us');
    }
    public function contactUs(){
        return view('site.contact-us');
    }
}

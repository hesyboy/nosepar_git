<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return view('panel.notifications.index');
    }

    public function create(){
        return view('panel.notifications.create');
    }
}

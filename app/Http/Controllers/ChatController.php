<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ChatController extends Controller
{
    public function index()
    {
        $name = Redis::set('name','zgj');
    }
    public function show()
    {
        $name = Redis::get('name');
        dd($name);
    }
}

<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('manage.menu.index');
    }
}

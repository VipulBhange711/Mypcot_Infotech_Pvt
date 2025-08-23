<?php

namespace App\Http\Controllers;

class MyController extends Controller
{
    public function test()
    {
        return view('welcome');
    }

    public function AdminDash()
    {
        return view('adminDashboard');
    }

    public function CreateProject()
    {
        return view('product.createView');
    }

    public function ViewList()
    {
        return view('product.ListView');
    }
}

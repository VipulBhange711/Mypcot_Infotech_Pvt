<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function test(){
            return view('welcome');
    }
    public function AdminDash(){
            return view('adminDashboard');
    }
    public function AgentDash(){
            return view('agentDashboard');
    }
}

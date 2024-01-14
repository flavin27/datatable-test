<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard');
    }

    public function data() {
        $data = User::all();

        return DataTables::of($data)->make(true);
    }
}

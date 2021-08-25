<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $roles = \Spatie\Permission\Models\Role::all();

        return response($roles);
    }
}

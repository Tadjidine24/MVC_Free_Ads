<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(AdStore $request)
    {
        $validated = $request->validated();

        $ad = new Ad();
    }

}

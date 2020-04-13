<?php

namespace Controller;

class IndexController
{
    public function showIndex()
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
        // return View::make('index');
        return view('index');
    }

}
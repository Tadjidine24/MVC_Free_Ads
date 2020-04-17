<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showIndex()
    {
            echo "Bienvenue";
        return view('index');
        
    }

    public function showRegister(){
        return view('register');
    }
}
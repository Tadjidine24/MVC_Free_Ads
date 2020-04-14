<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function formulaire()
    {
        return view('inscription');
    }

    public function traitement()
    {
        return 'Traitement formulaire inscription';
        return 'Votre email est ' . request('email');
    }
}

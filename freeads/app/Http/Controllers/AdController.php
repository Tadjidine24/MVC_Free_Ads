<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdStore;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    use RegistersUsers;

    public function create()
    {
        return view('create');
    }
    public function store(AdStore $request)
    {
        $requests = $request->validated();

        // dd($requests);
        $ad = new Ad();

        $ad->title = $requests['title'];
        $ad->description = $requests['description'];
        $ad->price = $requests['price'];
        $ad->user_id = auth()->user()->id;
        $ad->save();

        return redirect()->route('welcome')->with('success', 'Votre annonce a été postée');
    }
    public function showListe()
    {
        $ads = DB::table('ads')->orderBy('created_at', 'DESC')->paginate(1);

        return view('ListeAds', compact('ads'));
    }

    public function search(Request $request)
    {
        $words = $request->words;

            $ads = DB::table('ads')
            ->where('title', 'LIKE', "%$words%")
            ->orWhere('description', 'LIKE', "%$words%")
            ->orWhere('price','LIKE', "%$words%")
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json(['success' => true, 'ads' => $ads]);
    }
 
}
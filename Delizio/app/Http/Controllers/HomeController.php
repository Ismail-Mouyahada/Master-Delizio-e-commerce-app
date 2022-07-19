<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recettes = Recette::where('user_id',Auth::user()->id)->get();

        return view('accueil', compact('recettes'));
    }

     public function adminView()
    {
        $dataUsers = User::orderBy('id')->cursorPaginate(10);
        $messages = Message::all();
        return view('user.admin', compact('dataUsers', 'messages'));
    }
}
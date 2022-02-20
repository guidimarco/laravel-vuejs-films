<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Film;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validation */
        $request->validate([
            'title' => 'required|max:50',
            'year' => 'required|max:50',
            'director' => 'required|max:50'
        ]);
        $form_data = $request->all();

        /* Create new film and save it */
        $new_restaurant = new Film();
        $new_restaurant->fill($form_data);
        $user_id = Auth::user()->id;
        $new_restaurant->user_id = $user_id;
        $new_restaurant->save();

        return redirect()->route('dashboard.home');
    }
}

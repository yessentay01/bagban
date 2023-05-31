<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Garden;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plants = Plant::all();
        $garden = Garden::where('user_id', '=', auth()->user()->id )->get();
        return view('pages.homepage.home', compact('plants', 'garden'));
    }
    public function store(Request $request){
        $check = Garden::where('user_id', '=', auth()->user()->id)
            ->where('plant_id', '=', $request->plant_id)
            ->get();
        if (count($check) > 0){
            return redirect()->route('home')->with('error', 'Error, You already have this plant!');
        }else{
            Garden::create([
                "user_id" => auth()->user()->id,
                "plant_id" => $request->plant_id,
            ]);
            return redirect()->route('home')->with('success', 'You have successfully added this plant');
        }

    }
}

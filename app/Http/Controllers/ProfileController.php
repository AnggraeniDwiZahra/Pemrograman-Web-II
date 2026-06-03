<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home() {
        $profile = Profile::first();
        return view('home', compact('profile'));
    }

    public function profile() {
        $profile = Profile::first();
        $experiences = Experience::all();
        return view('profile', compact('profile', 'experiences'));
    }

    public function experience() {
        $profile = Profile::first(); 
        $experiences = Experience::all();
        return view('experience', compact('profile', 'experiences'));
    }

    public function detail($number) {
        $experiences = Experience::all();
        
        if($number < 1 || $number > count($experiences)) {
            abort(404);
        }

        $experience = $experiences[$number - 1];

        return view('detail' . $number, compact('experience'));
    }
}
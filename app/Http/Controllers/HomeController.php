<?php

namespace App\Http\Controllers;

use App\Models\CandyBar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $candyBars = CandyBar::orderBy('rating', 'DESC')->paginate(12);

        $data = [
            'candyBars' => $candyBars,
        ];

        return view('home', $data);
    }
}

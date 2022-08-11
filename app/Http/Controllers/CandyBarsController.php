<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CandyBarRequest;
use App\Observers\CandyBarObserver;
use App\Models\CandyBar;

class CandyBarsController extends Controller
{
    public function __construct()
    {
        CandyBar::observe(new CandyBarObserver);
    }

    public function index()
    {
        return view('candy_bar.index');
    }

    public function create()
    {
        return view('candy_bar.create');
    }

    public function store(CandyBarRequest $request)
    {
        try {
            $inputs = $request->only(['image', 'name', 'rating']);
            $inputs['user_id'] = auth()->user()->id;

            CandyBar::create($inputs);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('Success', 'Candy bar added.');
    }


}

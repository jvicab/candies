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
        $candyBars = CandyBar::own()->orderBy('rating', 'DESC')->paginate(10);

        $data = [
            'candyBars' => $candyBars,
        ];

        return view('candy_bar.index', $data);
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

        return redirect()->route('candy_bar_list')->with('success', 'Candy bar added.');
    }

    public function edit(CandyBar $candyBar)
    {
        $data = [
            'candyBar' => $candyBar,
        ];

        return view('candy_bar.edit', $data);
    }

    public function update(CandyBar $candyBar, CandyBarRequest $request)
    {
        try {
            $candyBar->update($request->only(['image', 'name', 'rating']));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

        return redirect()->route('candy_bar_list')->withSuccess('Bandy bar updated.');
    }

    public function destroy(CandyBar $candyBar)
    {
        try {
            $candyBar->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }

        return redirect()->route('candy_bar_list')->withSuccess('Bandy bar deleted.');
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competitions::paginate(100);
        return view('competitions', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('add.createcompetitions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ref'=> 'required',
            'competition_name'=>'max:255',
            'start_date'=>'max:255',
            'end_date'=>'max:255',
            'prize_amount'=>'max:255',
            'description'=>'max:510'
        ]);

        Competitions::create($validatedData);
        return redirect('/competitions');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competitions $competitions)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($competition_id)
    {
        $competitions = Competitions::findOrFail($competition_id);
        return view('edit.editcompetitions', compact('competitions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $competition_id)
    {
        $competitions = Competitions::findOrFail($competition_id);

        $validatedData = $request->validate([
            'ref'=> 'required',
            'competition_name'=>'max:255',
            'start_date'=>'max:255',
            'end_date'=>'max:255',
            'prize_amount'=>'max:255',
            'description'=>'max:510'
        ]);


        $competitions->update($validatedData);
        return redirect('/competitions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($competition_id)
    {
        $competitions = Competitions::findOrFail($competition_id);
        $competitions->delete();
        return redirect('/competitions');
    }
}

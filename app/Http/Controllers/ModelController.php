<?php

namespace App\Http\Controllers;

use App\Models\ModelData;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = ModelData::paginate(100);
        return view('model', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add.createmodel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model_title'=> 'required',
            'author'=>'max:255',
            'url'=>'required|url|max:255',
            'description'=>'max:510'
        ]);

        ModelData::create($validatedData);
        return redirect('/model');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelData $modelData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $model = ModelData::findOrFail($id);
        return view('edit.editmodel', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = ModelData::findOrFail($id);

        $validatedData = $request->validate([
            'model_title'=> 'required',
            'author'=>'max:255',
            'url'=>'required|url|max:255',
            'description'=>'max:510'
        ]);

        $model->update($validatedData);
        return redirect('/model');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = ModelData::findOrFail($id);
        $model->delete();
        return redirect('/model');
    }
}

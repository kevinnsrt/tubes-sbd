<?php

namespace App\Http\Controllers;

use App\Models\Datasets;
use Illuminate\Http\Request;

class DatasetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('add.createdataset');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $validatedData = $request->validate([
            'model_title'=> 'required',
            'author'=>'max:255',
            'url'=>'required|url|max:255',
            'description'=>'max:510'
        ]);

        Datasets::create($validatedData);
        return redirect('/model');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $datasets = Datasets::paginate(100);
        return view('datasets', compact('datasets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_dataset)
    {
        $datasets = Datasets::findOrFail($id_dataset);
        return view('edit.editdataset',['datasets'=>$datasets]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id_dataset)
    {
        $datasets = Datasets::findOrFail($id_dataset);
        $validatedData = $request->validate([
            'dataset_name'=> 'required',
            'about_dataset'=>'max:255',
            'dataset_file'=>'required|url|max:255',
        ]);

        $datasets->update($validatedData);
        return redirect('/datasets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datasets $datasets)
    {
        //
    }
}

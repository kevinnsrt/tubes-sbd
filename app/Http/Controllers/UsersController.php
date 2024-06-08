<?php

namespace App\Http\Controllers;

use App\Models\Datasets;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('add.createusers');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'display_name'=> 'required',
            'tagline'=>'max:255',
            'pronouns'=>'max:255',
            'occupation'=>'max:255',
            'organization'=>'max:255',
            'location'=>'max:255',
            'bio'=>'max:510'
        ]);

        Users::create($validatedData);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = Users::paginate(100);
        return view('users', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $users = Users::findOrFail($user_id);
        return view('edit.editusers', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $users = Users::findOrFail($user_id);

        $validatedData = $request->validate([
            'display_name'=> 'required',
            'tagline'=>'max:255',
            'pronouns'=>'max:255',
            'occupation'=>'max:255',
            'organization'=>'max:255',
            'location'=>'max:255',
            'bio'=>'max:510'
        ]);

        $users->update($validatedData);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $users = Users::findOrFail($user_id);
        $users->delete();
        return redirect('/users');
    }

}

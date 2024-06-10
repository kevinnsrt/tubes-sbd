<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Models\ModelData;
use App\Models\Datasets;
use App\Models\Competitions;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //search model
    public function model(Request $request)
{

    $model = DB::table('models');


    if ($request->has('search')) {

        $searchQuery = '%'. $request->input('search'). '%';
        $model->where(function ($query) use ($searchQuery) {
            $query->where('id', 'like', $searchQuery)
                  ->orWhere('model_title', 'like', $searchQuery)
                  ->orWhere('author', 'like', $searchQuery)
                  ->orWhere('total_votes','like',$searchQuery)
                  ->orWhere('last_run_date','like',$searchQuery)
                  ->orWhere('url','like',$searchQuery)
                  ->orWhere('description','like',$searchQuery);
        });
    }


    $model = $model->paginate(100);


    return view('model', [
        'model' => $model,
        'search' => $request->input('search'),
    ]);
}


    public function datasets(Request $request)
    {
        $datasets = DB::table('datasets');


        if ($request->has('search')) {

            $searchQuery = '%'. $request->input('search'). '%';
            $datasets->where(function ($query) use ($searchQuery) {
                $query->where('id_dataset', 'like', $searchQuery)
                      ->orWhere('user_id', 'like', $searchQuery)
                      ->orWhere('dataset_name', 'like', $searchQuery)
                      ->orWhere('about_dataset','like',$searchQuery)
                      ->orWhere('dataset_file','like',$searchQuery)
                      ->orWhere('upVote','like',$searchQuery)
                      ->orWhere('usability','like',$searchQuery);
            });
        }


        $datasets = $datasets->paginate(100);


        return view('datasets', [
            'datasets' => $datasets,
            'search' => $request->input('search'),
        ]);
    }


    public function competitions(Request $request)
    {
        $competitions = DB::table('competitions');


        if ($request->has('search')) {

            $searchQuery = '%'. $request->input('search'). '%';
            $competitions->where(function ($query) use ($searchQuery) {
                $query->where('competition_id', 'like', $searchQuery)
                      ->orWhere('ref', 'like', $searchQuery)
                      ->orWhere('competition_name', 'like', $searchQuery)
                      ->orWhere('description','like',$searchQuery)
                      ->orWhere('start_date','like',$searchQuery)
                      ->orWhere('end_date','like',$searchQuery)
                      ->orWhere('prize_amount','like',$searchQuery);
            });
        }


        $competitions = $competitions->paginate(100);


        return view('competitions', [
            'competitions' => $competitions,
            'search' => $request->input('search'),
        ]);
    }

    public function users(Request $request)
    {
        $users = DB::table('users');


        if ($request->has('search')) {

            $searchQuery = '%'. $request->input('search'). '%';
            $users->where(function ($query) use ($searchQuery) {
                $query->where('user_id', 'like', $searchQuery)
                      ->orWhere('display_name', 'like', $searchQuery)
                      ->orWhere('tagline', 'like', $searchQuery)
                      ->orWhere('pronouns','like',$searchQuery)
                      ->orWhere('occupation','like',$searchQuery)
                      ->orWhere('organization','like',$searchQuery)
                      ->orWhere('location','like',$searchQuery)
                      ->orWhere('bio','like',$searchQuery);
            });
        }


        $users = $users->paginate(100);


        return view('users', [
            'users' => $users,
            'search' => $request->input('search'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Search $search)
    {
        //
    }
}

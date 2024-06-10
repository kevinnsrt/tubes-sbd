<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use App\Models\Dashboard;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // grafik 1 end
    $totalUsers = DB::table('users')->count();
    $totalDataset = DB::table('datasets')->count();
    $totalModel = DB::table('models')->count();
    $totalCompetitions = DB::table('competitions')->count();
    $totalData = $totalUsers + $totalDataset + $totalModel + $totalCompetitions;
    //grafik 1 end

    //grafik 4 start
    $teamCounts = Competitions::all();
    $totalTeam50k = 0;
    foreach ($teamCounts as $competition) {
        if (str_contains($competition->prize_amount, '$50,000')) {
            $totalTeam50k += $competition->team_count;
        }
    }
    $totalTeam100k = 0;
    foreach ($teamCounts as $competition) {
        if (str_contains($competition->prize_amount, '$100,000')) {
            $totalTeam100k += $competition->team_count;
        }
    }
    $totalTeam1000k = 0;
    foreach ($teamCounts as $competition) {
        if (str_contains($competition->prize_amount, '$1,048,576')) {
            $totalTeam1000k += $competition->team_count;
        }
    }
    $totalTeamKnowledge = 0;
    foreach ($teamCounts as $competition) {
        if (str_contains($competition->prize_amount, 'Knowledge')) {
            $totalTeamKnowledge += $competition->team_count;
        }
    }
    $totalTeamSwag = 0;
    foreach ($teamCounts as $competition) {
        if (str_contains($competition->prize_amount, 'Swag')) {
            $totalTeamSwag += $competition->team_count;
        }
    }
    //grafik 4 end

    //grafik 3 start
    $totalKnowledgeData = DB::table('competitions')
    ->where('prize_amount', 'Knowledge')
    ->count();

    $total50kData = DB::table('competitions')
    ->where('prize_amount', '$50,000')
    ->count();

    $total100kData = DB::table('competitions')
    ->where('prize_amount', '$100,000')
    ->count();

    $totalSwagData = DB::table('competitions')
    ->where('prize_amount', 'Swag')
    ->count();

    $total1000kData = DB::table('competitions')
    ->where('prize_amount', '$1,048,576')
    ->count();
    //grafik 3 start

    //grafik 2 start
    $models = DB::table('models')
    ->selectRaw("DATE(last_run_date) as date, COUNT(id) as total_models")
    ->whereYear('last_run_date', now()->year)
    ->groupBy("date")
    ->get();

    $lastrundate = [];
    foreach ($models as $model) {
    $date = Carbon::parse($model->date);
    $lastrundate[] = [
    'x' => $date->format('d M'),
    'y' => $model->total_models,
    ];
    }
    //grafik 2 end


    $businesstag = DB::table('datasets')
    ->join('dataset_tags', 'datasets.id_dataset', '=', 'dataset_tags.id_dataset')
    ->join('tags', 'dataset_tags.id_tag', '=', 'tags.id_tag')
    ->where('tags.tag_name', 'business')
    ->get();

$tabulartag = DB::table('datasets')
    ->join('dataset_tags', 'datasets.id_dataset', '=', 'dataset_tags.id_dataset')
    ->join('tags', 'dataset_tags.id_tag', '=', 'tags.id_tag')
    ->where('tags.tag_name', 'tabular')
    ->get();

//grafik 5 start
    $averagebusiness = $businesstag->avg('download_count');
    $averagetabular = $tabulartag->avg('download_count');

    //grafik 5 end

    // grafik 6 start
    $averagebusinessviews = $businesstag->avg('views');
    $averagetabularviews = $tabulartag->avg('views');
    // grafik 6 end

    // grafik 7 start
    $averagebusinessusability = $businesstag->avg('usability');
    $averagetabularusability = $tabulartag->avg('usability');
    // grafik 7 end



    return view('dashboard', ['totalUsers' => $totalUsers,'totalDataset' => $totalDataset,'totalModel' => $totalModel,'totalCompetitions' => $totalCompetitions,'totalData'=>$totalData,
    'LastRunDate'=>$lastrundate,'teamCounts'=>$teamCounts,'totalTeam50k'=>$totalTeam50k,'totalTeam100k'=>$totalTeam100k,
    'totalTeam1000k'=>$totalTeam1000k,
    'totalTeamKnowledge'=>$totalTeamKnowledge,
    'totalTeamSwag'=>$totalTeamSwag,
    'totalKnowledgeData'=>$totalKnowledgeData,
    'total50kData'=>$total50kData,
    'total100kData'=>$total100kData,
    'total1000kData'=>$total1000kData,
    'totalSwagData'=>$totalSwagData,
    'averagebusiness'=>$averagebusiness,
    'averagetabular'=>$averagetabular,
    'averagebusinessviews'=>$averagebusinessviews,
    'averagetabularviews'=>$averagetabularviews,
    'averagebusinessusability'=>$averagebusinessusability,
    'averagetabularusability'=>$averagetabularusability,

]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}

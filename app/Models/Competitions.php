<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    use HasFactory;
    protected $table = 'competitions';
    protected $primaryKey = 'competition_id';
    protected $fillable = [
        'ref','competition_name', 'description','start_date','end_date','prize_amount'
    ];
    public $timestamps = false;
}

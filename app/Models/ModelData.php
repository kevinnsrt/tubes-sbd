<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelData extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $primaryKey = 'id';
    protected $fillable = [
        'model_title', 'author','total_votes','last_run_date','url','location','description'
    ];
    public $timestamps = false;
}

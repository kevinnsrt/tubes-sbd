<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasets extends Model
{
    use HasFactory;
    protected $table = 'datasets';
    protected $primaryKey = 'id_dataset';
    protected $fillable = [
        'about_dataset', 'dataset_name','dataset_file',
    ];
}

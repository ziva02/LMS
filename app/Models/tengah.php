<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tengah extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "kantintengah";
    protected $primarykey = "id";
}

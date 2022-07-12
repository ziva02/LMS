<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denahsatuldua extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "satulantaidua";
    protected $primarykey = "id";
}

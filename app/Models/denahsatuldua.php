<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class denahsatuldua extends Model
{
    use HasFactory;

    protected $table = "satulantaidua";
    protected $primarykey = "id";
}

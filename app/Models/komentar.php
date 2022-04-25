<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class komentar extends Model
{
    use HasFactory;

    protected $table = "komentar";
    protected $primarykey = "id";
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class information extends Model
{
    use softDeletes;

    protected $table = "information";
    protected $primarykey = "id";
}

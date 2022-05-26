<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kantinsatusatu extends Model
{
    use HasFactory;

    protected $table = "jadwalkantinsatu";
    protected $primarykey = "id";
}

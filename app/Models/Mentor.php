<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $connection = 'mysql';

    // Properti $fillable untuk menentukan kolom yang dapat diisi secara massal
}

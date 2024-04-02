<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
   
    use HasFactory;

    protected $table = 'materi';
    protected $fillable = ['judul_materi', 'deskripsi_materi', 'course_id','file_materi'];
    protected $connection = 'mysql';
    public function links()
{
    return $this->hasMany(Link::class, 'course_id');
}
}

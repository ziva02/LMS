<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel yang digunakan
    protected $connection = 'mysql'; // Koneksi database

    protected $fillable = [
        'id_mentee',
        'name',
        'role',
        'email',
        'email_supervisior',
        'nama_dpp',
        'no_dpp',
        'password',
        'foto',
    ];
}

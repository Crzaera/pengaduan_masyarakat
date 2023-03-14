<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama',
        'telp'
    ];
}

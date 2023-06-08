<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'dosen';

    // public function bimbingan(){
    //     return $this->belongsToMany(Mahasiswa::class, 'bimbingan', 'dosen_1_id', 'mahasiswa_id');
    // }

    public function jadwal(){
        return $this->belongsToMany(Mahasiswa::class, 'jadwal', 'dosen_id', 'mahasiswa_id')
        ->withPivot([
            'status',
            'pertemuan',
            'waktu',
            'tanggal',
            'id',
            'catatan',
        ]);
    }

}

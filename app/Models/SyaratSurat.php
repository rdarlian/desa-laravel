<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SyaratSurat extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];


    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }
}

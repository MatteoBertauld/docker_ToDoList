<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    use HasFactory;

    protected $table = "liste";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        "content",
        "etat",
    ];

}

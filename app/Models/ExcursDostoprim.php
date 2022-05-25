<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursDostoprim extends Model
{
    use HasFactory;

    protected $table = "sight_dostoprim";
    
    protected $fillable = ['sight_id','dostoprim_id'];
}

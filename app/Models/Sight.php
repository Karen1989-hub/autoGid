<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dostoprim;

class Sight extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','address','time','complexity','type','distance','description','price','img'
    ];

    public function dostoprim(){
        return $this->belongsToMany(Dostoprim::class,'sight_dostoprim','sight_id','dostoprim_id');
    }
}


 
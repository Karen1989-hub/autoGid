<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DostoprimImage;

class Dostoprim extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','address','time','complexity','type','distance','description','price','img','latitude','longitude'
    ];

    public function dostoprimImage(){
        return $this->hasMany(DostoprimImage::class,'dostoprim_id');
    }
}

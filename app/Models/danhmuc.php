<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class danhmuc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function menu(){
        return $this->belongsToMany(hangsanxuat::class,'sanphams','category_id','menu_id');
    }
}


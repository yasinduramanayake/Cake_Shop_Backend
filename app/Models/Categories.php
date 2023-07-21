<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = ['catogory'];

    public function category()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['name'];

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }
}

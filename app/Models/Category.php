<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'company_id'];

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }
}

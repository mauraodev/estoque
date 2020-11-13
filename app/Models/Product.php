<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['name', 'description', 'value', 'amout', 'size', 'category_id'];

    protected $guarded = ['id'];

    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
}

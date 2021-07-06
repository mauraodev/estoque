<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    protected $table = "sales_item";

    protected $fillable = ['sale_id', 'product_id'];

    protected $guarded = ['id'];

    public $timestamps = false;
}

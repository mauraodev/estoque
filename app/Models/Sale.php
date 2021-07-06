<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";

    protected $fillable = ['id', 'client_id', 'value', 'company_id'];

    protected $guarded = ['id'];

    public $timestamps = false;
}

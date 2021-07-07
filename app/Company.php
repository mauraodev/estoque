<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $tables = 'companies';

    protected $fillable = ['name', 'api_token'];
}

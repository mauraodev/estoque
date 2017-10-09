<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model 
{
	protected $table = "produtos";
	protected $fillable = ['nome', 'descricao', 'valor', 'quantidade', 'tamanho'];
	protected $guarded = ['id'];

	public $timestamps = false;
}
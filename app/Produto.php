<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model 
{
	protected $table = "produtos";
	protected $fillable = ['nome', 'descricao', 'valor', 'quantidade', 'tamanho', 'categoria_id'];
	protected $guarded = ['id'];

	public $timestamps = false;

	public function categoria()
	{
		return $this->belongsTo('App\Categoria');
	}
}
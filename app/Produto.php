<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	protected $fillable = [
		'id_industria', 'nome', 'preco', 'quantidade'
	];
}
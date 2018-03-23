<?php

namespace HelpNow;

use Illuminate\Database\Eloquent\Model;

class ProblemaCadastro extends Model
{
    protected $table = 'problema_cadastro';
    protected $primarykey = 'idproblema';

    public $timestamps = false;
    
    protected $fillable = [
    	
    	'problema',
    	'descricao',
    	'status', 
    	'ativo'
    ];

    protected $guarded[];
}

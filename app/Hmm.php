<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hmm extends Model
{
    protected $table = 'hmms';
	protected $fillable = array('nama','kelas','jurusan','nilai','nilai1');
	public $timestamp = true;
}

<?php


class Jenis_Arsip extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jenis_arsip';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('jenis');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }

}
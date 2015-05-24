<?php


class Gudang extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gudang';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('gudang');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }

}
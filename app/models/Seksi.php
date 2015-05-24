<?php


class Seksi extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'seksi';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('seksi');
	
	public function arsip()
    {
        return $this->hasMany('Arsip');
    }

}
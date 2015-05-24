<?php


class Departemen extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departemen';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('departemen');
	
	public function kanwil()
    {
        return $this->hasMany('Kanwil');
    }

}
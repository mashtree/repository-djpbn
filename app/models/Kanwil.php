<?php


class Kanwil extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kanwil';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('kanwil', 'departemen');
	
	public function kantor()
    {
        return $this->hasMany('Kantor');
    }

    public function departemen()
    {
        return $this->belongsTo('Departemen');
    }

}
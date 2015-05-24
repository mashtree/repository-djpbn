<?php


class Kantor extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kantor';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('kantor', 'kanwil_id', 'alamat', 'telpon', 'fax', 'email');
	
	public function kanwil()
    {
        return $this->belongsTo('Kanwil');
    }

}
<?php

class Kategori extends Eloquent{

	protected $table = "category";

	public static function get_where($where){
		$data = self::whereRaw($where)->get();
		return $data;
	}
}
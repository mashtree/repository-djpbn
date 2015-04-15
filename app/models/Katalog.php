<?php

class Katalog extends Eloquent{
	
	protected $table = 'katalog';

	public static function get_katalog($kategori){
		//$data = self::where('category','=',$kategori)
		//		->orderBy('created_at')
		//		->get();
		$data = DB::table('katalog')
				->join('category','katalog.category','=','category.id')
				->where('katalog.category','=',$kategori)
				->orderBy('katalog.created_at')
				->get(array(
						'katalog.id','katalog.title','category.categoryname','katalog.summary',
						'katalog.filesize','katalog.filetype')
					);
		return $data;
	}
}
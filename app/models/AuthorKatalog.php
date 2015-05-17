<?php

class AuthorKatalog extends Eloquent{
	
	protected $table = 'author_katalog';

	public static function get_author_katalog($id_katalog){
		$data = self::join('author','author.id','=','author_katalog.author')
				->where('author_katalog.idKatalog','=',$id_katalog)
				->get(array('author.id','author.authorname'));
		return $data;
	}
}
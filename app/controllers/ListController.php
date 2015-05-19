<?php

class ListController extends BaseController{

	public function callList($kategori){
		$kat = Kategori::get_where('categoryname="'.$kategori.'"');
		$data = Katalog::get_katalog($kat[0]->id);
		return View::make('front.list')->with('data',$data);
	}

	public function author($id){
		$author = Author::find($id);
		$books = DB::table('katalog')
				->join('author_katalog','katalog.id','=','author_katalog.idkatalog')
				->where('author_katalog.author','=',$id)
				->get(array('katalog.title','katalog.release','katalog.id'));
		return View::make('front.author',compact('author','books'));
	}

	public function book($id){
		$book = DB::table('katalog')
				->leftjoin('publisher','katalog.publisher','=','publisher.id')
				->where('katalog.id','=',$id)
				->get(array('katalog.id','katalog.title','katalog.summary','katalog.release',
				'katalog.numpage','katalog.ISBN','publisher.publishername','katalog.img'));
		//var_dump($book);
		$authors = AuthorKatalog::get_author_katalog($id);
		return View::make('front.book', compact('book','authors'));
	}

	public function read($id){
		$book = DB::table('katalog')
				->leftjoin('publisher','katalog.publisher','=','publisher.id')
				->where('katalog.id','=',$id)
				->get(array('katalog.id','katalog.title','katalog.release',
				'katalog.numpage','publisher.publishername','katalog.file','katalog.ISBN'));
		$authors = AuthorKatalog::get_author_katalog($id);
		return View::make('front.read',compact('book','authors'));
	}

	public function watch($id){
		$video = DB::table('katalog')
				->leftjoin('publisher','katalog.publisher','=','publisher.id')
				->where('katalog.id','=',$id)
				->get(array('katalog.id','katalog.title','katalog.release',
				'katalog.numpage','publisher.publishername','katalog.file','katalog.ISBN'));
		$authors = AuthorKatalog::get_author_katalog($id);
		return View::make('front.watch',compact('video','authors'));
	}

	public function pratinjau(){
		return View::make('front.read');
	}

}
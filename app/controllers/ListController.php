<?php

class ListController extends BaseController{

	public function callList($kategori){
		$kat = Kategori::get_where('categoryname="'.$kategori.'"');
		$data = Katalog::get_katalog($kat[0]->id);
		return View::make('front.list')->with('data',$data);
	}

	public function author(){
		return View::make('front.author');
	}

	public function book(){
		return View::make('front.book');
	}

	public function read(){
		return View::make('front.read');
	}

	public function watch(){
		return View::make('front.watch');
	}

	public function pratinjau(){
		return View::make('front.read');
	}

}
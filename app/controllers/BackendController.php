<?php

class BackendController extends BaseController{

	public function callList($kategori){
		$kat = Kategori::get_where('categoryname="'.$kategori.'"');
		$data = Katalog::get_katalog($kat[0]->id);
		return View::make('front.list');
	}

	public function addKatalog(){
		$kat = Kategori::all();
		$kategori = array();
		foreach ($kat as $key => $value) {
			$kategori[$value->id] = $value->categoryname;
		}
		$year = array();
		for($i=((int) date('Y'))-30;$i<=(int) date('Y');$i++){
			$year[$i] = $i;
		}

		if(Input::has('submit')){
			$validator = array(
							'title' => 'required',
							'category' => 'required',
							'summary' => 'required',
							'release' => 'required',
							'numpage' => 'required'
						);
			$validator = Validator::make(
							Input::all(),$validator
						);
			if($validator->passes()){

			}else{

			}

		}
		return View::make('admin.katalog')->with(array('kat'=>$kategori,'year'=>$year));
	}

	public function getAuthor(){
		$data = Author::all();
		$author = array();
		foreach ($data as $key => $value) {
			$author[$value->id] = array('name'=>$value->authorname,'nip'=>$value->nip);
		}

		echo json_encode($author);
	}

	public function addAuthor(){

		$file = $_FILES['foto'];
		if($file['name']!=''){
			$ext = explode('.', $file['name']);
			$name = 'foto_'.rand().'.'.end($ext);
			move_uploaded_file($file['tmp_name', 'public/image/'.$name);
		}else{
			$name = NULL;
		}
		$author = new Author();
		$author->authorname = Input::get('authorname');
		$author->nip = Input::get('nip');
		$author->authorid = Input::get('idp');
		$author->phone = Input::get('phone');
		$author->address = Input::get('address');
		$author->office = Input::get('office');
		$author->foto = $name;
		if($author->save()) return true;
		return false;
	}

}
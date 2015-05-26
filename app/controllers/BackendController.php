<?php

class BackendController extends BaseController{

	public function callList($kategori){
		$kat = Kategori::get_where('categoryname="'.$kategori.'"');
		$data = Katalog::get_katalog($kat[0]->id);
		return View::make('front.list');
	}

	public function katalog(){
		$kat = DB::table('katalog')
				->join('category','katalog.category','=','category.id')
				->orderBy('katalog.created_at','desc')
				->get(array('katalog.id','katalog.title','katalog.release','category.categoryname'));
		$act = 'list';
		$no = 1;
		return View::make('admin.katalog',compact('kat','act','no'));
	}
	
	public function addKatalog(){
		$kat = Kategori::all();
		$author = Author::all();
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
				//file
				if(Input::hasFile('file')){
					$doc = Input::file('file');
					$filename = $doc->getClientOriginalName();
					$nama = rand().'_'.$filename;
					$destinationPath = public_path('file/');
					$uploadSuccess = Input::file('file')->move($destinationPath, $nama);
					/*$file = $_FILES['file'];
					$nama = rand().'_'.$file['name'];
					move_uploaded_file($file['tmp_name'], 'file/'.$nama);*/
				}else{
					$nama = '';
				}
				//kover
				if(Input::hasFile('kover')){
					$doc = Input::file('kover');
					$filename = $doc->getClientOriginalName();
					$img = rand().'_'.$filename;
					$destinationPath = public_path('image/cover/');
					$uploadSuccess = Input::file('kover')->move($destinationPath, $img);
				}else{
					$img = '';
				}
				
				$katalog = new Katalog();
				$katalog->title = Input::get('title');
				$katalog->category = Input::get('category');
				$katalog->summary = Input::get('summary');
				$katalog->filesize = $file['size'];
				$katalog->filetype = $file['type'];
				$katalog->release = Input::get('release');
				$katalog->numpage = Input::get('numpage');
				$katalog->ISBN = Input::get('isbn');
				$katalog->file = $nama;
				$katalog->img = $img;
				$katalog->save();
				foreach (Input::get('author') as $key => $value) {
					$authkatalog = new AuthorKatalog();
					$authkatalog->idKatalog = $katalog->id;
					$authkatalog->author = $value;
					$authkatalog->save();
				}
				return Redirect::to('admin/katalog')->with('sukses','rekam katalog sukses');
			}else{
				return Redirect::to('admin/katalog')
						->withInput()
						->withErrors($validator);
			}

		}else{
			return View::make('admin.katalog')->with(array('kat'=>$kategori,'year'=>$year,'author'=>$author,'act'=>'add'));
		}
	}
	
	public function like(){
		if(Input::has('like')){
			$katalog = Katalog::find(Input::get('id'));
			$katalog->like = Input::get('like');
			$katalog->save();
		}
	}
	
	public function author(){
		$author = Author::all(); 
		$act = 'list';
		$no = 0;
		return View::make('admin.author',compact('act','author','no'));
	}
	
	public function getAuthor(){
		$data = Author::all();
		$author = array();
		foreach ($data as $key => $value) {
			$author[$value->id] = array('id'=>$value->id,'name'=>$value->authorname,'nip'=>$value->nip);
		}

		echo json_encode($author);
	}

	public function addAuthor(){
		$act = 'add';
		if(Input::has('submit')){
			$validator = Validator::make(
					Input::all(),
					array(
							'authorname' 	=> 'required',
							'nip'			=> 'numeric',
							'phone'			=> 'required',
							'address'		=> 'required',
							'office'		=> 'required',
							'birthplace'	=> 'required',
							'birthdate'		=> 'required'
						)
				);
			if($validator->passes()){
				$file = $_FILES['foto'];
				if($file['name']!=''){
					$ext = explode('.', $file['name']);
					$name = 'foto_'.rand().'.'.end($ext);
					move_uploaded_file($file['tmp_name'], 'image/'.$name);
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
				$author->about = Input::get('about');
				$author->birthplace = Input::get('birthplace');
				$author->birthdate = Input::get('birthdate');
				$author->save();
				return Redirect::to('admin/rkmauthor')->with('sukses','###');
			}else{
				return Redirect::to('admin/rkmauthor')
							->withErrors($validator)
							->withInput();
			}
			
		}else{
			return View::make('admin.author',compact('act'));
		}
		//if($author->save()) 
		//return json_encode(array('success'=>1));
		//return json_encode(array('success'=>0));
	}
	
	public function delAuthor($id){
		$author = Author::find($id);
		$author->delete(); //remove from author table
		$author_katalog = AuthorKatalog::where('author','=',$id)->get();
		$author_katalog->delete();//remove data from author_katalog table
		return Redirect::to('admin/author');
		
	}
	
	public function publisher(){
		$publisher = Publisher::all();
		$act = 'list';
		return View::make('admin.publisher',compact('act','publisher'));
	}
	
	public function addPublisher(){
		$act = 'add';
		if(Input::has('submit')){
			$rules = array(
							'username'=>'required',
							'phone'=>'required',
							'email'=>'required|email',
							'address'=>'required'
						);
			
			$validator = Validator::make(Input::all(),$rules);
			
			if($validator->passes()){
				$pb = new Publisher();
				$pb->publishername = Input::get('publishername');
				$pb->phone = Input::get('phone');
				$pb->email = Input::get('email');
				$pb->address = Input::get('address');
				$pb->save();
				return Redirect::to('admin/publisher')->with('sukses','rekam data berhasil!');
			}else{
				return Redirect::to('admin/publisher')
							->withInput()
							->withErrors($validator);
			}
		}else{
			return View::make('admin.publisher',compact('act'));
		}
		
		//return Redirect::to('admin/publisher')->with('error','illegal operation!!!');
	}
	
	public function tag(){
		$act = 'list';
		return View::make('admin.tag');
	}
	
	public function addTag(){
		$act = 'add';
		if(Input::has('submit')){
			$tag = new Tag();
			$tag->tag = Input::get('tag');
			$tag->save();
			return Redirect::to('admin/tag')->with('sukses','rekam data berhasil!');
		}else{
			return View::make('admin.tag');
		}
		
		//return Redirect::to('admin/tag')->with('error','illegal operation!!!');
	}
	
	public function addArtikel(){
		$act = 'add';
		$author = Author::all();
		$tags = Tag::all();
		if(Input::has('submit')){
			$rules = array(
						'title' => 'required',
						'tag'	=> 'required',
						'content' =>'required'
					);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->passes()){
				$katalog = new Katalog();
				$katalog->title = Input::get('title');
				$katalog->category = 3;
				$katalog->summary = Input::get('content');
				$katalog->release = date('Y');
				$katalog->save();
				foreach(Input::get('author') as $value){
					$author = new AuthorKatalog();
					$author->idkatalog = $katalog->id;
					$author->author = $value;
					$author->save();
				}
				return Redirect::to('admin/rkmartikel')->width('sukses','Berhasil rekam Artikel!');
			}else{
				return Redirect::to('admin/rkmartikel')
							->withInput()
							->withErrors($validator);
			}
		}else{
			return View::make('admin.artikel',compact('act','author','tags'));	
		}
	}
	
	public function user(){
		$users = User::all();
		$act = 'list';
		return View::make('admin.user',compact('users','act'));
	}
	public function addUser(){
		$role = array(1=>'admin',2=>'contributor',3=>'viewer');
		$act = 'add';
		if(Input::has('submit')){
			$rules = array();
			$validator = Validator::make(Input::all(),$rules);
			if($validator->passes()){
				return Redirect::to('admin/rkmuser')->with('sukses','Rekam data User berhasil!');
			}else{
				return Redirect::to('admin/rkmuser')
							->withErrors($validator)
							->withInput();
			}
		}
		return View::make('admin.user',compact('role','act'));
	}
	
	

}
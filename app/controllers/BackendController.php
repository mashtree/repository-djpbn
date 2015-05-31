<?php

class BackendController extends BaseController{

	public function home(){
		return View::make('admin.home');
	}
	
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
		$publ = Publisher::all();
		$publisher = array();
		foreach($publ as $key => $value){
			$publisher[$value->id] = $value->publishername;
		}

		if(Input::has('submit')){
			if(Input::has('youtube')){
				$validator = array(
							'title' => 'required',
							'category' => 'required',
							'summary' => 'required',
							'release' => 'required',
							'numpage' => 'required'
						);
			}else{
				$validator = array(
							'title' => 'required',
							'category' => 'required',
							'summary' => 'required',
							'release' => 'required',
							'numpage' => 'required',
							'file'	=> 'mimes:pdf,mp4|max:20000',
							'cover'	=> 'mimes:jpg,jpeg,png|max:5000'
						);
			}
			
			$validator = Validator::make(
							Input::all(),$validator
						);
			if($validator->passes()){
				//file
				if(Input::hasFile('file')){
					$doc = Input::file('file');
					$filename = $doc->getClientOriginalName();
					$nama = rand().'_'.$filename;
					$size = Input::file('file')->getSize();
					$type = Input::file('file')->getMimeType();
					//$size = $_FILES['file']['size'];
					//$type = $_FILES['file']['type'];
					$destinationPath = public_path('file/');
					$uploadSuccess = Input::file('file')->move($destinationPath, $nama);
					/*$file = $_FILES['file'];
					$nama = rand().'_'.$file['name'];
					move_uploaded_file($file['tmp_name'], 'file/'.$nama);*/
				}else{
					$nama = Input::get('youtube');
					$size = '';
					$type = '';
				}
				//kover
				if(Input::hasFile('cover')){
					$doc = Input::file('cover');
					$filename = $doc->getClientOriginalName();
					$img = rand().'_'.$filename;
					$destinationPath = public_path('image/cover/');
					$uploadSuccess = Input::file('cover')->move($destinationPath, $img);
				}else{
					$img = '';
				}
				
				$katalog = new Katalog();
				$katalog->title = Input::get('title');
				$katalog->category = Input::get('category');
				$katalog->summary = Input::get('summary');
				$katalog->filesize = $size;
				$katalog->filetype = $type;
				$katalog->release = Input::get('release');
				$katalog->numpage = Input::get('numpage');
				$katalog->ISBN = Input::get('isbn');
				$katalog->file = $nama;
				$katalog->publisher = Input::get('publisher');
				$katalog->img = $img;
				$katalog->like = 0;
				$katalog->save();
				foreach (Input::get('author') as $key => $value) {
					$authkatalog = new AuthorKatalog();
					$authkatalog->idKatalog = $katalog->id;
					$authkatalog->author = $value;
					$authkatalog->save();
				}
				return Redirect::to('admin/rkmkatalog')->with('sukses','rekam katalog sukses');
			}else{
				return Redirect::to('admin/rkmkatalog')
						->withInput()
						->withErrors($validator);
			}

		}else{
			return View::make('admin.katalog')->with(array('kat'=>$kategori,'publisher'=>$publisher,'year'=>$year,'author'=>$author,'act'=>'add'));
		}
	}
	
	public function editKatalog(){
		$kat = Kategori::all();
		$author = Author::all();
		$act = 'edit';
		$kategori = array();
		foreach ($kat as $key => $value) {
			$kategori[$value->id] = $value->categoryname;
		}
		$year = array();
		for($i=((int) date('Y'))-30;$i<=(int) date('Y');$i++){
			$year[$i] = $i;
		}
		$publ = Publisher::all();
		$publisher = array();
		foreach($publ as $key => $value){
			$publisher[$value->id] = $value->publishername;
		}

		if(Input::has('submit')){
			if(Input::has('youtube')){
				$validator = array(
							'title' => 'required',
							'category' => 'required',
							'summary' => 'required',
							'release' => 'required',
							'numpage' => 'required'
						);
			}else{
				$validator = array(
							'title' => 'required',
							'category' => 'required',
							'summary' => 'required',
							'release' => 'required',
							'numpage' => 'required',
							'file'	=> 'mimes:pdf,mp4|max:20000',
							'cover'	=> 'mimes:jpg,jpeg,png|max:5000'
						);
			}
			
			$validator = Validator::make(
							Input::all(),$validator
						);
			if($validator->passes()){
				//file
				if(Input::hasFile('file')){
					$doc = Input::file('file');
					$filename = $doc->getClientOriginalName();
					$nama = rand().'_'.$filename;
					$size = Input::file('file')->getSize();
					$type = Input::file('file')->getMimeType();
					//$size = $_FILES['file']['size'];
					//$type = $_FILES['file']['type'];
					$destinationPath = public_path('file/');
					$uploadSuccess = Input::file('file')->move($destinationPath, $nama);
					/*$file = $_FILES['file'];
					$nama = rand().'_'.$file['name'];
					move_uploaded_file($file['tmp_name'], 'file/'.$nama);*/
				}else{
					$nama = Input::get('youtube');
					$size = '';
					$type = '';
				}
				//kover
				if(Input::hasFile('cover')){
					$doc = Input::file('cover');
					$filename = $doc->getClientOriginalName();
					$img = rand().'_'.$filename;
					$destinationPath = public_path('image/cover/');
					$uploadSuccess = Input::file('cover')->move($destinationPath, $img);
				}else{
					$img = '';
				}
				
				$katalog = new Katalog();
				$katalog->title = Input::get('title');
				$katalog->category = Input::get('category');
				$katalog->summary = Input::get('summary');
				$katalog->filesize = $size;
				$katalog->filetype = $type;
				$katalog->release = Input::get('release');
				$katalog->numpage = Input::get('numpage');
				$katalog->ISBN = Input::get('isbn');
				$katalog->file = $nama;
				$katalog->publisher = Input::get('publisher');
				$katalog->img = $img;
				$katalog->like = 0;
				$katalog->save();
				foreach (Input::get('author') as $key => $value) {
					$authkatalog = new AuthorKatalog();
					$authkatalog->idKatalog = $katalog->id;
					$authkatalog->author = $value;
					$authkatalog->save();
				}
				return Redirect::to('admin/rkmkatalog')->with('sukses','rekam katalog sukses');
			}else{
				return Redirect::to('admin/rkmkatalog')
						->withInput()
						->withErrors($validator);
			}

		}else{
			return View::make('admin.katalog',compact('kategori','publisher','year','author','act'));
		}
	}
	
	public function delKatalog($id){
		$katalog = Katalog::find($id);
		$tmp = AuthorKatalog::where('idkatalog','=',$id)->get();
		foreach($tmp as $value){
			$ak = AuthorKatalog::find($value->id);
			$ak->delete();
		}
		$katalog->delete();
		return Redirect::to('admin/katalog');
	}
	
	public function like(){
		if(Input::has('like')){
			$katalog = Katalog::find(Input::get('id'));
			$katalog->like = Input::get('like');
			$katalog->save();
			$like = new Like();
			$like->idkatalog = Input::get('id');
			$like->iduser = Auth::user()->id;
			$like->save();
		}
	}
	
	public function cekLike(){
		if(Input::has('id')){
			$like = Like::where('idkatalog','=',Input::get('id'))
					->where('iduser','=',Auth::user()->id)
					->get();
			echo json_encode(array('exists'=>count($like)));
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
				$file = Input::file('foto');
				if($file->getClientOriginalName()!=''){
					$ext = explode('.', $file['name']);
					$name = 'foto_'.rand().'.'.end($ext);
					//move_uploaded_file($file['tmp_name'], 'image/'.$name);
					$destinationPath = public_path('image/');
					$uploadSuccess = Input::file('file')->move($destinationPath, $name);
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
				return Redirect::to('admin/rkmauthor')->with('sukses','Rekam data author berhasil!');
			}else{
				return Redirect::to('admin/rkmauthor')
							->withErrors($validator)
							->withInput();
			}
			
		}else{
			return View::make('admin.author',compact('act'));
		}
	}
	
	public function editAuthor($id=null){
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
			$id = Input::get('id');
			if($validator->passes()){
				$file = Input::file('foto');
				if($file->getClientOriginalName()!=''){
					$ext = explode('.', $file->getClientOriginalName());
					$name = 'foto_'.rand().'.'.end($ext);
					//move_uploaded_file($file['tmp_name'], 'image/'.$name);
					$destinationPath = public_path('image/');
					$uploadSuccess = Input::file('file')->move($destinationPath, $name);
				}else{
					$name = $author->foto;
				}
				$author = Author::find($id);
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
				return Redirect::to('admin/edauthor/'.$id)->with('sukses','Ubah data author berhasil!');
			}else{
				return Redirect::to('admin/edauthor/'.$id)
							->withErrors($validator)
							->withInput();
			}
			
		}else{
			$act = 'edit';
			$author = Author::find($id);
			return View::make('admin.author',compact('act','author'));
		}
	}
	
	public function delAuthor($id){
		$author_katalog = AuthorKatalog::where('author','=',$id)->get();
		foreach($author_katalog as $value){ //remove from author katalog table
			$ak = AuthorKatalog::find($value->id);
			$ak->delete();
		}
		$author = Author::find($id);
		if(file_exists($author->foto)){
			unlink('image/'.$author->foto);
		}
		$author->delete(); //remove from author table
		return Redirect::to('admin/author');
		
	}
	
	public function publisher(){
		$publisher = Publisher::all();
		$act = 'list';
		$no = 0;
		return View::make('admin.publisher',compact('act','publisher','no'));
	}
	
	public function addPublisher(){
		$act = 'add';
		if(Input::has('submit')){
			$rules = array(
							'publishername'=>'required',
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
				return Redirect::to('admin/rkmpublisher')->with('sukses','rekam data berhasil!');
			}else{
				return Redirect::to('admin/rkmpublisher')
							->withInput()
							->withErrors($validator);
			}
		}else{
			return View::make('admin.publisher',compact('act'));
		}
		
		//return Redirect::to('admin/publisher')->with('error','illegal operation!!!');
	}
	
	public function editPublisher($id=null){
		if(Input::has('submit')){
			$rules = array(
							'publishername'=>'required',
							'phone'=>'required',
							'email'=>'required|email',
							'address'=>'required'
						);
			
			$validator = Validator::make(Input::all(),$rules);
			$id = Input::get('id');
			if($validator->passes()){
				$pb = Publisher::find($id);
				$pb->publishername = Input::get('publishername');
				$pb->phone = Input::get('phone');
				$pb->email = Input::get('email');
				$pb->address = Input::get('address');
				$pb->save();
				return Redirect::to('admin/edpublisher/'.$id)->with('sukses','Ubah data berhasil!');
			}else{
				return Redirect::to('admin/edpublisher/'.$id)
							->withInput()
							->withErrors($validator);
			}
		}else{
			$act = 'edit';
			$publisher = Publisher::find($id);
			return View::make('admin.publisher',compact('act','publisher'));
		}
		
	}
	
	public function delPublisher($id){
		$katalog = Katalog::where('publisher','=',$id)->get();
		foreach($katalog as $value){
			$k = Katalog::find($value->id);
			$k->publisher = NULL;
			$k->save();
		}
		$publisher = Publisher::find($id);
		$publisher->delete();
		return Redirect::to('admin/publisher');
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
				$tag = str_replace(' ','',Input::get('tag'));
				$tags = explode(',',$tag);
				foreach($tags as $tag){
					$katalogtag = new KatalogTag();
					$katalogtag->idkatalog = $katalog->id;
					$idtag = Tag::where('tag','=',$tag)->get();
					if(count($idtag)>0){
						$katalogtag->idtag = $idtag[0]->id;
						$katalogtag->save();
					}else{
						$tagclass = new Tag();
						$tagclass->tag = $tag;
						$tagclass->save();
						$katalogtag->idtag = $tagclass->id;
						$katalogtag->save();
					}
				}
				return Redirect::to('admin/rkmartikel')->with('sukses','Berhasil rekam Artikel!');
			}else{
				return Redirect::to('admin/rkmartikel')
							->withInput()
							->withErrors($validator);
			}
		}else{
			return View::make('admin.artikel',compact('act','author','tags'));	
		}
	}
	
	public function comment(){
		$comments = Comment::all();
		$act = 'list';
		$no = 0;
		return View::make('admin.comment',compact('comments','act','no'));
	}
	
	public function addComment($type=null, $id=null){
		if(Input::has('submit')){
			$rules = array(
					'comment'	=>	'required'
				);
			$validator = Validator::make(Input::all(),$rules);
			$id = Input::get('id');
			$type = Input::get('type');
			if($validator->passes()){
				$comment = new Comment();
				$comment->name = Input::get('name');
				$comment->comment = Input::get('comment');
				$comment->id_obj = $id;
				$comment->cat_comment = $type;
				$comment->save();
				return Redirect::to('admin/rkmcomment/'.$type.'/'.$id)->with('sukses','Rekam komentar berhasil!');
			}else{
				return Redirect::to('admin/rkmcomment/'.$type.'/'.$id)
						->withErrors($validator)
						->withInput();
			}
		}else{
			$act = 'add';
			return View::make('admin.comment',compact('type','id','act'));
		}
	}
	
	public function delComment($id){
		$comment = Comment::find($id);
		$comment->delete();
		return Redirect::to('admin/comment');
	}
	
	public function user(){
		$users = User::all();
		$act = 'list';
		$no = 0;
		return View::make('admin.user',compact('users','act','no'));
	}
	public function addUser(){
		$role = array(1=>'admin',2=>'contributor',3=>'viewer');
		$act = 'add';
		$tmp = Author::all();
		$authors = array();
		$authors[0] = '-- PILIH AUTHOR --';
		foreach($tmp as $value){
			$authors[$value->id] = $value->authorname;
		}
		if(Input::has('submit')){
			$rules = array(
						'username'	=>	'required|unique:users,username',
						'password'	=>	'required',
						'password2'	=>	'required|same:password',
						'role'		=>	'required'
					);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->passes()){
				$user = new User();
				$user->username = Input::get('username');
				$user->password = Hash::make(Input::get('password'));
				$user->idauthor = Input::get('author');
				$user->role = Input::get('role');
				$user->save();
				return Redirect::to('admin/rkmuser')->with('sukses','Rekam data User berhasil!');
			}else{
				return Redirect::to('admin/rkmuser')
							->withErrors($validator)
							->withInput();
			}
		}
		return View::make('admin.user',compact('role','act','authors'));
	}
	
	public function editUser($id=null){
		if(Input::has('submit')){
			$id = Input::get('id');
			$rules = array(
						'password'	=>	'required',
						'password2'	=>	'required|same:password',
						'role'		=>	'required'
					);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->passes()){
				$user = User::find($id);
				$user->password = Hash::make(Input::get('password'));
				$user->idauthor = Input::get('author');
				$user->role = Input::get('role');
				$user->save();
				return Redirect::to('admin/eduser/'.$id)->with('sukses','Ubah data User berhasil!');
			}else{
				return Redirect::to('admin/eduser/'.$id)
							->withErrors($validator)
							->withInput();
			}
		}else{
			$user = User::find($id);
			$act = 'edit';
			$tmp = Author::all();
			$authors = array();
			$authors[0] = '-- PILIH AUTHOR --';
			foreach($tmp as $value){
				$authors[$value->id] = $value->authorname;
			}
			$role = array(1=>'admin',2=>'contributor',3=>'viewer');
			return View::make('admin.user',compact('user','act','authors','role'));
		}
	}
	
	public function delUser($id){
		$user = User::find($id);
		$user->delete();
		return Redirect::to('admin/user');
	}
	
	
	public function quote(){
		$quotes = Quote::all();
		$no = 0;
		$act = 'list';
		return View::make('admin.quote',compact('quotes','no','act'));
	}
	
	public function addQuote(){
		$act = 'add';
		if(Input::has('submit')){
			$rules = array(
						'quote' => 'required'
					);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->passes()){
				$quote = new Quote();
				$quote->quote = Input::get('quote');
				$quote->date = Input::get('date');
				$quote->save();
				return Redirect::to('admin/rkmquote')->with('sukses','Rekam data berhasil!');
			}else{
				return Redirect::to('admin/rkmquote')
						->withInput()
						->withErrors($validator);
			}
		}else{
			return View::make('admin.quote',compact('act'));
		}
	}
	
	public function editQuote($id=null){ 
		if(Input::has('submit')){
			$rules = array(
						'quote' => 'required'
					);
			$validator = Validator::make(Input::all(),$rules);
			$id = Input::get('id');
			if($validator->passes()){
				$quote = Quote::find($id);
				$quote->quote = Input::get('quote');
				$quote->date = Input::get('date');
				$quote->save();
				return Redirect::to('admin/edquote/'.$id)->with('sukses','Ubah data berhasil!');
			}else{
				return Redirect::to('admin/edquote/'.$id)
						->withInput()
						->withErrors($validator);
			}
		}else{
			$act = 'edit';
			$quote = Quote::find($id);
			return View::make('admin.quote',compact('act','quote'));
		}
	}
	
	public function delQuote($id){
		$quote = Quote::find($id);
		$quote->delete();
		return Redirect::to('admin/quote');
	}

}
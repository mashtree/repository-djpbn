<?php

class ListController extends BaseController{

	public function login(){
		return View::make('login');
	}
	
	public function doLogin(){
		$validator = Validator::make(
				Input::all(),
				array(
						'username'	=> 'required',
						'password'	=>	'required'
					)
			);

		if($validator->passes()){
			$data = array(
					'username'=>Input::get('username'),
					'password'=>Input::get('password')
				);

			if(Auth::attempt($data)){
				echo 'SUCCESS!';
			}else{
				return Redirect::to('login');
			}
		}else{
			return Redirect::to('login')->withErrors($validator)
					->withInput(Input::except('pass'));
		}
	}
	
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
				->get(array('katalog.title','katalog.release','katalog.id','katalog.category'));
		$comment = Comment::where('id_obj','=',$author->id)->where('cat_comment','=',2)->get();
		return View::make('front.author',compact('author','books','comment'));
	}
	
	public function listAuthor(){
		$authors = Author::selectRaw('id,authorname, (select count(a.id) as num from katalog a
						left join author_katalog b on a.id=b.idkatalog
						where b.author = author.id) as num')
						->get();
		foreach($authors as $a){
			echo $a->id.' '.$a->authorname.' '.$a->num.'<br/>';
		}
		return View::make('front.lsauthor',compact('author'));
	}

	public function book($id){
		$book = DB::table('katalog')
				->leftjoin('publisher','katalog.publisher','=','publisher.id')
				->where('katalog.id','=',$id)
				->get(array('katalog.id','katalog.title','katalog.summary','katalog.release',
				'katalog.numpage','katalog.ISBN','publisher.publishername','katalog.img','katalog.category','katalog.like'));
		//var_dump($book);
		$authors = AuthorKatalog::get_author_katalog($id);
		$comment = Comment::where('id_obj','=',$book[0]->id)->where('cat_comment','=',1)->get();
		return View::make('front.book', compact('book','authors','comment'));
	}

	public function read($id){
		$book = DB::table('katalog')
				->leftjoin('publisher','katalog.publisher','=','publisher.id')
				->where('katalog.id','=',$id)
				->get(array('katalog.id','katalog.title','katalog.release',
				'katalog.numpage','publisher.publishername','katalog.file','katalog.ISBN','katalog.category','katalog.summary',
				'katalog.updated_at'));
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
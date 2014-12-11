<?php

class AudioController extends BaseController {

	public function showSelect()
	{
		$sections = Section::all();
		$arr = array();
		foreach($sections as $section){
			$subsections = Subsection::where('sid','=',$section->sid)->get();
			$ssArr = array();
			foreach($subsections as $subsection){
				$methods = Method::where('ssid','=',$subsection->ssid)->get();
				$ssArr[$subsection->ssname] = $methods;
			}
			$arr[$section->sname] = $ssArr;
		}

		$namearr = array();
		if(Auth::check()){
			$namearr = Auth::user()->name;
		}

		$subcat = array();
		$categories = Category::all();

		foreach($categories as $cat){
			$subcat[$cat->cid] = Subcategory::where('cid','=',$cat->cid)->get();
		}

		return View::make('selection')->with('arr',$arr)->with('namearr',$namearr)->with('categories',$categories)->with('subcategories',$subcat);
	}


	public function upload(){
		if(Input::hasFile('audio') && Input::has('methods')){
			$name = Input::file('audio')->getClientOriginalExtension();
			if($name === 'mp3'){
				echo "<script>alert('Uploaded');</script>";	
				$mid = Input::get('methods');
				Input::file('audio')->move('methods/', 'method'.$mid.'.mp3');
			}
			else{
				echo "<script>alert('Please upload mp3 files only.');</script>";

			}	
		}
		else{
			echo "<script>alert('You did not choose any file!');</script>";	
		}
	}

	public function merge(){
		if(Input::has('submitted')){
			$checkedMs = Input::get('checked');
			$dir = "";
			for ($i = 0; $i < count($checkedMs); $i++){
				if($i === count($checkedMs) - 1){
					$dir .= "/Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/methods/method".$checkedMs[$i].".mp3";
				}
				else{
					$dir .= "/Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/methods/method".$checkedMs[$i].".mp3|";
				}
			}

			$subcat = new Subcategory;
			$subcat->sname = Input::get('subcatName');
			$subcat->cid = Input::get('categories');
			$subcat->save();

			$sid = Subcategory::where('sname','=', Input::get('subcatName'))->first()->sid;
			echo shell_exec("/usr/local/bin/ffmpeg -i 'concat:".$dir."' -acodec copy /Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/audio/subcat".$sid.".mp3");
		}
		$subcat = array();
		$categories = Category::all();

		foreach($categories as $cat){
			$subcat[$cat->cid] = Subcategory::where('cid','=',$cat->cid)->get();
		}

		return View::make('admin')->with('categories',$categories)->with('subcategories',$subcat);
	}
}
<?php

class AudioController extends BaseController {


	/**
	 * for admin site.  If admin user creates a new subcategory, they
	 * are redirected here.  Redirects to selction.blade.php.
	 * returns 'arr', an associative array containing all the methods
	 * from the yoga nidra cards in format:
	 * array('section name', array('subsection name', $methods)),
	 * where methods is an eloquent array object.
	 * also returns 'namearr' which contains info about current user
	 * returns an array of all categories from the db and
	 * the subcategories arranged in format where indexes of the arrays are cid column of category
	 * and values of the array are eloquent arrays of subcategories from db.
	 * ex: array('category->cid' => subcategories).
	 *
	 * @return arr, namearr, categories, subcategories
	 */

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

	


	/**
	 * method for admin to upload a new audio file that corresponds with an existing
	 * method in the db.
	 */

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


	//

	/**
	 * when admin has selected methods in select.blade.php for a new
	 * subcategory, merge() will merge the corresponding audio files (from /methods)
	 * into one file, which is stored in the /audio folder.
	 * redirects admin to 'admin.blade.php'
	 * returns an array of all categories from the db and
	 * the subcategories arranged in format where indexes of the arrays are cid column of category
	 * and values of the array are eloquent arrays of subcategories from db.
	 * ex: array('category->cid' => subcategories).
	 *
	 * @return categories, subcategories
	 */

	public function merge(){
		if(Input::has('submitted')){
			$checkedMs = Input::get('checked');
			$dir = "";
			for ($i = 0; $i < count($checkedMs); $i++){
				if($i === count($checkedMs) - 1){
					$dir .= "/Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/methods/method".$checkedMs[$i].".mp3";
					// file is named in format: 'method1.mp3', where 1 is the mid of the method.
				}
				else{
					$dir .= "/Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/methods/method".$checkedMs[$i].".mp3|";
				}
			}

			// creates the new subcategory
			$subcat = new Subcategory;
			$subcat->sname = Input::get('subcatName');
			$subcat->cid = Input::get('categories');
			$subcat->save();

			$sid = Subcategory::where('sname','=', Input::get('subcatName'))->first()->sid;
			echo shell_exec("/usr/local/bin/ffmpeg -i 'concat:".$dir."' -acodec copy /Applications/MAMP/htdocs/yoga_audio/yoga_audio/public/audio/subcat".$sid.".mp3");
			// file is named in format: 'subcat1.mp3', where 1 is the sid of the subcategory.
		}
		$subcat = array();
		$categories = Category::all();

		foreach($categories as $cat){
			$subcat[$cat->cid] = Subcategory::where('cid','=',$cat->cid)->get();
		}

		return View::make('admin')->with('categories',$categories)->with('subcategories',$subcat);
	}
}
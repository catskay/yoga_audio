
<?php

class MasterSeeder extends Seeder
{

	public function nextLine($file)
	{
		
		
		$next = fgets($file);
		while($next===""||ctype_space($next)){
			$next = fgets($file);
			
		}

		return $next;

	}

	public function run()
	{
		$rs = array(204, 33, 134, 141, 140, 29, 215, 204, 34, 204, 20, 147);
		$gs = array(0, 146, 36, 119, 28, 39, 71, 10, 147, 144, 90, 200);
		$bs = array(107, 209, 113, 28, 36, 100, 32, 32, 87, 179, 136, 225);

		$currSid = -1;
		$currSSid = 0;
		$currSname = '';
		$currSSname = '';
		$text = '';
		$mname = '';
		$mcount = 1;

		$file = fopen('script-cards.txt','r');

		$next = $this->nextLine($file);
		
		while(!feof($file)){

			if(strcmp(trim($next),trim($currSname))!=0){
				$currSname = $next;
				Section::create(array('sname' => $next));
				$currSid = Section::where('sname','=',$next)->first()->sid;
			}
			
			$next = $this->nextLine($file);
			if(strcmp($next,$currSSname)!=0){
				$currSSname = $next;
				$currSSid++;
				Subsection::create(array('ssname' => $currSSname, 'sid' => $currSid, 'r' => $rs[$currSSid-1], 'g' => $gs[$currSSid-1], 'b' => $bs[$currSSid-1]));
			}
			
			$next = $this->nextLine($file);
			$mname = $next;
			$next = $this->nextLine($file);
			while(strcmp(trim($next), '~')!=0){
				$text = $text.$next;
				$next = $this->nextLine($file);
			}
			if($mcount === 1 || $mcount === 3 || $mcount === 7 || $mcount === 10 || $mcount === 19 || $mcount === 20 || $mcount === 23 || $mcount === 24 || $mcount === 25 || $mcount === 26 || $mcount === 27){
				$editable = 'true';
			}
			else{
				$editable = 'false';
			}
			Method::create(array('mname'=>$mname,'ssid' => $currSSid,'text'=>$text, 'editable'=>$editable));
			$mcount++;
			$text = "";
			$next = $this->nextLine($file);
		}
        
        fclose($file);        
	}

	

}


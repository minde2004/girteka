<?php namespace App\Traits;

trait helpFunctions
{
    public function checkbox($val){
		if($val=="on"){
			return 1;
		} else {
			return 0;
		}
	}

}
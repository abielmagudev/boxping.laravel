<?php 

namespace App\Http\Controllers\Traits;

trait Userlive {

    private $userlive;

    protected function userlive()
    {
        if( is_null($this->userlive) )
            $this->userlive = rand(1,10);
        
        return $this->userlive;
    }
}

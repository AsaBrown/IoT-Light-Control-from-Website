<?php

class Roommate {
    protected $roommateID;
    
    
    function __construct($roommateID, $database){
        $this->roommateID = $roommateID;
        
    }
    
     public function getID(){
         return $this->roommateID;
     }
}

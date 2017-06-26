<?php
//poniżej napisz kod definiujący klasę

class File {
    
    protected $size;
    protected $path;
    
    public function __construct($path, $size) {
        //źle
        //$this->size = $size;
        //$this->path = $path;
        
        $this->setPath($path);
        $this->setSize($size);
    }
    
    public function setSize($size){
        if($size > 0 && is_numeric($size)){
            $this->size = $size;
        }
        
        return $this;
    }
    
    public function setPath($path){
        
        if( strpos( $path, "/") !== FALSE){
            $this->path = $path;
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function getSize(){
        return $this->size;
    }
    
    public function getPath(){
        return $this->path;
    }
    
    public function calculateSize($unit){
        $result = 0;
        
        switch ($unit) {
            case "MB":
                $result = $this->size / 1024;

                break;
            case "B":
                $result = $this->size * 1024;
                break;
            
            default:
                $result = $this->size;
                break;
        }
        
        return "Wielkość w $unit to: $result";
        
    }
}

$file = new File("www", 1024);
$file2 = new File("www", 16);

//var_dump($file);
var_dump($file->calculateSize("MB"));
var_dump($file2->calculateSize("B"));

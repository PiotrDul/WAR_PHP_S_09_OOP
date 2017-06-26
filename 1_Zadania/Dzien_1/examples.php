<?php


class Book {
    
    public $author;
    private $pages;


    public function __construct($pages = 99, $author = "Unknow") {
//        echo $this->author;
        $this->pages = $pages;
        $this->author = $author;
//        echo $this->pages;
    }
    
    //public
    function removePageOnlyOneForNow($numberPageRemoved){
        if($numberPageRemoved > $this->pages){
            $this->pages = 0;
        }else {
            $this->pages -= $numberPageRemoved;
        }
    }
    
    public function getPages(){
        return $this->pages;
    }
    
    public function setPages($newPages){
        if($newPages != null && $newPages > 0 && is_int($newPages)){
            $this->pages = $newPages;
        }else {
            return false;
        }
        //return $this;
        return true;
    }
}

$book1 = new Book(50, "Dimitry");
$book2 = new Book(40);
//$book1->author = "Dimitry";

//echo $book1->author;
//echo $book1->pages;
//$book1->removePageOnlyOneForNow( rand(1, 99) );

//echo $book1->getPages();
//
////$book1->setPages(110)->removePageOnlyOneForNow(10);
//
//var_dump($book1->setPages(10));
//echo $book1->getPages();

$book1->setPages(50);
$book2->setPages(60);
var_dump($book1);
var_dump($book2);
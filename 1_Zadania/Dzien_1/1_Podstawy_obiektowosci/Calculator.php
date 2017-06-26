<?php
//poniżej napisz kod definiujący klasę

class Calculator {
    
    private $history;

    public function __construct() {
        $this->history = [];
    }

    public function add($num1, $num2){
        $sum = $num1 + $num2;
        
        $this->history[] = "added $num1 to $num2 got $sum";
        return $sum;
    }
    
    public function getHistory(){
        return $this->history;
    }
}

$calc = new Calculator();
echo $calc->add(1, 3);
print_r($calc->getHistory());
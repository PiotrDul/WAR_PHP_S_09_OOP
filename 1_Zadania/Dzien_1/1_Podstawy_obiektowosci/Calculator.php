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
    
    public function multiply($num1, $num2){
        $sum = $num1 * $num2;
        
        $this->history[] = "multiply $num1 to $num2 got $sum";
        return $sum;
    }
    
    public function substract($num1, $num2){
        $sub = $num1 - $num2;
        
        $this->history[] = "substract $num1 to $num2 got $sub";
        return $sub;
    }
    
    public function divide($num1, $num2){
        $sub = $num1 / $num2;
        
        $this->history[] = "divide $num1 to $num2 got $sub";
        return $sub;
    }
    
    public function printOperations(){
        foreach ($this->history as $val){
            echo $val;
        }
    }
    
    public function clearOperations(){
        $this->history = [];
    }
    
}

$calc = new Calculator();
$calc2 = new Calculator();

echo $calc->add(1, 3);
echo $calc->multiply(2, 4);

echo $calc2->substract(5, 2);
echo $calc2->divide(10, 2);
echo "<hr>";
//print_r($calc->getHistory());
//print_r($calc2->getHistory());

$calc->printOperations();
echo "<hr>";
$calc2->printOperations();


<img alt="Logo" src="http://coderslab.pl/wp-content/themes/coderslab/svg/logo-coderslab.svg" width="400">

# OOP - Snippety
> Krótkie kawałki kodu, które pokazują zależności, rozwiązują popularne problemy oraz pokazują jak używać niektórych funkcji.


#### 1. Jak utworzyć obiekt klasy w PHP?

`$john = new Person();`

#### 2. W jaki sposób korzystać z tzw. chainingu?

W OOP mamy możliwość wykonania metod łańcuchowo np.  
`$john->eat()->walk()->run()`

Aby można było w ten sposób pisać kod metody muszą zwracać instancję obiektu czyli `$this`:  

```PHP
class Person{
    private $weight;
    
    public function eat(){
        $this->weight+=5;
        return $this;
    }
    
    public function run(){
        $this->weight-=2;
        return $this;
    }
}
```

#### 3. W jaki sposób skopiować obiekt klasy?

```PHP
$mark = clone $john;
```
Sklonowanie obiektu powoduje utworzenie jego nowej instancji, tutaj w zmiennej `$mark` z wszystkimi metodami i własnościami ustawionymi na takie wartości, jakie posiada `$john` na moment klonowania.

#### 4. Jak sprawdzić czy zmienna jest obiektem wybranej klasy?

```PHP
$john = new Person();
if($john instanceof Person){
    echo '$john variable is object of class Person';
}

```

#### 5. W jaki sposób nadpisać metodę z klasy rodzica?

Załóżmy, iż klasa `Employee` dziedziczy po klasie `Person`.
```PHP
class Person{
    private $weight;
    
    public function eat(){
        $this->weight+=5;
        return $this;
    }
    
    public function run(){
        $this->weight-=2;
        return $this;
    }
}

class Employee extends Person{
    public function eat(){
        $this->weight+=3;
        return true;
    }
}
``` 

W takiej sytuacji, nadpisaliśmy metodę `eat()` i wywołanie jej na obiekcie klasy `Person` i na obiekcie `Employee` spowoduje różne zachowanie kodu.

#### 6. Modyfikatory dostępu

* **private** metody i własności nie mogą być dziedziczone i nie są dostępne w klasach dziedziczących, można do nich uzyskać dostęp jedynie w klasie, w której je zadeklarowano.
* **protected** metody i własności mogą być dziedziczone i są dostępne w klasach dziedziczących, można do nich uzyskać dostęp jedynie w klasie, w której je zadeklarowano oraz klasach dziedziczących.
* **public** metody i własności mogą być dziedziczone, są dostępne w klasach dziedziczących, można do nich uzyskać dostęp zarówno w klasie jak i poprzez utworzony obiekt klasy w kodzie (z zewnątrz).

#### 7. Własności i metody statyczne

* **własności statyczne** - własności "z pamięcią", do których dostęp mamy bezpośrednio z klasy, bez konieczności tworzenia obiektu klasy
* **metody statyczne** - metody do których dostęp mamy bezpośrednio z klasy, bez konieczności tworzenia obiektu klasy, nie ma w nich dostępu do `$this`

#### 8. Type hint dla argumentów metod

Możemy w metodzie narzucić jakiej klasy (lub typu w php7) ma być obiekt przekazany jako argument.
```PHP
...
    public function goWork(Vehicle $withWhat){
    }
... 
```

W takiej sytuacji metoda `goWork()` zaakceptuje jedynie argument będący obiektem klasy `Vehicle` lub klas dziedziczących z `Vehicle`.

#### 9. Jak stworzyć metode z różną ilością argumentów?

Jeśli chcemy stworzyć metodę z dowolną ilością argumentów, np. raz 3 a raz 2 należy stworzyć metode bez argumentów w jej definicji.  
Wywołując metodę, przekazujemy dowolną ilość argumentów.  
Aby dowiedzieć się ile argumentów zostało przekazanych oraz pobrać ich wartość używamy 2 specjalnych funkcji:
* `func_num_args()` - zwraca ilość (`int`) argumentów przekazanych do funkcji
* `func_get_args()` - zwraca tablicę (`array`) argumentów przekazanych do funkcji

```PHP
...
    public function bankTransfer(){ //metoda nie posiada argumentów w swojej definicji
        $numargs = func_num_args();
        echo "Number of arguments: $numargs \n";
        if ($numargs >= 2) {
            echo "Second argument is: " . func_get_arg(1) . "\n";
        }
        $arg_list = func_get_args();
        for ($i = 0; $i < $numargs; $i++) {
            echo "Argument $i is: " . $arg_list[$i] . "\n";
        }
    }
    
    $john->bankTransfer(15, 'bzwbk'); //wywołanie nastąpiło z przekazaniem 2 argumentów
    $john->bankTransfer(25, 'mbank', 'credit'); //wywołanie nastąpiło z przekazaniem 3 argumentów
...
```

#### 10. Stałe "magiczne"

Są to stałe predefiniowane w php, które posiadają wartość automatycznie przypisaną przez php.

| Stała          | Opis                                                                                                                              |
|----------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `__LINE__`     | zwraca linię pliku, w którym użyto stałej                                                                                         |
| `__FILE__`     | zwraca pełną bezwzględną ścieżkę do pliku, w którym użyto stałej np. `/home/www/page.com/public_html/info.php`                    |
| `__DIR__`      | zwraca pełną bezwzględną ścieżkę do katalogu, w którym znajduje się plik, gdzie użyto stałej np. `/home/www/page.com/public_html` |
| `__FUNCTION__` | zwraca nazwę funkcji/metody, w jakiej użyto stałej np. `bankTransfer`                                                             |
| `__CLASS__`    | zwraca nazwę klasy, w jakiej użyto stałej                                                                                         |
| `__METHOD__`   | zwraca nazwę metody, w jakiej użyto stałej wraz z klasą np. `Person::bankTransfer`    

#### 11. Bity i bajty

1 bit - (1**b**) przechowuje jeden z 2 stanów `0` lub `1`, najmniejsza jednostka informacji  
1 Bajt - (1**B**) składa się z 8 bitów  
1 kiloBajt - (1**kB**) - 1024 Bajty  
1 MegaBajt - (1 **MB**) - 1024 ^ 2 Bajtów - 1 048 576  

W zależności od tego czy przeliczamy z jednostki mniejszej lub większej dzielimy lub mnożymy przez odpowiednie liczby.  
Sposoby przeliczania:  
* `4MB -> kB = 4 * 1024 (1MB to 1024kB) = 4096kB`  
* `420kB -> MB = 420 / 1024kB (1MB to 1024kB) = 0.41MB`

#### 12. Jak prawidłowo używać `include` i `require` z użyciem `__DIR__`

Załóżmy poniższą strukturę katalogów:  
* główny katalog `public_html` zawiera  
  * katalog `includes`, zawiera:  
    * plik `file1.php`
    * plik `file2.php`
    * plik `file3.php`
  * katalog `images` , zawiera:  
    * plik `img1.jpg`
    * plik `img2.jpg`
  * katalog `classes`, zawiera:  
    * plik `first.class.php`
    * plik `second.class.php`
    * plik `third.class.php`
  * plik `mainFile1.php`  
  * plik `mainFile2.php`  
  * plik `mainFile3.php`  
```
public_html
|___includes
    |___file1.php
    |___file2.php
    |___file3.php
|___images
    |___img1.jpg
    |___img2.jpg
|___classes
    |___first.class.php
    |___second.class.php
    |___third.class.php
|___mainFile1.php
|___mainFile2.php
|___mainFile3.php
```
W `php` magiczna stała `__DIR__`, zwraca nam ścieżkę **bezwzględną** do katalogu, w którym znajduje się wywołany plik.  
Bardzo ważne aby jej używać, ponieważ w przypadku używania samego `../`, może to spowodować problem w zależności od tego czy skrypt uruchamiany jest z poziomu serwera www lub np. konsoli.  

Będąc w pliku `first.class.php` stała `__DIR__` będzie wskazywać na `/public_html/classes`.  
Chcąc zaincludować plik `file1.php` z katalogu `includes` należy ze ścieżki bezwzględnej przenieść się do katalogu includes:  
`require('/public_html/classes/../includes/file1.php')` lub to samo z użyciem `__DIR__`  
`require(__DIR__' . /../includes/file1.php')`  

Podobnie jeśli chcemy użyć `require` dla pliku z "głębszego katalogu".  
Będąc w pliku `mainFile1.php` stała `__DIR__` będzie wskazywać na `/public_html`.  
Chcąc zaincludować plik `file1.php` z katalogu `includes` należy ze ścieżki bezwzględnej przenieść się do katalogu includes:  
`require('/public_html/includes/file1.php')` lub to samo z użyciem `__DIR__`  
`require(__DIR__' . /includes/file1.php')`  

Dzięki takiemu zapisowi zawsze mamy 100% pewność, iż zostanie załadowany prawidłowy plik ponieważ poruszamy się względem ścieżki bezwzględnej.
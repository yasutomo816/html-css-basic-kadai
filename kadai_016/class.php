<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <title>kadai_016</title>
 </head>
 
 <body>
 <?php

class Food {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function show_price() {
        return "The price of {$this->name} is {$this->price}.";
    }
}

class Animal {
    public $name;
    public $height;
    public $weight;

    public function __construct($name, $height, $weight) {
        $this->name = $name;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function show_height() {
        return "The height of {$this->name} is {$this->height} cm.";
    }
}

// 使用例
$apple = new Food("Apple", 100);
$dog = new Animal("Dog", 50, 20);

echo $apple->show_price();  // "The price of Apple is 100."
echo "\n";
echo $dog->show_height();    // "The height of Dog is 50 cm."

?>
<?php

//inizializziamo la classe
class Product{
  
  
  public $img;
  public $title;
  public $prize;
  
 

  function __construct($_img,$_title,$_prize)
  {
      
      
      
      $this-> img = $_img;
      $this-> title = $_title;
      $this-> prize = $_prize;
      
  }
};

 class ProductType extends Product{
  public $prodType;

   function __construct($_prodType,$_img,$_title,$_prize){
      parent:: __construct($_img,$_title,$_prize);
      $this-> prodType =$_prodType;
  } }

 

   class CategoryProduct extends ProductType { 
    public $category;

    function __construct($_category,$_prodType,$_img,$_title,$_prize)
    {
      parent:: __construct($_prodType,$_img,$_title,$_prize);
      $this-> category = $_category;
    }

    public function get_product(){

      return "{$this->img} <br> {$this->title}, prezzo {$this->prize}$ Categoria {$this->prodType} per {$this->category}";
    }

  }

//creaiamo le istanze
// $crocchettePerGatti = new CategoryProduct('gatti','cibo','imgCrocchetteGatti','Crocchette per gatti','10');
// $cucciaGrande = new CategoryProduct('cani','cucce','imgCucciaGrande','Cuccia grande','16');
// $palla = new CategoryProduct('gatti','giochi','imgPalla','Palla','5');

$products = [
  new CategoryProduct('gatti','cibo','imgCrocchetteGatti','Crocchette per gatti','10'),
  new CategoryProduct('cani','cucce','imgCucciaGrande','Cuccia grande','16'),
  new CategoryProduct('gatti','giochi','imgPalla','Palla','5'),
];


// var_dump($crocchettePerGatti,$cucciaGrande,$palla);
// class gatto {

// }
// class gane {
  
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce</title>
</head>
<body>
  <?php foreach($products as $product): ?>
    <div> <?php echo $product->get_product() ?></div>
    <br>
  <?php endforeach;?>
</body>
</html>
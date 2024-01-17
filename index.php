<?php

//inizializziamo la classe
class Product{
  
  protected $id;
  protected $img;
  protected $title;
  protected $prize;
  
 

  function __construct($_id,$_title,$_prize)
  {
      $this-> id = $_id;
      $this-> title = $_title;
      $this-> prize = $_prize;
      
  }

  function controlPrice($_prize){
  if($_prize === 0){
        throw new Exception ("Prezzo non valido <br>");
      };
    
  }
  
   
  public function getPrize (){
    return $this->prize;
  }


};


 class ProductType extends Product{
  private $prodType;

  use Category;

   function __construct($_prodType,$_id,$_title,$_prize,$_category,$_categoryIcon){
      parent:: __construct($_id,$_title,$_prize);
      $this-> prodType =$_prodType;
      $this->setCategory($_category,$_categoryIcon);
  } 

  public function get_product(){

      return "Categoria:{$this->category} <br> {$this->title}, prezzo {$this->prize}$ Categoria {$this->prodType} per {$this->category} {$this->categoryIcon}";
    }

}

trait Category{
  private $category;
  private $categoryIcon;

  public function setCategory($_category,$_categoryIcon){
    $this->category=$_category;
    $this->categoryIcon=$_categoryIcon;
  }

}

 



//creaiamo le istanze
// $crocchettePerGatti = new CategoryProduct('gatti','cibo','imgCrocchetteGatti','Crocchette per gatti','10');
// $cucciaGrande = new CategoryProduct('cani','cucce','imgCucciaGrande','Cuccia grande','16');
// $palla = new CategoryProduct('gatti','giochi','imgPalla','Palla','5');

$products = [
  new ProductType('cibo',100,'Crocchette per gatti','10','Gatti','<i class="fa-solid fa-cat"></i>'),
  new ProductType('cucce',101,'Cuccia grande',0,'Cani','<i class="fa-solid fa-dog"></i>'),
  new ProductType('giochi',102,'Palla','5','Gatti','<i class="fa-solid fa-cat"></i>'),
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

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php foreach($products as $product): ?>
    <div> <?php
      try {
        echo  $product->controlPrice($product->getPrize ());
      } catch (Exception $error){
        echo $error->getMessage();
      };
       echo $product->get_product() ?></div>
    <br>
  <?php endforeach;?>
</body>
</html>
<?php

//inizializziamo la classe
class Product{
  public $category;
  public $prodType;
  public $img;
  public $title;
  public $prize;
  
 

  function __construct($_category,$_prodType,$_img,$_title,$_prize)
  {
      
      $this-> category = $_category;
      $this-> prodType =$_prodType;
      $this-> img = $_img;
      $this-> title = $_title;
      $this-> prize = $_prize;
      
  }
};

// class Cibo extends Product{
//   private $category = 'cibo';

//    function __construct($_img,$_title){
//       parent:: __construct($_category,$_img,$_title,$_prize);
      
//   }
// }

//creaiamo le istanze
$crocchettePerGatti = new Product('gatto','cibo','imgCrocchetteGatti','Crocchette per gatti','10');
$cucciaGrande = new Product('cani','cucce','imgCucciaGrande','Palla','16');
$palla = new Product('gatto','giochi','imgPalla','Palla','5');


var_dump($crocchettePerGatti,$cucciaGrande,$palla)
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
  
</body>
</html>
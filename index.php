<?php

//inizializziamo la classe
class Product
{

  protected $id;
  protected $img;
  protected $title;
  protected $prize;



  function __construct($_id, $_title, $_prize)
  {
    $this->id = $_id;
    $this->title = $_title;
    $this->prize = $_prize;
  }

  function controlPrice($_prize)
  {
    if ($_prize === 0) {
      throw new Exception("Prezzo non valido <br>");
    };
  }


  public function getPrize()
  {
    return $this->prize;
  }
};


class ProductType extends Product
{
  private $prodType;

  use Category;

  function __construct($_prodType, $_id, $_title, $_prize, $_category, $_categoryIcon)
  {
    parent::__construct($_id, $_title, $_prize);
    $this->prodType = $_prodType;
    $this->setCategory($_category, $_categoryIcon);
  }

  public function getProduct()
  {

    return " {$this->title}, prezzo {$this->prize}$ - {$this->category} {$this->categoryIcon}";
  }

  public function getProductType()
  {

    return $this->prodType;
  }
}

trait Category
{
  private $category;
  private $categoryIcon;

  public function setCategory($_category, $_categoryIcon)
  {
    $this->category = $_category;
    $this->categoryIcon = $_categoryIcon;
  }
}





//creaiamo le istanze
// $crocchettePerGatti = new CategoryProduct('gatti','cibo','imgCrocchetteGatti','Crocchette per gatti','10');
// $cucciaGrande = new CategoryProduct('cani','cucce','imgCucciaGrande','Cuccia grande','16');
// $palla = new CategoryProduct('gatti','giochi','imgPalla','Palla','5');

$products = [
  new ProductType('cibo', 100, 'Crocchette per gatti', '10', 'Gatti', '<i class="fa-solid fa-cat"></i>'),
  new ProductType('cucce', 101, 'Cuccia grande', 0, 'Cani', '<i class="fa-solid fa-dog"></i>'),
  new ProductType('giochi', 102, 'Palla', '5', 'Gatti', '<i class="fa-solid fa-cat"></i>'),
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

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <h1 class="text-center">Prodotti per animali</h1>
  <div class="container d-flex my-2 gap-2">
    
  <?php foreach ($products as $product) : ?>
    
      <div class="card w-75 mb-3">
        <div class="card-body">
          <h5 class="card-title">Categoria:<?php echo $product->getProductType(); ?></h5>
          <p class="card-text"><?php
            try {
              echo  $product->controlPrice($product->getPrize());
            } catch (Exception $error) {
              echo $error->getMessage();
            };
            echo $product->getProduct() ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  

</body>

</html>
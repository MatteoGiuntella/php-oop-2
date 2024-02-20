<?php
require_once './traits/partnership.php';
class product
{   
    use partnership;
    public $name;
    public $image;
    public $price;
    public $category;
    public $stock;
    public $descriptions;
    public $ratings;


    function __construct(
        string $name,
        string $image,
        $price,
        string $category,
        int $stock,
        string $descriptions = 'not found',
        int $ratings = null
    )
    {
        $this->name = $name;
        $this->image = $image;
        if (is_numeric($price)) {
            $this->price = $price;
        }
        else {

            throw new Exception('Il valore del prezzo va inserito in numeri non in lettere');
        }
        $this->category = $category;
        $this->stock = $stock;
        $this->descriptions = $descriptions;
        $this->ratings = $ratings;
    }

}

?>
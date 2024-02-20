<?php
require_once __DIR__ . './product.php';
require_once './traits/partnership.php';

class cage extends product
{   
    use partnership;
    public $material;
    public $size;

    function __construct(
        $name,
        $image,
        $price,
        $category,
        $stock,
        $descriptions,
        $ratings,
        string $material,
        string $size
    
    ) {
        parent::__construct(
            $name,
            $image,
            $price,
            $category,
            $stock,
            $descriptions,
            $ratings,
            $material,
            $size
        );
    
        $this->material = $material;
        $this->size = $size;
    }
}


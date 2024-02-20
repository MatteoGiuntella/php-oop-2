<?php
require_once __DIR__ . './product.php';
require_once './traits/partnership.php';

class toys extends product
{   
    use partnership;
    public $materialtoys;
    public $isoutdoor;


    function __construct(
        $name,
        $image,
        $price,
        $category,
        $stock,
        $descriptions,
        $ratings,
        string $materialtoys,
        bool $isoutdoor
    ) {
        parent::__construct(
            $name,
            $image,
            $price,
            $category,
            $stock,
            $descriptions,
            $ratings,
            $materialtoys,
            $isoutdoor
        );
    
        $this->materialtoys = $materialtoys;
        $this->isoutdoor = $isoutdoor;
    }
}

?>
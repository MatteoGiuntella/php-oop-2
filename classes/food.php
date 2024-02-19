<?php
require_once __DIR__ . './product.php';

class food extends product
{
    public $expire;
    public $flavour;
    public $kg;


    function __construct(
        $name,
        $image,
        $price,
        $category,
        $stock,
        $descriptions,
        $ratings,
        string $expire,
        string $flavour,
        int $kg

    ) {
        parent::__construct(
            $name,
            $image,
            $price,
            $category,
            $stock,
            $descriptions,
            $ratings
        );

        $this->expire = $expire;
        $this->flavour = $flavour;
        $this->kg = $kg;
    }
}

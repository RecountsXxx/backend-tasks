<?php
class Category{
    private string $name;
    private array $list_products;

    public function __construct(string $name, array $list_products)
    {
        $this->name = $name;
        $this->list_products = $list_products;
    }
    public function getName() : string{
        return $this->name;
    }
    public function getListProducts() : array{
        return $this->list_products;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function setListProducts( array $list_products){
        $this->list_products = $list_products;
    }
    public function addProducts(string $product){
        $this->list_products[] = $product;
    }

}
<?php

require_once ROOT.'/models/Category.php';
require_once ROOT.'/models/Product.php';

require_once ROOT.'/config/db_params.php';

class ProductController
{
    public function actionIndex(){

        $categories = array();
        $categories = Category::getCategoryList(self::class);

        $allProduct = array();
        $allProduct = Product::getAll();

        require_once ROOT.'/view/product/view.php';
        return true;
    }

    public function actionCategory($category){

        $categories = array();
        $categories = Category::getCategoryList(self::class);

        $productsByCategory = array();
        $productsByCategory = Product::getProductsByCategory($category);

        require_once ROOT.'/view/product/view.php';
        return true;
    }

    public function actionView($idProduct)
    {
        $categories = array();
        $categories = Category::getCategoryList(self::class);

        $singleProduct = Product::getSingleProduct($idProduct);

        require_once ROOT.'/view/product/single.php';
        return true;
    }
}
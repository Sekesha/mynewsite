<?php

require_once ROOT. '/models/Product.php';
require_once ROOT. '/models/News.php';

class SiteController
{

    public function actionIndex(){

        $allProduct = array();
        $allProduct = Product::getAll();

        $allNews = array();
        $allNews = News::getAll();

        $all = array_merge($allNews, $allProduct);
        shuffle($all);
        require_once ROOT.'/view/site/index.php';
        return true;
    }

}
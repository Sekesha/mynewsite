<?php

require_once ROOT.'/models/Category.php';
require_once ROOT.'/models/News.php';

require_once ROOT.'/config/db_params.php';

class NewsController
{
    public function actionAll(){

        $categories = array();
        $categories = Category::getCategoryList(self::class);

        $allNews = array();
        $allNews = News::getAll();

        require_once ROOT.'/view/news/view.php';
        return true;
    }

    public function actionCategory($category){

        $categories = array();
        $categories = Category::getCategoryList(self::class);

        $newsByCategory = array();
        $newsByCategory = News::getNewsByCategory($category);

        require_once ROOT.'/view/news/view.php';
        return true;
    }

    public function actionView($idNews)
    {
        $categories = array();
        $categories = Category::getCategoryList(self::class);

        $singleNews = News::getSingleNews($idNews);

        require_once ROOT.'/view/news/single.php';
        return true;
    }


}
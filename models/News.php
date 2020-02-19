<?php


class News
{
    public static function getAll()
    {
        $db = Db::getConection();

        $allNews = array();

        $result = $db->query('SELECT * FROM news');

        $i = 0;
        while ($row = $result->fetch()){
            $allNews[$i]['id'] = $row['id'];
            $allNews[$i]['name'] = $row['name'];
            $allNews[$i]['short_order'] = $row['short_order'];
            $allNews[$i]['date'] = $row['date'];
            $allNews[$i]['category'] = $row['category'];
            $allNews[$i]['author'] = $row['author'];
            $allNews[$i]['image'] = $row['image'];
            $i++;
        }

        return $allNews;
    }


    public static function getNewsByCategory($idCategory)
    {
        $idCategory = intval($idCategory);

        $db = Db::getConection();
        $newsByCategory = array();

        $qr = 'SELECT * FROM news WHERE category = :category';

//        $result = $db->query('SELECT * FROM news WHERE category = '.$idCategory);
        $result = $db->prepare($qr);
        $result->bindParam(':category', $idCategory, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()){
            $newsByCategory[$i]['id'] = $row['id'];
            $newsByCategory[$i]['name'] = $row['name'];
            $newsByCategory[$i]['short_order'] = $row['short_order'];
            $newsByCategory[$i]['date'] = $row['date'];
            $newsByCategory[$i]['category'] = $row['category'];
            $newsByCategory[$i]['author'] = $row['author'];
            $newsByCategory[$i]['image'] = $row['image'];
            $i++;
        }

        return $newsByCategory;
    }

    public static function getSingleNews($idNews)
    {
        $idNews =intval($idNews);

        $db = Db::getConection();

        $result = array();

        $result = $db->query('SELECT * FROM news WHERE id = '.$idNews);

        return $result->fetch();
    }
}
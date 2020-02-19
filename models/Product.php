<?php


class Product
{
    public static function getAll()
    {

        $db = Db::getConection();

        $allProduct = array();

        $checkGetOrder = Product::checkGetOrder();

        $result = $db->query('SELECT * FROM product'.$checkGetOrder);

        $i = 0;
        while ($row = $result->fetch()){
            $allProduct[$i]['id'] = $row['id'];
            $allProduct[$i]['name'] = $row['name'];
            $allProduct[$i]['price'] = $row['price'];
            $allProduct[$i]['count'] = $row['count'];
            $allProduct[$i]['category'] = $row['category'];
            $allProduct[$i]['is_new'] = $row['is_new'];
            $allProduct[$i]['code'] = $row['code'];
            $allProduct[$i]['image'] = $row['image'];
            $i++;
        }

        return $allProduct;
    }

    public static function getProductsByCategory($idCategory)
    {
        $idCategory = intval($idCategory);

        $db = Db::getConection();
        $productsByCategory = array();

        $checkGetOrder = Product::checkGetOrder();

        $sql = 'SELECT * FROM product WHERE category = :category'.$checkGetOrder;

        $result = $db->prepare($sql);
        $result->bindParam(':category', $idCategory, PDO::PARAM_STR);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $productsByCategory[$i]['id'] = $row['id'];
            $productsByCategory[$i]['name'] = $row['name'];
            $productsByCategory[$i]['price'] = $row['price'];
            $productsByCategory[$i]['count'] = $row['count'];
            $productsByCategory[$i]['category'] = $row['category'];
            $productsByCategory[$i]['is_new'] = $row['is_new'];
            $productsByCategory[$i]['code'] = $row['code'];
            $productsByCategory[$i]['image'] = $row['image'];
            $i++;
        }

        return $productsByCategory;
    }

    public static function getSingleProduct($idNews)
    {
        $idNews =intval($idNews);
        $db = Db::getConection();

        $result = array();

        $sql = 'SELECT * FROM product WHERE id = :idNews';

        $result = $db->prepare($sql);
        $result->bindParam(':idNews', $idNews, PDO::PARAM_INT);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function checkGetOrder()
    {

        if(isset($_GET['order']))
        {
            if(($_GET['order'] === 'ASC') or ($_GET['order'] === 'DESC')){
                return ' ORDER BY product.price '.$_GET['order'];
            }
        }
        return '';
    }

}
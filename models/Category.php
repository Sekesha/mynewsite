<?php

class Category
{
    public static function getCategoryList($nameClass)
    {
        $db = Db::getConection();
        $categoryList = array();

        switch ($nameClass) {
            case 'NewsController' :
                $name_table = 'news';
                break;
            case 'ProductController':
                $name_table = 'products';
                break;
        }

        $result = $db->query('SELECT * FROM category_'.$name_table);

        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['category'] = $row['category'];
            $i++;
        }
        return $categoryList;
    }

}
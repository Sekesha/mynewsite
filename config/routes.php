<?php

return array(
    'register' => 'user/register',
    'login'=>'user/login',
    'logout'=> 'user/logout',

    'product/category/([0-9]+)'=>'product/category/$1',
    'product/view/([0-9]+)'=>'product/view/$1',
    'product' => 'product/index',

    'news/category/([0-9]+)' => 'news/category/$1',
    'news/view/([0-9]+)'=>'news/view/$1',
    'news' => 'news/all',

    '' => 'site/index'
);
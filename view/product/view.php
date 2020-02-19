<?php require_once ROOT . '/view/layout/header.php'; ?>

<section>
    <div class="sitebar">
        <div class="sitebar_form">
            <div class="sitebar_header">
                Категории
            </div>
            <div class="siteber_content">
                <a href="/news"><p>Новости</p></a>
                <a href="/product"><p>Каталог товаров</p></a>

                <?php require_once ROOT . '/view/catalog/category.php'; ?>

            </div>
        </div>
        <br>
        <br>
        <div class="sitebar_form">
            <div class="sitebar_header">
                Сортировка
            </div>
            <div class="siteber_content">
<!--                <a href="/product/order-by-ASC"><p class="sitebar_subcontent">По возрастанию цены</p></a>-->
<!--                <a href="/product/order-by-DESC"><p class="sitebar_subcontent">По убыванию цены</p></a>-->

                    <a href="<?php $_SERVER['REQUEST_URI']?>?order=ASC"><p class="sitebar_subcontent">По возрастанию цены</p></a>
                    <a href="<?php $_SERVER['REQUEST_URI']?>?order=DESC"><p class="sitebar_subcontent" >По убыванию цены</p></a>
            </div>
        </div>
    </div>
    </div>
    <div class="content">
            <div>
                <?php if(isset($allProduct)) $tempArray = $allProduct;
                elseif (isset($productsByCategory)) $tempArray = $productsByCategory;?>


                <?php foreach ($tempArray as $products): ?>
                    <div class="content_controller_product">
                        <img src="/template/images/products/<?php echo $products['image']; ?>">
                        <a href="/product/view/<?php echo $products['id']; ?>"><h4><?php echo $products['name']; ?></h4></a>
                        <br>
                        <p>Цена <?php echo $products['price']; ?> грн</p>
                        <p>Осталось на складе <?php echo $products['count']; ?> шт.</p>
<!--                        <p>--><?php //echo $products['is_new']; ?><!--</p>-->
                        <p>Артикул <?php echo $products['code']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
</section>


<?php require_once ROOT . '/view/layout/footer.php'; ?>

<?php require_once ROOT . '/view/layout/header.php'; ?>

<section>
    <div class="sitebar">
        <div class="sitebar_form">
            <div class="sitebar_header">
                Категории
            </div>
            <div class="siteber_content">
                <div>
                    <a href="/news"><p>Новости</p></a>
                </div>
                <a href="/product"><p>Каталог товаров</p></a>
                <?php require_once ROOT . '/view/catalog/category.php'; ?>
            </div>


        </div>
    </div>
    </div>
    <div class="content">
        <div>

            <div class="content_single_view_product">
                <a href="/product/view/<?php echo $singleProduct['id']; ?>">
                    <h2><?php echo $singleProduct['name']; ?></h2></a>
                <br>
                <img src="/template/images/products/<?php echo $singleProduct['image']; ?>">
                <br>
                <p><h3>Цена <?php echo $singleProduct['price']; ?> грн</h3></p>
                <form action="" method="post">
                    <input type="button" class="style_button_bay" name="bay" value="купить">
                </form>
                <br>
                <p>Осталось на складе <?php echo $singleProduct['count']; ?> шт</p>
                <br>
                <p>
                <h3>Характеристики товара</h3> <br><br> <?php echo $singleProduct['description']; ?></p>
                <br>
                <p>Артикул <?php echo $singleProduct['code']; ?></p>
            </div>

        </div>
    </div>
</section>


<?php require_once ROOT . '/view/layout/footer.php'; ?>

<?php ?>

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
                </div>
            </div>
        </div>
        </div>


        <div class="content">
               <?php foreach ($all as $item): ?>
                <div>
                    <?php if (array_key_exists('price', $item)): ?>
                        <div class="content_controller">
                            <img src="/template/images/products/<?php echo $item['image']; ?>">
                            <a href="/product/view/<?php echo $item['id']; ?>"><h4><?php echo $item['name']; ?></h4></a>
                            <br>
                            <p>Цена <?php echo $item['price']; ?> грн</p>
                            <p>Осталось на складе <?php echo $item['count']; ?> шт.</p>
                            <!--                        <p>--><?php //echo $products['is_new']; ?><!--</p>-->
                            <p>Артикул <?php echo $item['code']; ?></p>
                        </div>
                    <?php else: ?>
                        <div class="content_controller">
                            <img src="/template/images/news/<?php echo $item['image']; ?>">
                            <a href="/news/view/<?php echo $item['id']; ?>"><h4><?php echo $item['name']; ?></h4></a>
                            <br>
                            <p><?php echo $item['short_order']; ?></p>
                            <p><?php echo $item['author']; ?></p>
                            <p><?php echo $item['date']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>


        </div>
    </section>

<?php require_once ROOT . '/view/layout/footer.php'; ?>
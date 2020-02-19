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
                        <?php require_once ROOT . '/view/catalog/category.php'; ?>
                    </div>
                    <a href="/product"><p>Каталог товаров</p></a>
                </div>


            </div>
        </div>
        </div>
        <div class="content">
            <div>

                        <div class="content_single_view">
                            <a href="/news/view/<?php echo $singleNews['id']; ?>"><h2><?php echo $singleNews['name']; ?></h2></a>
                            <br>
                        <img src="/template/images/news/<?php echo $singleNews['image']; ?>">

                        <br>
                        <p><?php echo $singleNews['content']; ?></p>
                            <br>
                        <p><?php echo $singleNews['author']; ?></p>
                        <p><?php echo $singleNews['date']; ?></p>
                    </div>

            </div>
        </div>
    </section>


<?php require_once ROOT . '/view/layout/footer.php'; ?>

<?php ?>

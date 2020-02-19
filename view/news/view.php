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
                <?php if(isset($allNews)) $tempArray = $allNews;
                elseif (isset($newsByCategory)) $tempArray = $newsByCategory;?>

                    <?php foreach ($tempArray as $news): ?>
                        <div class="content_controller">
                            <img src="/template/images/news/<?php echo $news['image']; ?>">
                            <a href="/news/view/<?php echo $news['id']; ?>"><h4><?php echo $news['name']; ?></h4></a>
                            <br>
                            <p><?php echo $news['short_order']; ?></p>
                            <p><?php echo $news['author']; ?></p>
                            <p><?php echo $news['date']; ?></p>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </section>


<?php require_once ROOT . '/view/layout/footer.php'; ?>

<?php ?>
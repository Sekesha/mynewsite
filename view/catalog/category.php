

<?php if (stristr(self::class, "NewsController"))   //определяем категорию news или product для href
        $linkPath = 'news';
    elseif (stristr(self::class, "ProductController"))
        $linkPath = 'product';
    ?>

    <?php foreach ($categories as $category): ?>

        <a href="/<?php echo $linkPath;?>/category/<?php echo $category['category'] ?>">
            <p class="sitebar_subcontent"> <?php echo $category['name'] ?> </p>
        </a>
    <?php endforeach; ?>


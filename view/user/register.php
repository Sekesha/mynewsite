<?php require_once ROOT . '/view/layout/header.php'; ?>


    <section>
        <div class="content_controller_user">
            <div class="signup-form">
                <?php if ($result): ?>
                    <h2>Вы зарегистрированы</h2>
                <?php else: ?>
                    <h2>Регистрация на сайте</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Введите логин" value="<?php echo $_POST['name']?>">
                        <input type="email" name="email" placeholder="Введите Email" value="<?php echo $_POST['email']?>">
                        <input type="password" name="password" placeholder="Введите пароль">
                        <input type="password" name="password_verify" placeholder="Введите пароль">
                        <input type="submit" name="submit" value="Регистрация">
                    </form>
            </div>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <div class="signup-form-errors">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

<?php include_once(ROOT . '/view/layout/footer.php'); ?>
<?php ?>
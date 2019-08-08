<?php require_once(VIEW_PATH . 'layouts/header.php') ?>

<div class="container">

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <strong>Ошибка!</strong>
            <?php foreach ($errors as $key) : ?>
                <?= $key ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Авторизация</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" action="login" method="post">
                                    <div class="form-group">
                                        <label for="uname1">Логин</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="login" id="userid" required>
                                        <div class="invalid-feedback">Нужно ввести Имя пользователя</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Пароль</label>
                                        <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password" required autocomplete="new-password">
                                        <div class="invalid-feedback">Введите пароль</div>
                                    </div>
                                    <div>
                                        <span class="custom-control-description small text-dark">Логин: admin <br> Пароль: 123</span>

                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Войти</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once(VIEW_PATH . 'layouts/footer.php') ?>
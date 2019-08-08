<?php require_once(VIEW_PATH . 'layouts/header.php')?>

<div class="container">
    <div class="row">
        <?php  if (!empty($errors)):?>
            <div class="alert alert-danger">
                <strong>Ошибка!</strong>
                <?php foreach ($errors as $key):?>
                    <?= $key ?>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</div>
 <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Добавление задачи</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" id="createTask" action="/task/create" method="post">
                                <div class="form-group">
                                    <label for="inputName">Имя пользователя</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" id="inputName" aria-describedby="emailHelp" placeholder="Введите имя" name="name" required value="<?= isset($data['name']) ? $data['name'] : '' ?>">
                                    <div class="invalid-feedback">Нужно ввести Имя пользователя</div>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control form-control-lg rounded-0" id="inputEmail" aria-describedby="emailHelp" placeholder="Введите E-mail" name="email" required value="<?= isset($data['email']) ? $data['email'] : '' ?>">
                                    <div class="invalid-feedback">Введите e-mail</div>
                                </div>
                                <div class="form-group">
                                    <label>Текст задачи</label>
                                    <textarea class="form-control form-control-lg rounded-0" id="textDescription" rows="3" name="description" required ><?= isset($data['description']) ? $data['description'] : '' ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right">Добавить задачу</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(VIEW_PATH . 'layouts/footer.php')?>

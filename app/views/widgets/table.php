<div class="col-md-12 py-5">
    <h2>Список задач</h2>
    <div class="table-responsive py-4">
        <table id="mytable" class="table table-bordred table-striped">
            <thead class="thead-dark">
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Текст задачи</th>
                <th scope="col">Cтатус</th>
                <?php if (isset($_SESSION['signinUser'])) { ?>
                    <th scope="col">Изменить</th>
                    <th scope="col">Удалить</th>
                <?php } ?>
            </thead>
            <tbody>
                <?php if (sizeof($tasks)) : ?>
                    <?php foreach ($tasks as $key => $val) : ?>
                        <tr>
                            <td><?= $val['name']  ?></td>
                            <td><?= $val['email'] ?></td>
                            <td style="width: 360px;"><?= $val['description'] ?></td>
                            <td><?= $val['status'] ? '<span class="badge badge-pill badge-success">отредактировано администратором</span>' : '<span>-</span>' ?></td>

                            <?php if (isset($_SESSION['signinUser'])) { ?>
                                <td><a href="/task/update/<?= $val['id']  ?>" class="btn btn-primary btn-sm">Изменить</a></td>
                                <td><a class="btn btn-danger btn-sm delete-btn" href="/task/delete/<?= $val['id'] ?>">Удалить</a></td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h5>Задач нет</h5>
                    <p>Чтобы добавить задачу, нажмите кнопку "Новая задача"</p>
                <?php endif; ?>

            </tbody>
        </table>

        <div class="clearfix"></div>

        <div>
            <?= $pagination->get(); ?>
        </div>

    </div>
</div>
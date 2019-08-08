<?php

namespace app\controllers;

use app\core\BaseController;
use app\core\Pagination;
use app\models\TaskModel;

class TaskController extends BaseController
{

    /**
     * Home page
     */
    public function actionIndex($page = 1)
    {
        $tasksList  = TaskModel::getTasks($page);
        $countTasks = TaskModel::getCountTask();


        $pagination = new Pagination($countTasks[0], $page, TaskModel::SHOW_BY_DEFAULT, '');

        $this->render('site/index', [
            'tasks'       => $tasksList,
            'pagination'  => $pagination,
        ]);
    }

    /**
     * Create new Task
     */
    public function actionCreate()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' &&  !empty($_POST)) {
            $formData = $_POST;

            if (TaskModel::createTask($formData)) {
                header('Location: /');
            }
        }

        $this->render('task/create');
    }




    /**
     * Update row from Task
     * @param $id
     */
    public function actionUpdate($id)
    {
        $this->accessUser();

        if($_SERVER['REQUEST_METHOD'] == 'POST' &&  !empty($_POST)) {

            $formData = $_POST;

            if($formData['status'] == 'on') {
                $formData['status'] = 1;

            }else if(!isset($formData['status'])) {
                $formData['status'] = 0;
            }

            if (TaskModel::updateTask($id, $formData)) {
                header('Location: /');
            }
        }

        $this->render('task/update', [
            'data' => TaskModel::getTaskByid($id)
        ]);
    }

    /**
     * Delete row from Task
     * @param $id
     */
    public function actionDelete($id)
    {
        $this->accessUser();

        if (TaskModel::deleteTask($id)) {
            header('Location: /');
        }

    }

}
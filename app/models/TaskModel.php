<?php

namespace app\models;

use app\core\BaseModel;

/**
 * Class TaskModel
 * @package app\models
 * Responsible for fetching and working with tasker table
 */
class TaskModel extends BaseModel
{
    # View task count on page (Pagination)
    const SHOW_BY_DEFAULT = 3;

    /**
     * Get all tasks
     * @param $page
     * @return array
     */
    public static function getTasks($page)
    {
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $sql = "SELECT * FROM tasks LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET $offset";

        $res = self::dbConnect()->query($sql);

        return $res->fetchAll();
    }

    /**
     * Get count tasks
     * @return mixed
     */
    public static function getCountTask()
    {

        $sql = "SELECT COUNT(id) FROM tasks";

        $res = self::dbConnect()->query($sql);

        return $res->fetch();
    }

    /**
     * Get task by id
     * @param $id
     * @return mixed
     */
    public static function getTaskByid($id)
    {
        $sql = "SELECT * FROM tasks WHERE id = :id";

        $res = self::dbConnect()->prepare($sql);

        $res->bindValue(':id', $id, \PDO::PARAM_INT);
        $res->execute();

        return $res->fetch();
    }

    /**
     * Update task
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updateTask($id, $data)
    {
        $sql = "UPDATE tasks set description = :description, status = :status WHERE id = $id";

        $res = self::dbConnect()->prepare($sql);

        $res->execute([
            'description'  => $data['description'],
            'status'    => $data['status'],
        ]);

        return true;
    }

    /**
     * Create new task
     * @param array $data
     * @return bool
     */
    public static function createTask($data = [])
    {
        $sql = "INSERT INTO tasks(name, email, description)
                VALUES(:name, :email, :description)";

        $res = self::dbConnect()->prepare($sql);

        $res->execute([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'description' => $data['description'],
        ]);

        return true;
    }

    /**
     * Delete task
     * @param $id
     * @return bool
     */
    public static function deleteTask($id)
    {
        $sql = "DELETE FROM tasks WHERE id = :id";

        $res = self::dbConnect()->prepare($sql);
        $res->bindParam(':id', $id);
        $res->execute();

        return true;
    }
}

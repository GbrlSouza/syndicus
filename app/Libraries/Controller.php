<?php

class Controller
{
    public function model(string $model)
    {
        require_once './../app/Models/' . $model . '.php';
        return new $model;
    }

    public function view(string $view, $data = [])
    {
        $file = './../app/Views/' . $view . '.php';

        if (!file_exists($file)) {
            die('View does not exist');
        }

        extract($data);
        require $file;
    }
}

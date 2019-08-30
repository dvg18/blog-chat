<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 28.08.19
 * Time: 1:34
 */
use Controllers\MainController;
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $model_name = $controller_name . 'Model';
        $controller_name = $controller_name . 'Controller';
        $action_name = 'action' . ucfirst($action_name);

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = ucfirst($model_name).'.php';
        $model_path = "engine/models/".$model_file;
        if(file_exists($model_path))
        {
            include "engine/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name .'.php';
        $controller_path = "../engine/controllers/".$controller_file;

        if(file_exists($controller_path))
        {
            var_dump($controller_name);
            include "engine/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;
        var_dump($controller);
        var_dump($action);

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        die('404');
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'');
    }
}
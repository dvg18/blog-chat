<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 29.08.19
 * Time: 19:04
 */

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function actionIndex()
    {
    }

}
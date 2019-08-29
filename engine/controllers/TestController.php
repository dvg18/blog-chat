<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 29.08.19
 * Time: 20:33
 */

namespace controllers;
use models\TestModel;
use views;


class TestController extends \Controller
{
    /**
     * TestController constructor.
     */
    function __construct()
    {
        $this->model = new TestModel();
        $this->view = new \View();
    }

    function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('test_view.php', 'template_view.php', $data);
    }

}
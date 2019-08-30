<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 29.08.19
 * Time: 20:25
 */

namespace Controllers;


class MainController extends \Controller
{
    function actionIndex()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }

}
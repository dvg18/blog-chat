<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 29.08.19
 * Time: 19:02
 */

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'engine/views/'.$template_view;
    }

}
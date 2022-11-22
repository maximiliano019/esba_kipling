<?php

use Views\Layout;

class Render{

    private $layout;
    private $view;
    private $context;

    public function __construct($layout, $view, $context)
    {
        $this -> $layout = $layout;
        $this -> $view = $view;
        $this -> $context = $context;
    }

    public static function html($layout, $view, $context){
        /* context seria el array con contenido a usar */
        extract($context, EXTR_PREFIX_SAME, "wddx");

        $layout = new $layout($context);
        require_once("./views/".$view.".php");
    }    



}
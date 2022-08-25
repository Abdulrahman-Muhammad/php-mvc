<?php

namespace Abdelrahman\PhpMvc\View;

class view
{

    public static function make()
    {

        $baseContent = self::getBaseContent();

        $viewContnet = self::getViewContnet($view, $params);
    }
}

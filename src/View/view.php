<?php

namespace Abdelrahman\PhpMvc\View;

class view
{

    public static function make($view, $params = [])
    {

        $baseContent = self::getBaseContent();

        $viewContnet = self::getViewContnet($view, params: $params);

        echo  str_replace('{{content}}',  $viewContnet, $baseContent);
    }

    protected static function getBaseContent()
    {

        ob_start();

        include base_path() . 'Views/layouts/main.php';

        return ob_get_clean();
    }


    protected static function getViewContnet($view, $isErrors = false, $params = [])
    {

        $path = $isErrors ? view_path() . '/errors' : view_path();

        if (str_contains($view, '.')) {

            $views = explode('.', $view);

            foreach ($views as $view) {
                if (is_dir($path . $view)) {
                    $path = $path . $view . '/';
                }
            }

            $view = $path . end($views) . '.php';
        }else {

            $view = $path . $view . '.php';
        }

        var_dump($view);


    }
}

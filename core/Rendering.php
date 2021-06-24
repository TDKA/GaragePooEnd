<?php


class Rendering {

    /**
 * generates data rendering 
 * 
 * @param string $template
 * @param array $data
 * 
 */
    public static function render(string $template, array $data):void {

    extract($data);

    ob_start();

     require_once "templates/".$template.".html.php";

    $contentOfThePage = ob_get_clean();

    require_once "templates/layout.html.php";

    

    }
}



?>
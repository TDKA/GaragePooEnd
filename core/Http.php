
<?php


class Http {

    /**
     * redirect to the url in parameter
     * 
     * @param string
     */

 public static function redirect(string $url): void {

        header("Location:".$url);
    
    }

}


?>
<?php /**
 * Class Autoloader
 */
namespace Framework;
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class)
    {
        $filename = $class . '.php';

        if(file_exists($filename))
        {
            require $class . '.php';
        }
        else
        {
            require 'Modele/' . $class . '.php';
        }

    }

}
 ?>

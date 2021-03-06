<?php
/**
 * Test Constants
 */
if (!defined('PARTICLE_PATH_APPS')) {
    return false;
}

/**
 * Autoload de Entidades de base de datos con Spot ORM
 */
spl_autoload_register(function ($ClassNameWithNameSpace) {

    $aNamespace = array('Particle\Apps\Entities\\', 'Particle\Apps\Entities\Mapper\\');

    foreach ($aNamespace as $sNamespace) {
        if (substr($ClassNameWithNameSpace, 0, strlen($sNamespace)) === $sNamespace) {
            $nameClass = substr($ClassNameWithNameSpace, strlen($sNamespace));

            $filePath = ROOT . str_replace('\\', '/', $ClassNameWithNameSpace) . '.php';

            if (!is_readable($filePath)) {
                foreach (glob(PARTICLE_PATH_APPS.'Entities'.DS.'*', GLOB_ONLYDIR) as $dir) {
                    $subDir= basename($dir);
                    $filePath = PARTICLE_PATH_APPS.'Entities'.DS.$subDir.DS.$nameClass.'.php';
                    if (is_readable($filePath)) {
                        require_once $filePath;
                        break;
                    }
                }
            } else {
                require_once $filePath;
            }
        }
    }

    return true;
});

/**
 * Autoload de Controllers
 */
spl_autoload_register(function ($ClassNameWithNameSpace) {
    $namespace = 'Particle\Apps\Controllers\\';

    if (substr($ClassNameWithNameSpace, 0, strlen($namespace)) === $namespace) {
        $nameClass = substr($ClassNameWithNameSpace, strlen($namespace));

        $filePath = PARTICLE_PATH_APPS.'Controllers'.DS.$nameClass.'.php';

        if (!is_readable($filePath)) {
            foreach (glob(PARTICLE_PATH_APPS.'Controllers'.DS.'*', GLOB_ONLYDIR) as $dir) {
                $subDir= basename($dir);
                $filePath = PARTICLE_PATH_APPS.'Controllers'.DS.$subDir.DS.$nameClass.'.php';
                if (is_readable($filePath)) {
                    require_once $filePath;
                    break;
                }
            }
        } else {
            require_once $filePath;
        }
    }
    return true;
});

/**
 * Autoload de Addons
 */
spl_autoload_register(function ($ClassNameWithNameSpace) {
    $namespace = 'Particle\Apps\Addons\\';

    if (substr($ClassNameWithNameSpace, 0, strlen($namespace)) === $namespace) {
        $nameClassFull = substr($ClassNameWithNameSpace, strlen($namespace));
        $nameClass = str_replace('Addons', '', $nameClassFull);

        $filePath = ADDONS_PATH.$nameClass.DS.'init.php';

        if (is_readable($filePath)) {
            require_once $filePath;
        }
    }
    return true;
});

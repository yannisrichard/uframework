<?php


$map = [
	__DIR__ .'/src/',
	__DIR__ .'/tests/',
	__DIR__ .'/app/',
	__DIR__ .'/web/'
];

/* register autoloader here */
//NB : Revoir autoload.bak de psr0


$autoloader = function ($className) use ($map) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
      $namespace = substr($className, 0, $lastNsPos);
      $className = substr($className, $lastNsPos + 1);
      $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists ($fileName)) {
      require $fileName;
    } else {
      foreach ($map as $value) {
        if (file_exists($value.$fileName)) {
          require $value.$fileName;
          return;
         }
      }
    }
  };

spl_autoload_register($autoloader);




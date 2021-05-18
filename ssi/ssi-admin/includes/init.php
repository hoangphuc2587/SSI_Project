<?php

 /**
  * Include the controller class.
  */
 include __SITE_PATH . '/includes/' . 'controller_base.class.php';

 /**
  * Include the registry class.
  */
 include __SITE_PATH . '/includes/' . 'registry.class.php';

 /**
  * Include the router class.
  */
 include __SITE_PATH . '/includes/' . 'router.class.php';

 /**
  * Include the template class.
  */
 include __SITE_PATH . '/includes/' . 'template.class.php';


session_start();
/**
 * Load model classes.
 */
spl_autoload_register(function($class) {
    /**
     * Include the baseModel class.
    */
    include_once (__SITE_PATH . '/includes/' . 'model_base.class.php');

    /* Get the route from the url. */
    $route = (empty($_GET['rt'])) ? '' : $_GET['rt'];

    /* Assume that the class is defined within the model directory. */
    $fileName = __SITE_PATH . '/model/' . 'mdl_' . strtolower($route) . '.php';

    /* Return false if the file does not exist. */
    if (file_exists($fileName) == false)
    {
        return false;
    }

    /* The file exists. Include it. */
    include_once ($fileName);
});

/* Instantiate a new registry. */
 $registry = new registry;

?>

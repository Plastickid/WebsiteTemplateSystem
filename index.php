<?php

/*
 * The include file has to contain the following values:
 *   Array('filename' => string, -- Filename for template
 *         'data' => Array())    -- Array with data for the template
 *         'title' => string,    -- Title of the page
 *         'main-design' => boolean, -- true if not set
 * - At an exception 
 *   string  -- Errormessage.
 */


//include all needed php files
//contains the links to the sites and the sitenames
include 'sites.php';
//contains the settings
include 'settings.php';
//contains all the constant messages
include 'constants.php';
//contains all the util functions
include 'functions.php';
//contains user specific functions
include 'classes/user/user.class.php';

//create new MySQLi instance with given login details from settings.php
$db = new MySQLi($mySQLHost, $mySQLUser, $mySQLPassword, $mySQLDatabase);

//check if mysql connection was successful
if (mysqli_connect_errno()) {
    //connection not successful, display mysqli error message
    echo '<p>Could not connect to the database, MySQL said: ' . mysqli_connect_error() . '</p>';
} else {
    //connection successful
    //run prepareDB function in functions.php
    prepareDB($db);

    //set sites timezone
    date_default_timezone_set('Europe/Berlin');


    //standard values of variables, variable defining
    $usedesign = true;
    $title = 'No page title was set';
    $page = 'main';


    //check if specific page was accessed
    if (isset($_GET['page'])) {
        $page = strtolower(trim($_GET['page'], "/"));
        if (!isset($files[$page])) {
            $page = 'notfound';
        }
    }

    //check if page string actually exists in sites.php
    if (isset($files[$page])) {
        if (file_exists('includes/' . $files[$page])) {
            $ret = include 'includes/' . $files[$page];
        } else {
            include 'templates/header.php';
            showError("Include-File was not found: 'includes/" . $files[$page] . "'");
            include 'templates/footer.php';
            return;
        }
    } else {
        $ret = include 'includes/' . $files['notfound'];
    }


    //Search for title and main-design, has to happen before header template gets included
    if (is_array($ret)) {
        if (isset($ret['title'])) {
            $title = $ret['title'];
        }
        if (isset($ret['main-design'])) {
            $usedesign = $ret['main-design'];
        }
    } else if (is_string($ret)) {
        $title = 'Error';
    }

    //include header template
    include 'templates/header.php';

    //check if return array is correctly
    if (is_array($ret) && isset($ret['filename'], $ret['data']) && is_string($ret['filename']) && is_array($ret['data'])) {
        //check if given template file exists
        if (file_exists($file = 'templates/' . $ret['filename'])) {
            $data = $ret['data'];
            //include template file
            include $file;
        } else {
            //template file not found
            showError('Template "' . $file . '" was NOT found.');
        }
    } else if (is_string($ret)) {
        //include returns a string -> display as error message
        showError($ret);
    } else if (1 === $ret) {
        //include does not return anything
        showError("No return in the include file!");
    } else {
        //include returns something we don't handle (like boolean for ex)
        showError("Include file has an invalid return.");
    }

    //include footer template
    include 'templates/footer.php';
}

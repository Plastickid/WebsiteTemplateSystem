<?php

/**
 * Print info message. Needs to be returned by include file
 * @param String $msg
 * @return array
 */
function showInfo($msg) {
    echo '<div class="container has-text-centered"><div class="notification is-info"><button class="delete"></button>' . $msg . '</div></div>';
}

function showError($msg) {
    echo '<div class="container has-text-centered"><div class="notification is-danger"><button class="delete"></button>' . $msg . '</div></div>';
}

/**
 * Prepare database for usage and create needed tables
 * @param MySQLi $db
 * @return boolean
 */
function prepareDB($db) {
    if (!is_object($db)) {
        return false;
    }
    if (!($db instanceof MySQLi)) {
        return false;
    }

    $sql = "CREATE TABLE IF NOT EXISTS user ("
            . "ID INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT, "
            . "username varchar(64) NOT NULL, "
            . "email varchar(64) NOT NULL, "
            . "password varchar(128) NOT NULL DEFAULT 'EMPTY', "
            . "role varchar(16) NOT NULL DEFAULT 'USER', "
            . "logo varchar(265) NOT NULL DEFAULT '/design/img/avatar.png', "
            . "banned tinyint(1) NOT NULL DEFAULT '0'"
            . ");";
    $db->query($sql)or die(mysqli_error($db));
}

/**
 * if the user is not loggedin, it returns false. Else the UserID
 * @param MySQLi $db
 * @return boolean|integer
 */
function getUserID() {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['userid'])) {
        return false;
    }
    $userid = $_SESSION['userid'];
    return $userid;
}

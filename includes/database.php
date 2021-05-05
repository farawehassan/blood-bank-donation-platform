<?php

date_default_timezone_set('Africa/Lagos');

$live = TRUE;

// Database Constants

if ($live):
    defined('DB_SERVER') ? null : define("DB_SERVER",   "us-cdbr-east-03.cleardb.com");
    defined('DB_USER')   ? null : define("DB_USER",     "b2ca5d9398c78d");
    defined('DB_PASS')   ? null : define("DB_PASS",     "6f7ccd8f");
    defined('DB_NAME')   ? null : define("DB_NAME",     "heroku_630f20cec1cb635");
else:
    defined('DB_SERVER') ? null : define("DB_SERVER",   "localhost");
    defined('DB_USER')   ? null : define("DB_USER",     "root");
    defined('DB_PASS')   ? null : define("DB_PASS",     "");
    defined('DB_NAME')   ? null : define("DB_NAME",     "donorapp");
endif;

// Connect to database
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$connection)
    die("Database connection failed: " .mysqli_connect_error() ." (" .mysqli_connect_errno(). ")");

$last_query = "";

// Database functions

function escape_value($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function confirm_query($result)
{
    global $connection, $last_query;

    if (!$result)
    {
        $output = "Database query failed: " . mysqli_error($connection) . "<br /><br />";
        $output .= "Last SQL query: " . $last_query;
        die($output);
    }

    return true;
}

function fetch_result($result_set)
{
    global $connection;

    // Returns each row as an associative array
    $results    = [];
    $index      = 1;
    while($row = mysqli_fetch_assoc($result_set))
    {
        $results[$index] = $row;
        $index++;
    }
    mysqli_free_result($result_set);
    return $results;
}

function close_connection()
{
    global $connection;

    if (isset($connection))
        mysqli_close($connection);
}

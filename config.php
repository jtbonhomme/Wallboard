<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Australia/Melbourne" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=wallboard" );
define( "DB_USERNAME", "wallboard" );
define( "DB_PASSWORD", "aH7YCmNefWAFFc4v" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/Article.php" );
require( CLASS_PATH . "/Team.php" );
require( "functions.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
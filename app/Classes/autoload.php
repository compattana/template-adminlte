<?php

$files = glob( __DIR__ . "/*.php" );
foreach ( $files as $file )
{
    $filename = (string) $file;
    if ( strpos( $filename, '.php' ) !== false && $filename !== 'autoload.php')
    {
        require_once $filename;
    }
}

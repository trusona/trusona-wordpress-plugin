#!/usr/bin/env php
<?php

$file = 'trusona-includes.phar';
$gzFile = $file . '.gz';

if(file_exists($file)) {
  unlink(realpath($file));
}

if(file_exists($gzFile)) {
  unlink(realpath($gzFile));
}

$p = new Phar($file);
$p->buildFromDirectory('includes/');
$p->compress(Phar::GZ);

unlink(realpath($file));

`mv $gzFile phar/`;

echo "$file successfully created\n";

?>

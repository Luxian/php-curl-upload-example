<?php
header('Content-Type: text/plain');
ini_set('html_errors', 0); // disable xdebug html output

echo "POST:\n\n";
print_r($_POST);

echo "FILES:\n\n";
print_r($_FILES);

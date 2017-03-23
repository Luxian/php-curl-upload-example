<?php
header('Content-Type: text/plain');
ini_set('html_errors', 0); // disable xdebug HTML output

$url  = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
$url .= $_SERVER['SERVER_PORT'] == '80' ? '' : ':' . $_SERVER['SERVER_PORT'];
$url .= dirname($_SERVER['SCRIPT_NAME']);
$url .= '/receive.php';

$options = array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => TRUE,
  CURLOPT_SAFE_UPLOAD => FALSE,
  CURLOPT_POSTFIELDS => array(
    'text1' => 'test',
    'submit' => 'Send!',
    'file1' => '@' . realpath('assets/random.txt'),
    'file2' => '@' . realpath('assets/GitHub-Logo.png'),
  ),
);

$ch = curl_init();

// Needed for PHP > 5.5 to keep the enable behavior of uploading file.
// Make sure to include this before CURLOPT_POSTFIELDS. If you add it to
// $options array, it needs to be before CURLOPT_POSTFIELDS. Or you can just
// set it like this before calling curl_setopt_array().
// Setting it after CURLOPT_POSTFIELDS will result in those fields being send
// as normal text fields instead.
if (defined('CURLOPT_SAFE_UPLOAD')) {
  curl_setopt($ch, CURLOPT_SAFE_UPLOAD, FALSE);
}

curl_setopt_array($ch, $options);
$content = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

echo "Status: "; print_r($info); echo "\n";
echo "Content: \n" . $content;

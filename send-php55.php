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
  CURLOPT_POSTFIELDS => array(
    'text1' => 'test',
    'submit' => 'Send!',
    'file1' => curl_file_create(realpath('assets/random.txt')),
    'file2' => curl_file_create(realpath('assets/GitHub-Logo.png')),
  ),
);

$ch = curl_init();
curl_setopt_array($ch, $options);
$content = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

echo "Status: "; print_r($info); echo "\n";
echo "Content: \n" . $content;

/*

The output I get suggest that the upload works, 
but it's hitting some server limit regarding file size

Array
(
    [errors] => Array
        (
            [0] => Array
                (
                    [code] => 25
                    [message] => the size of file exceeds the maximum file size cap for the current plan
                    [context] => Array
                        (
                            [file_size] => 3028
                            [maximum_file_size] => 1024
                        )

                )

        )

)
*/

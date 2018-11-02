# php-curl-upload-example
Simple example to explain how to upload files using CURL

## Files:
- `form.php` is the html form PHP scripts try to mimic
- `receive.php` is a small script that will print everything that's send to it
- `send-legacy.php` is using old method of sending files and should be used only with PHP versions before 5.5
- `send-php55.php` is a the new way of sending files and uses [curl_file_create()](http://php.net/manual/en/function.curl-file-create.php) ([rfc:curl-file-uploads](https://wiki.php.net/rfc/curl-file-upload))

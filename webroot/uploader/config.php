<?php
define('DB_NAME', 'tripspend'); //Database name
define('DB_USER', 'root'); //Database user
define('DB_PASS', ''); //Database password
define('DB_HOST', 'localhost'); //Database host
define('DB_TABLE', 'casino_images'); //Table name to store upload data

define('UPLOAD_DIR', '../files/'); //Files path

define('IMG_MAX_WIDTH', 1280); //Image max width 
define('IMG_MAX_HEIGHT', 720); //Image max height

define('THUMBNAIL_WIDTH', 300); //Thumbnail width 
define('THUMBNAIL_HEIGHT', 300); //Thumnail height

$limit	=	100;

define('UPLOAD_LIMIT',$limit); //Max number of images that can be uploaded 

define('ACCEPT_FILE_TYPES', 'jpeg|jpg|png|gif'); //Filetypes allowed for upload

?>
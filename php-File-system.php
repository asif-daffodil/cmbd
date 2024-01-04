<?php
// basename
$path = $_SERVER['PHP_SELF'];
echo basename($path);
echo "<br>";

// dirname
echo dirname($path);

// copy
// copy('test.txt', 'test2.txt');

// file()
$data = file('test.txt');
echo "<pre>";
print_r($data);
echo "</pre>";

// file_exists
if (file_exists('test.txt')) {
    echo "File exists";
} else {
    echo "File not exists";
}
echo "<br>";

// file_put_contents
file_put_contents('test.txt', 'Hello World');

// file_get_contents
$data = file_get_contents('test.txt');
echo $data . "<br>";

// filesize
echo filesize('test.txt') . "<br>";

// filetype
echo filetype('uploads') . "<br>";

// is_dir
if (is_dir('uploads')) {
    echo "It is a directory";
} else {
    echo "It is not a directory";
}
echo "<br>";

// is_file
if (is_file('test.txt')) {
    echo "It is a file";
} else {
    echo "It is not a file";
}

// link
// link('test.txt', 'test3.txt');

// unlink
// unlink('test3.txt');

// mkdir
if (!is_dir('test')) {
    mkdir('test');
}

// rmdir
rmdir('test');

// move_uploaded_file()

// pathinfo
echo "<pre>";
print_r(pathinfo($path));
echo "</pre>";

echo pathinfo($path)['extension'];

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/conv', function () {
    $lines = file('test.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $utf8Data = [];
    $dataArr = [];

    foreach ($lines as $line) {
        $utf8Data[] = mb_convert_encoding(trim($line), "utf-8", "windows-1251");
    }

    foreach ($utf8Data as $data) {
        $dataArr[] = explode(';', $data);
    }

    dump($dataArr);

});

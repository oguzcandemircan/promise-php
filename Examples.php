<?php

require 'vendor/autoload.php';

Promise::run(function ($resolve, $reject) {
    if (true) {
        $resolve('passed');
    } else {
        $reject('not passed !');
    }
})->then(function ($data) {
    echo "$data\n";
})->catch(function ($data) {
    echo $data;
})->then(function ($data) {
    // echo $data . 'ocdcd';
});

(new Promise(function ($resolve, $reject) {
    if (true) {
        $resolve('passed');
    } else {
        $reject('not passed !');
    }
}))->then(function ($data) {
    echo $data;
})->catch(function ($data) {
    echo $data;
})->then(function ($data) {
    echo $data . 'ocdcd';
});
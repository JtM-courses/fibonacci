<?php

// 1 2 3 4 5 6 7  8  9  10 34
// 1 1 2 3 5 8 13 21 34 55 5702887

require __DIR__ . '/Fibonacci.php';
require __DIR__ . '/Timer.php';

$fib = new Fibonacci();
$timer = new Timer();

$methods = [
    'methodFor',
    'methodArray',
    'methodRecursive',
    'methodRecursiveSafe',
    'methodMath'
];

$log = [];

foreach ($methods as $method) {
    $timer->start();
    $log[$method]['res'] = $fib->{$method}(1000);
    $log[$method]['time'] = $timer->stop()->diff();
}

echo '<pre>';
var_dump($log);
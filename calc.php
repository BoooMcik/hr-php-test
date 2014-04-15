<?php

require 'FactorialCalc.php';
$calc = new FactorialCalc();

assert_options(ASSERT_BAIL, true);
assert('$calc->add(10,5) == 15' );
assert('$calc->divide(10,5) == 2');

try {
    $calc->divide(10,0);
    assert(false);
} catch (Exception $e) {
    assert('$e->getMessage() == "Division by zero"');
} 



assert('$calc->factorial(0) == 1');
assert('$calc->factorial(1) == 1');
assert('$calc->factorial(5) == 120');
assert('$calc->factorial(7) == 5040');

echo "Everything looks ok!\n";

<?php
include dirname(__DIR__). "/vendor/autoload.php";

use BusinessDay\BusinessDay;

$businessDay = new BusinessDay("2019-10-14");

//default
try {
    $current = $businessDay->getCurrentBusinessDay();
    echo $current.PHP_EOL;

} catch (Exception $e) {
    die($e->getMessage().PHP_EOL);
}


//add columbus day
try {
    $businessDay->setDate("2019-10-14");
} catch (Exception $e) {
    die($e->getMessage().PHP_EOL);
}
$businessDay->addHoliday("ColumbusDay");

try {
    $current = $businessDay->getCurrentBusinessDay();
    echo $current.PHP_EOL;

} catch (Exception $e) {
    die($e->getMessage().PHP_EOL);
}

try {
    $businessDay->setDate("2019-10-14");
} catch (Exception $e) {
    die($e->getMessage().PHP_EOL);
}

$businessDay->removeHoliday("ColumbusDay");
try {
    $current = $businessDay->getCurrentBusinessDay();
    echo $current.PHP_EOL;

} catch (Exception $e) {
    die($e->getMessage().PHP_EOL);
}

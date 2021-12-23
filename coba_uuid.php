<?php
// PAGE COBA_UUID.PHP PENTING; JANGAN DI HAPUS REK

// MENGHUBUNGKAN KONEKSI COMPOSER
require "data/lib-composer/vendor/autoload.php";

// UUID COMPOSER/RAMSEY
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

try {
    //Gererator version 1
    $uuid1 = Uuid::uuid1();
    echo $uuid1->toString() . "\n";
    echo "<br> UUID1 <br><br>";

    //Gererator version 3
    $uuid3 = Uuid::uuid3(Uuid::NAMESPACE_DNS, 'php.net');
    echo $uuid3->toString() . "\n";
    echo "<br> UUID3 <br><br>";

    //Gererator version 4
    $uuid4 = Uuid::uuid4();
    echo $uuid4->toString() . "\n";
    echo "<br> UUID4 <br><br>";

    //Gererator version 5
    $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'php.net');
    echo $uuid5->toString() . "\n";
    echo "<br> UUID5 <br><br>";
} catch (UnsatisfiedDependencyException $e) {

    echo 'Caught exception : ' . $e->getMessage() . "\n";
}
?>
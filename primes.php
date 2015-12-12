<?php
$startAt = 1;
$filename = "primes.txt";
$finishAt = 1000000;

function isPrime($n) {
    $i = 2;

    if ($n == 1) {
        return false;
    }

    if ($n == 2) {
        return true;	
    }

    $sqrtN = sqrt($n);
    while ($i <= $sqrtN) {
        if ($n % $i == 0) {
            return false;
        }

        $i++;
    }

    return true;
}


$n = 0;
$i = $startAt;
$file = fopen($filename, 'a') or die("can't open file");

$startTime = microtime(true);

while ($i < $finishAt) {
    $isPrime = isPrime($i);

    if ($isPrime) {
        $n++;
        echo $n . ": " . $i . " is a prime\n";
        fwrite($file, $i . "\n");
    }

    $i++;
}

$elapsedTime = microtime(true) - $startTime;

echo "From: " . $startAt . "\n";
echo "To: " . $finishAt . "\n";
echo "Prime Numbers Found: " . $n . "\n";
echo "Elapsed Time: " . $elapsedTime . "s" . "\n";
echo "Written to: " . $filename . "\n";

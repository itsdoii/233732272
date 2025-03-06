<?php
for ($i = 1; $i <=100; $i++) {
  if ($i % 3 == 0 && $i % 5 == 0) {
    echo "FizzBuzz \n";
  } elseif ($i % 3 == 0) {
    echo "Fizz \n";
  } elseif ($i % 5 == 0) {
    echo "Buzz \n";
  } else {
    echo $i . "\n";
  }
}

function fibonacciSeries($a){
    $num1 = 0;
    $num2 = 1;
      for ( $b = 0; $b < $a; $b++ ) {
        echo $num1 . ", ";
        $num3 = $num1 + $num2;
        $num1 = $num2;
        $num2 = $num3;
    }
}
$a = 10;
fibonacciSeries($a);
?>
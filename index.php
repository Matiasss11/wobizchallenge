<?php

$txt_file = fopen('file.txt','r');
$matrizIn = array(array());
$matrizOut = array(array());
$i = 0;
$data = array();
while ($line = fgets($txt_file)) {
    $data = explode(" ", $line);
    $matrizIn[$i] = $data;
    $i++;
}


$matrizOut =  $matrizIn;
for ($i=0; $i < count($matrizIn) ; $i++) { 
    for ($j=0; $j < count($matrizIn[$i]) ; $j++) { 
        $vecinos = 0;
        if ($i == 0) {
            if ($matrizIn[$i][$j+1] == 1) {
                $vecinos++;
            }
            if ($matrizIn[$i+1][$j] == 1) {
                $vecinos++;
            }
            if ($matrizIn[$i][$j]== 1) {
                if ($vecinos < 2 or $vecinos > 3) {
                    $matrizOut[$i][$j] = 0;
                }
            } else {
                if ($vecinos == 3) {
                    $matrizOut[$i][$j] = 1;
                }
            }
        } else {
            if ($matrizIn[$i-1][$j] == 1) {
            $vecinos++;
            }
            if ($matrizIn[$i][$j-1] == 1) {
                $vecinos++;
            }
            if ($matrizIn[$i][$j+1] == 1) {
                $vecinos++;
            }
            if ($matrizIn[$i+1][$j] == 1) {
                $vecinos++;
            }
            if ($matrizIn[$i][$j]== 1) {
                if ($vecinos < 2 or $vecinos > 3) {
                    $matrizOut[$i][$j] = 0;
                }
            } else {
                if ($vecinos == 3) {
                    $matrizOut[$i][$j] = 1;
                }
            }
        }
                
    }
}


print_r($matrizOut);
fclose($txt_file);

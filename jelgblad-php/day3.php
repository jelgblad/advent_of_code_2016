<?php

// Require common functions
require_once("_functions.php");

// Specify day
$day = 3;

// Print some info
print_info($day);

// Get input
$input = read_input($day);

$input_lines = explode(PHP_EOL, $input);

$valid_triangles = [];

foreach($input_lines as $line){

    $lengths = preg_split("#\s+#", $line, null, PREG_SPLIT_NO_EMPTY);

    sort($lengths);

    if($lengths[0] + $lengths[1] > $lengths[2])
        $valid_triangles[] = $lengths;
}

$part1 = count($valid_triangles);




// Part 2

$col1 = [];
$col2 = [];
$col3 = [];

foreach($input_lines as $line){
    
    $values = preg_split("#\s+#", $line, null, PREG_SPLIT_NO_EMPTY);

    $col1[] = $values[0];
    $col2[] = $values[1];
    $col3[] = $values[2];
}

$input_values = array_merge($col1, $col2, $col3);

$valid_triangles = [];

for($i=0; $i<count($input_values); $i=$i+3){

    $lengths = [
        $input_values[$i],
        $input_values[$i+1],
        $input_values[$i+2]
    ];

    sort($lengths);

    if($lengths[0] + $lengths[1] > $lengths[2])
        $valid_triangles[] = $lengths;
}

$part2 = count($valid_triangles);


echo "Part 1: " . $part1 . PHP_EOL;
echo "Part 2: " . $part2 . PHP_EOL;
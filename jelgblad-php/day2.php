<?php

// Require common functions
require_once("_functions.php");

// Specify day
$day = 2;

// Print some info
print_info($day);

// Get input
$input = read_input($day);

// Initialize part 1
$pos_x = 1;
$pos_y = 1;

$keys = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

$input_lines = explode(PHP_EOL, $input);

function move($keys, $instruction){

    global $pos_x, $pos_y;

    $min_x = 0;
    $min_y = 0;
    $max_x = count($keys[0]) - 1;
    $max_y = count($keys) - 1;

    $new_x = $pos_x;
    $new_y = $pos_y;

    switch($instruction){
        case "U" : 
            if($new_y > $min_y) $new_y--;
            break;
        case "D" : 
            if($new_y < $max_y) $new_y++;
            break;
        case "L" : 
            if($new_x > $min_x) $new_x--;
            break;
        case "R" : 
            if($new_x < $max_x) $new_x++;
            break;
    }

    if($keys[$new_y][$new_x] === null) return;

    $pos_x = $new_x;
    $pos_y = $new_y;
}

$code_a = "";

foreach($input_lines as $line){

    $line_instructions = str_split($line);

    foreach($line_instructions as $instruction){

        move($keys, $instruction);
    }

    // echo $keys[$pos_y][$pos_x] . PHP_EOL;

    $code_a .= $keys[$pos_y][$pos_x];
}




// Initialize part 2
$pos_x = 0;
$pos_y = 2;

$keys = [
    [null, null, 1, null, null],
    [null, 2, 3, 4, null],
    [5, 6, 7, 8, 9],
    [null, "A", "B", "C", null],
    [null, null, "D", null, null],
];

$code_b = "";

foreach($input_lines as $line){

    $line_instructions = str_split($line);

    foreach($line_instructions as $instruction){

        move($keys, $instruction);
    }

    // echo $keys[$pos_y][$pos_x] . PHP_EOL;

    $code_b .= $keys[$pos_y][$pos_x];
}

echo "Part 1: " . $code_a . PHP_EOL;
echo "Part 2: " . $code_b . PHP_EOL;
<?php

// Require common functions
require_once("_functions.php");

// Specify day
$day = 2;

// Print some info
print_info($day);

// Get input
$input = read_input($day);

// Initialize
$min_x = 0;
$min_y = 0;
$max_x = 2;
$max_y = 2;
$pos_x = 1;
$pos_y = 1;

$input_lines = explode(PHP_EOL, $input);

$code_a = "";

foreach($input_lines as $line){
    // echo ">" . $line . PHP_EOL;

    $line_instructions = str_split($line);

    foreach($line_instructions as $instruction){

        switch($instruction){
            case "U" : 
                if($pos_y > $min_y) $pos_y--;
                break;
            case "D" : 
                if($pos_y < $max_y) $pos_y++;
                break;
            case "L" : 
                if($pos_x > $min_x) $pos_x--;
                break;
            case "R" : 
                if($pos_x < $max_x) $pos_x++;
                break;
        }
    }

    $key_index = $pos_y * ($max_x + 1) + $pos_x;

    $code_a .= $key_index + 1;
}

print_solution("a: " . $code_a . ", b: " . "-");
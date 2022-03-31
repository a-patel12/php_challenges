<?php
/*
 * getFinalPosition() function will return final position (x,y) coordinates for provided robot movements
 * This will work for both types of input. with or without move commands.
 * i.e. input = "NMSMMWMEMWM" with move commands. change direction and wait for move command
 *      input = "NSSWEW" without move commands. turn and move into direction
 *
 */
class Robot{

    public $moves;

    public function getFinalPosition($moves)
    {
        $this->moves = $moves;
        $total_moves = strlen($moves);

        $east = 0;
        $west  = 0;
        $north = 0;
        $south = 0;
        $directions = ['N', 'S', 'W', 'E'];

        if($total_moves > 1)
        {
            if(strpos($moves,'M')) {
                $directions_only = 0;
            }else {
                $directions_only = 1;
            }

            $robot_dir = '';
            for ($i = 0; $i < $total_moves; $i++) {
                $current = $moves[$i];
                $movement = 0;
                if($directions_only == 1){
                    $robot_dir = $current;
                    $movement = 1;
                }else{
                    if (in_array($current, $directions)) {
                        $robot_dir = $current;
                    }else{
                        if($current == 'M'){ // check for Move command if invalid commands are given i.e. 0 or 1 and so
                            $movement = 1;
                        }
                    }
                }

                if ($robot_dir == 'N' && $movement == 1) {
                    $north++;
                } else if ($robot_dir == 'S' && $movement == 1) {
                    $south++;
                } else if ($robot_dir == 'W' && $movement == 1) {
                    $west++;
                } else if ($robot_dir == 'E' && $movement == 1) {
                    $east++;
                }

            }

        }
        return "Final Position: (". ($east - $west) ." , " . ($north - $south) . ")";
    }
}

// Code to instantiate Robot class
$robot_obj = new Robot();

$movements = "NMSMMWMMEMNMMMSMNMMEMNMSMMNMMWMMSMEMMMM";
$final_position = $robot_obj->getFinalPosition($movements);
echo $movements. " = ". $final_position. PHP_EOL; // output = (2 , 3)

$movements = "EW01EM"; // only following valid commands. i.e. here it will not move/turn on 0 and 1 commands
$final_position = $robot_obj->getFinalPosition($movements);
echo $movements. " = ". $final_position. PHP_EOL; // output = (1 , 0)

$movements = "NMSMMWMEMWM"; // #1 with move commands
$final_position = $robot_obj->getFinalPosition($movements);
echo $movements. " = ". $final_position. PHP_EOL; // output = (-1 , -1)

$movements = "NSSWEW"; // #2 without move commands (only directions). Turn and move into direction
$final_position = $robot_obj->getFinalPosition($movements);
echo $movements. " = ". $final_position. PHP_EOL; // output = (-1 , -1)


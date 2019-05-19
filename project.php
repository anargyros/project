<?php
    $info = array();
    echo "Rovers:";
    $rovers = trim(fgets(STDIN)); 
    echo "Position to go:";
    $endPosition = trim(fgets(STDIN));
    $endPositionTmp = explode(" ", $endPosition);
    for($x = 0; $x < $rovers; $x++) {
        echo "Current position: ";
        $curren_position = trim(fgets(STDIN)); 
        $curren_position_tmp = explode(" ", $curren_position); 
        echo "Sequence:";
        $sequence = trim(fgets(STDIN)); 
        array_push($info , array('x' =>$curren_position_tmp[0], 'y' => $curren_position_tmp[1],"look"=>$curren_position_tmp[2],"path"=>$sequence));
    }
    
    $arrlength = count($info);
    for($i = 0; $i < $arrlength; $i++) {
        $sequence = str_split($info[$i]["path"]);
        $equenceLength = count($sequence);
        for($x = 0; $x < $equenceLength; $x++) {
            if($sequence[$x]=="L"){
                if($info[$i]["look"]=="W"){
                    $info[$i]["look"]="S";
                }else if($info[$i]["look"]=="N"){
                    $info[$i]["look"]="W";
                }else if($info[$i]["look"]=="E"){
                    $info[$i]["look"]="N";
                }else if($info[$i]["look"]=="S" ){
                    $info[$i]["look"]="E";
                }
            }else if($sequence[$x]=="R"){
                if($info[$i]["look"]=="W"){
                    $info[$i]["look"]="N";
                }else if($info[$i]["look"]=="N"){
                    $info[$i]["look"]="E";
                }else if($info[$i]["look"]=="E"){
                    $info[$i]["look"]="S";
                }else if($info[$i]["look"]=="S" ){
                    $info[$i]["look"]="W";
                }
            }
            if($sequence[$x]=="M" && $info[$i]["look"]=="N"){
                $info[$i]["x"]= $info[$i]["x"]-1;

            }else if($sequence[$x]=="M" && $info[$i]["look"]=="S"){
                $info[$i]["x"]=  $info[$i]["x"]+1;
            }else if($sequence[$x]=="M" && $info[$i]["look"]=="E"){
                $info[$i]["y"]= $info[$i]["y"]+1;
            }else if($sequence[$x]=="M" && $info[$i]["look"]=="W"){ 
                $info[$i]["y"]= $info[$i]["y"]-1;
            }
        }
        $roverNumber = $i + 1;
        echo  "\n Rover: ".$roverNumber." ".$info[$i]["x"]." ".$info[$i]["y"]." ".$info[$i]["look"]."\n";
    }
?>
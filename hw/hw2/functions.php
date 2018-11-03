<?php
    $plan1 = array(80, 253, 700, 875, 1188, 1255, 1650, 1848, 2098, 2288);
    $plan2 = array(205, 378, 613, 813, 1175, 1478, 1678, 1908, 2080, 2280);
    $plan3 = array(168, 353, 553, 888, 1233, 1450, 1513, 1900, 2055, 2295);
    $plan4 = array(63, 458, 505, 828, 1128, 1320, 1705, 1863, 2093, 2328);
    $plan5 = array(53, 388, 538, 938, 1245, 1348, 1728, 1838, 2245, 2408);
    $plan6 = array(38, 410, 760, 990, 1063, 1420, 1573, 1888, 2038, 2410);
    $plan7 = array(73, 330, 690, 878, 1205, 120, 1628, 1838, 2038, 2458);
    $plan8 = array(88, 295, 628, 973, 1088, 1428, 1608, 1940, 2105, 2473);
    $plan9 = array(113, 405, 663, 965, 1125, 1440, 1728, 1863, 2245, 2320);
    $plan10 = array(50, 458, 625, 800, 1090, 1338, 1655, 1888, 2073, 2353);
    
    function generatePlan($startStation, $maxStation){
        $randomValue = rand(1,10);
        switch($randomValue){
            case 1: global $plan1;
                    $plan = $plan1;
                    break;
            case 2: global $plan2;
                    $plan = $plan2;
                    break;
            case 3: global $plan3;
                    $plan = $plan3;
                    break;
                    
            case 4: global $plan4;
                    $plan = $plan4;
                    break;
            case 5: global $plan5;
                    $plan = $plan5;
                    break;
            case 6: global $plan6;
                    $plan = $plan6;
                    break;
            case 7: global $plan7;
                    $plan = $plan7;
                    break;
            case 8: global $plan8;
                    $plan = $plan8;
                    break;
            case 9: global $plan9;
                    $plan = $plan9;
                    break;
            case 10: global $plan10;
                    $plan = $plan10;
                    break;
                    
        }
        $planArray = array();
        for ($i = 0; $i < count($plan); $i++){
            if($plan[$i] + $startStation< $maxStation){ 
                $planArray[] = integerToStation($plan[$i] + $startStation);
                //echo"<p>$planArray[$i]</p>";
            }
        }
        displayImage($randomValue);
        createTable($planArray, $randomValue);
    }

    function createTable($array, $int)
    {
        echo"<table >
				<caption>Stations Plan $int</caption>
				<tr id = 'tableheader'>
					<td>#</td>
					<td>Station</td>
				</tr>";
	    for ($i = 0; $i < count($array); $i++){
	        $num = $i+1;
	        $station = $array[$i];
	        echo"<tr id = 'stations'>
	                <td>$num</td>
	                <td>$station</td>
	             </tr>";
	    }
	    
	    echo"</table>";
	       
    }
    function inputToInteger($input){
        $inputArray = explode("+", $input);
        $int = intval(implode("", $inputArray));
        return $int;
    }
    
    function integerToStation($int){
        $station = strval($int);
        for ($i = 1; $i <= (3 - strlen($station)); $i++){
            $station = '0' . $station;
        }
        $stationArrayAdjusted = array();
        for ($i = 0; $i < strlen($station); $i++){
            if ($i == strlen($station) - 2)
            {
                array_push($stationArrayAdjusted, '+');
            }
            array_push($stationArrayAdjusted, $station[$i]);
        }
        $stationAdjusted = implode($stationArrayAdjusted);
        return $stationAdjusted;
    }
    
    function displayImage($int){
        echo "<img id='planImage' src='img/planImage$int.PNG' alt='plan$int' title='plan$int'>";
    }
    
?>

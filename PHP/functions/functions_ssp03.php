<?php
    //table opening
    function fn_tableOpen($caption) {
        echo '<table class= "sched">'.PHP_EOL;
        echo '<caption>'.$caption.'</caption>'.PHP_EOL;
        echo '<tr>'.PHP_EOL;
        echo '<th>Day</th>'.PHP_EOL;
        echo '<th>Details</th>'.PHP_EOL;
        echo '<th>Time</th>'.PHP_EOL;
        echo '</tr>'.PHP_EOL;
    }

    //table closing code
    function fn_tableClose() {
        echo '</table><br><br>';
    }

    //table row for current date
    function fn_tableRowCurrent($day, $details, $time) {

        echo '<tr style = "background-color: #FFFF66;">'.PHP_EOL;
        echo '<td>'.$day.'</td>'.PHP_EOL;
        echo '<td>'.$details.'</td>'.PHP_EOL;
        echo '<td>'.$time.'</td>'.PHP_EOL;
        echo '</tr>'.PHP_EOL;
    }

    function fn_tableRow($day, $details, $time) {

        echo '<tr>'.PHP_EOL;
        echo '<td>'.$day.'</td>'.PHP_EOL;
        echo '<td>'.$details.'</td>'.PHP_EOL;
        echo '<td>'.$time.'</td>'.PHP_EOL;
        echo '</tr>'.PHP_EOL;
    }
    // get days of the week
    function fn_dayOfWeek($dayNum) {
        $day = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        if ($dayNum >= 1 && $dayNum <= 7) {
            return $day[$dayNum -1];
        }
        return "Error loading Schedule";

    }
    //details for each day
    function fn_dayDetails($dayNum) {
        switch ($dayNum) {
            case 1:
                return "Full time Job. Study time reduced";
            case 2:
                return "Full time Job. Study time reduced";
            case 3:
                return "Full time Job. Study time reduced";
            case 4:
                return "Full time Job. Study time reduced";
            case 5:
                return "Full time Job. Study Late";
            case 6:
                return "Focused study time";
            case 7:
                return "Wrap up any unfinished projects or quizes";
            default:
                return "Error loading Schedule. Please refresh the page";
        }

    }
    //amount of time studying
    function fn_dayTime($dayNum) {
        if($dayNum == 1 || $dayNum == 2){
            return ".5 hour";
        }
        elseif ($dayNum == 3) {
            return "0 hour";
        }
        elseif ($dayNum == 4) {
            return "1 hour";
        }
        elseif ($dayNum ==5) {
            return "3 hours";
        }
        elseif ($dayNum == 6 || $dayNum = 7) {
            return "5 hours";
        }
        else {
            return "0 hours";
        }

    }
    


?>

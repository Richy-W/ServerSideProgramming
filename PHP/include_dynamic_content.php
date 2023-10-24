<?php
    echo("<table>".PHP_EOL."<caption>CS2623 Weekly Plan: Richard</caption>".PHP_EOL."<tr>".PHP_EOL."<th>Day</th>".PHP_EOL."<th>Details</th>".PHP_EOL."<th>Time</th>".PHP_EOL."</tr>");

    for($i = 0; $i < 6; $i++) {
        if($i < 5){
        echo("<tr>".PHP_EOL."<td>".($i+1)."</td>".PHP_EOL."<td>Study for CS2623</td>".PHP_EOL."<td>.5</td>".PHP_EOL."</tr>".PHP_EOL);
        }
        if($i==5){
            echo("<tr>".PHP_EOL."<td>".($i+1)."</td>".PHP_EOL."<td>Study for CS2623</td>".PHP_EOL."<td>4</td>".PHP_EOL."</tr>".PHP_EOL);
        }
    }
    echo("<tr>".PHP_EOL."<td>7</td><td>Study for CS2623</td>".PHP_EOL."<td>5</td>".PHP_EOL."</tr>".PHP_EOL."</table>".PHP_EOL);
?>
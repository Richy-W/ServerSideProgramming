<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Wren, RIchard">
        <meta name="keywords" content="CS2623, hello world, Server-side, Programing">
        <title>CS2623 SSP01: Wren</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
    <!-------------HEADER-------------->
        <header>
            <?php include("../php/include_header.php");?>
        </header>
    <!--------------Nav----------------->
    <nav class="topNav">
            <?php include("../php/include_topNav.php");?>
        </nav>   

        <nav class="leftNav">
           <?php include("../php/include_leftNav.php");?>
        </nav>   

        <main>
            <?php include("../php/functions/functions_ssp03.php");?>
            <?php
                //variables
                $current_day = date('N');
                $caption = "CS2623: Weekly Plan for Richard Wren";

                fn_tableOpen($caption);

                //for loop to find days of the week
                for ($dayNum = 1; $dayNum < 8; $dayNum++) {
                    //variables needed in the loop structure
                    $iscurrentDay = ($dayNum == $current_day);
                    $day = fn_dayOfWeek($dayNum);
                    $details = fn_dayDetails($dayNum);
                    $time = fn_dayTime($dayNum);

                    // if statement to fill out the table and find current day
                    if ($iscurrentDay) {
                        fn_tableRowCurrent($day, $details, $time);
                    }
                    else fn_tableRow($day, $details, $time);

                }

                fn_tableClose();

            ?>
        </main>

        <footer>
            <?php include("../php/include_footer.php");?>
        </footer>

    </body>


</html>

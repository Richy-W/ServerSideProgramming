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
            <?php include("../php/include_dynamic_content.php");?>
        </main>

        <footer>
            <?php include("../php/include_footer.php");?>
        </footer>

    </body>


</html>

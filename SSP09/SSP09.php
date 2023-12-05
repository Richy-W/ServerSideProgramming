<?php
            //start the session
            session_start();
            require_once('../php/functions/functions_SSP09.php');

            //initialize sessions
            if (!isset($_SESSION['secretWord'])) {
                $_SESSION['secretWord'] = "century"; //set secret word
            }
            if (!isset($_SESSION['secretWord_hint'])) {
                $_SESSION['secretWord_hint'] = "A measure of time."; //set hint
            }
            if (!isset($_SESSION['secretWord_array'])) {
                $_SESSION['secretWord_array'] = str_split($_SESSION['secretWord']); //split Secret Word into an array of individual letters
            }
            if (!isset($_SESSION['secretWord_len'])) {
                $_SESSION['secretWord_len'] = strlen($_SESSION['secretWord']); //find number of letters
            }
            if (!isset($_SESSION['guess_secretWord'])) {
                $_SESSION['guess_secretWord'] = str_repeat('_', $_SESSION['secretWord_len']); //set blank spaces
            }
            if(!isset($_SESSION['guess_count'])) {
                $_SESSION['guess_count'] = 0; // set guess count to 0
            }
            if (!isset($_SESSION['guess_count_wrong'])) {
                $_SESSION['guess_count_wrong'] = 0; //Start with 0 wrong guesses
            }
            if (!isset($_SESSION['guess_tracked'])) {
                $_SESSION['guess_tracked'] = 0; //tracking guesses
            }
            if(!isset($_SESSION['guess_image'])) {
                $_SESSION['guess_image'] = 0; // Image
            }
            if (!isset($_SESSION['guess_letter'])) {
                $_SESSION['guess_letter'] = ""; //initialize empty
            }
            if (!isset($_SESSION['game_lastGuess'])) {
                $_SESSION['game_lastGuess'] = date('Y-m-d H:i:s'); //last guess initialized
            }
            if (!isset($_SESSION['game_started'])) {
                $_SESSION['game_started'] = date('Y-m-d H:i:s'); // set when the game started
            }
?>

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
            <!-------basic form for submiting guesses------->
            <form method="POST" action="SSP09.php">
                <label for="frosty_letter_guess">Enter a letter:</label>
                <input type="text" id="frosty_letter_guess" name="frosty_letter_guess" required>
                <button type="submit">Submit</button>
            </form>

            <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                frosty_guessing($_SESSION['secretWord'], $_SESSION['secretWord_hint'], $_SESSION['guess_secretWord'], $_POST['frosty_letter_guess'], $_SESSION['guess_tracked'], $_SESSION['guess_count'], $_SESSION['guess_count_wrong'], $_SESSION['game_started'], $_SESSION['game_lastGuess'], $_SESSION['secretWord_len'], $_SESSION['secretWord_array'], $_SESSION['guess_image']);
            }
            ?>
        </main>

        <footer>
            <?php include("../php/include_footer.php");?>
        </footer>

    </body>


</html>

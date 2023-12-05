<?php
 
 function frosty_guessing($secretWord, $secretWord_hint, $guess_secretWord, $guess_letter, $guess_tracked, $guess_count, $guess_count_wrong, $game_started, $game_lastGuess, $secretWord_len, $secretWord_array, $guess_image) {
    $guess_found = "N";
    $game_lastGuess = date('Y-m-d H:i:s');
    

    if (strpos($guess_tracked, $guess_letter) !== false) {
        $guess_count_wrong++; //already guessed
        $guess_image++;
    }
    elseif ($guess_letter == $secretWord) {
        echo "<p>CONGRATULATIONS! YOU WIN!</p>"; //last letter to win the game
        echo "<img class=\"displayImage\" src=\"frosty/SSP09_sun.jpg\" alt=\"Happy Sun\">".PHP_EOL;
    }
    elseif (strpos($secretWord, $guess_letter) === false) {
        $guess_tracked .= $guess_letter;
        $guess_count_wrong++; // not in seret word
        $guess_image++;
    }
    else {
        for ($i = 0; $i < $secretWord_len; $i++) {
            if($guess_letter == $secretWord_array[$i]) {
                $guess_found = "Y";

                if ($i == 0) {
                    $guess_secretWord = substr_replace($guess_secretWord, $guess_letter, $i, 1);
                }
                else {
                    $guess_secretWord = substr_replace($guess_secretWord, $guess_letter, $i, 1);
                }
            }
        }
    }
    $guess_count ++;


    //update
    $_SESSION['guess_count'] = $guess_count;
    $_SESSION['guess_count_wrong'] = $guess_count_wrong;
    $_SESSION['guess_tracked'] = $guess_tracked;
    $_SESSION['guess_image'] = $guess_image;
    $_SESSION['guess_secretWord'] = $guess_secretWord;

    frosty_round($_SESSION['game_started'], $game_lastGuess, $secretWord_len, $secretWord_hint, $guess_count, $guess_count_wrong, $guess_tracked, $guess_image, $guess_secretWord);

 }

 function frosty_round($game_started, $game_lastGuess, $secretWord_len, $secretWord_hint, $guess_count, $guess_count_wrong, $guess_tracked, $guess_image, $guess_secretWord) {
    echo "<p>Game Started: ".$game_started."</p><br>".PHP_EOL;
    echo "<p>Last Guess: ".$game_lastGuess."</p><br>".PHP_EOL;
    echo "<p>Secret word hint: ".$secretWord_hint."</p><br>".PHP_EOL;
    echo "<p>Secret word length: ".$secretWord_len."</p><br>".PHP_EOL;
    echo "<p>Guess Count: ".$guess_count."</p><br>".PHP_EOL;
    echo "<p>Guess Count (Wrong Answers): ".$guess_count_wrong."</p><br>".PHP_EOL;
    echo "<p>Guess Count (Right Answers): ".strlen(str_replace('_', '', $guess_secretWord))."</p><br>".PHP_EOL;
    echo "<p>Guessed letters: ".$guess_tracked."</p><br>".PHP_EOL;
    echo "<p>Frosty is at: ".$guess_image."</p><br>".PHP_EOL;

    if($guess_image === 1) {
        echo "<img class=\"displayImage\" src=\"frosty/SSP04_Frosty1.png\" alt=\"Frosty Starts\">".PHP_EOL;
    }
    elseif ($guess_image === 2) {
        echo "<img class=\"displayImage\" src=\"frosty/SSP04_Frosty2.png\" alt=\"Frosty Grows\">".PHP_EOL;
    }
    elseif ($guess_image === 3) {
        echo "<img class=\"displayImage\" src=\"frosty/SSP04_Frosty3.png\" alt=\"Frosty Grows\">".PHP_EOL;
    }
    elseif ($guess_image === 4) {
        echo "<img class=\"displayImage\" src=\"frosty/SSP04_Frosty4.png\" alt=\"Frosty Grows\">".PHP_EOL;
    }
    elseif ($guess_image === 5) {
        echo "<img class=\"displayImage\" src=\"frosty/SSP04_Frosty5.png\" alt=\"Frosty Grows\">".PHP_EOL;
    }
    elseif ($guess_image >= 6) {
        echo "<img class=\"displayImage\" src=\"frosty/SSP04_Frosty6.png\" alt=\"Frosty Wins\">".PHP_EOL;
    }
    
    if (strlen(str_replace('_', '', $guess_secretWord)) === 7) {
        echo "<p>CONGRATULATIONS! YOU WIN!</p>"; //last letter to win the game
        echo "<img class=\"displayImage\" src=\"frosty/SSP09_sun.jpg\" alt=\"Happy Sun\">".PHP_EOL;
    }
 }
?>

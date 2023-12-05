<?php
function frosty_guessing(
    $secretWord,
    $secretWord_hint,
    $guess_secretWord,
    $guess_letter,
    $guess_tracked,
    $guess_count,
    $guess_count_wrong,
    $game_started,
    $game_lastGuess,
    $secretWord_len,
    $secretWord_array,
    $guess_image
) {
    $guess_found = "N";
    $game_lastGuess = date('Y-m-d H:i:s');

    if (strpos($guess_tracked, $guess_letter) !== false) {
        $guess_count_wrong++;
        $guess_image++;
    } elseif ($guess_letter == $secretWord) {
        echo "Congratulations! You guessed the word!";
        // Display a special image here
    } elseif (strpos($secretWord, $guess_letter) === false) {
        $guess_tracked .= $guess_letter;
        $guess_count_wrong++;
        $guess_image++;
    } else {
        for ($i = 0; $i < $secretWord_len; $i++) {
            if ($guess_letter == $secretWord_array[$i]) {
                $guess_found = "Y";
                if ($i == 0) {
                    $guess_secretWord = substr_replace($guess_secretWord, $guess_letter, $i, 1);
                } else {
                    $guess_secretWord = substr_replace($guess_secretWord, $guess_letter, $i, 1);
                }
            }
            session_destroy()
        }
    }

    $guess_count++;

    $_SESSION['guess_count'] = $guess_count;
    $_SESSION['guess_count_wrong'] = $guess_count_wrong;
    $_SESSION['guess_tracked'] = $guess_tracked;
    $_SESSION['guess_image'] = $guess_image;
    $_SESSION['guess_secretWord'] = $guess_secretWord;

    frosty_round(
        $_SESSION['game_started'],
        $game_lastGuess,
        $secretWord_len,
        $secretWord_hint,
        $guess_count,
        $guess_count_wrong,
        $guess_tracked,
        $guess_image,
        $guess_secretWord
    );
}

function frosty_round(
    $game_started,
    $game_lastGuess,
    $secretWord_len,
    $secretWord_hint,
    $guess_count,
    $guess_count_wrong,
    $guess_tracked,
    $guess_image,
    $guess_secretWord
) {
    echo "Game started: " . $game_started . "<br>";
    echo "Last guess: " . $game_lastGuess . "<br>";
    echo "Secret word hint: " . $secretWord_hint . "<br>";
    echo "Secret word length: " . $secretWord_len . "<br>";
    echo "Guess count: " . $guess_count . "<br>";
    echo "Guess count (Wrong Answers): " . $guess_count_wrong . "<br>";
    echo "Guess count (Right Answers): " . strlen(str_replace('_', '', $guess_secretWord)) . "<br>";
    echo "Guessed letters: " . $guess_tracked . "<br>";
    echo "Frosty is currently at image " . $guess_image . "<br>";
}
?>
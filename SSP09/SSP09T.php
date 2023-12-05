<?php
session_start();

// Initialize sessions if not set
if (!isset($_SESSION['secretWord'])) {
    $_SESSION['secretWord'] = "century"; // Replace with your secret word
}

if (!isset($_SESSION['secretWord_hint'])) {
    $_SESSION['secretWord_hint'] = "Your hint for the secret word"; // Replace with your hint
}

if (!isset($_SESSION['secretWord_array'])) {
    $_SESSION['secretWord_array'] = str_split($_SESSION['secretWord']);
}

if (!isset($_SESSION['secretWord_len'])) {
    $_SESSION['secretWord_len'] = strlen($_SESSION['secretWord']);
}

if (!isset($_SESSION['guess_secretWord'])) {
    $_SESSION['guess_secretWord'] = str_repeat('_', $_SESSION['secretWord_len']);
}

if (!isset($_SESSION['guess_count'])) {
    $_SESSION['guess_count'] = 0;
}

if (!isset($_SESSION['guess_count_wrong'])) {
    $_SESSION['guess_count_wrong'] = 0;
}

if (!isset($_SESSION['guess_tracked'])) {
    $_SESSION['guess_tracked'] = 0;
}

if (!isset($_SESSION['guess_image'])) {
    $_SESSION['guess_image'] = 0;
}

if (!isset($_SESSION['guess_letter'])) {
    $_SESSION['guess_letter'] = "";
}

if (!isset($_SESSION['game_lastGuess'])) {
    $_SESSION['game_lastGuess'] = date('Y-m-d H:i:s');
}

if (!isset($_SESSION['game_started'])) {
    $_SESSION['game_started'] = date('Y-m-d H:i:s');
}

// Include the functions page
require_once('../php/functions/functions_SSP09.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Call the frosty_guessing function with form data
    frosty_guessing(
        $_SESSION['secretWord'],
        $_SESSION['secretWord_hint'],
        $_SESSION['guess_secretWord'],
        $_POST['frosty_letter_guess'],
        $_SESSION['guess_tracked'],
        $_SESSION['guess_count'],
        $_SESSION['guess_count_wrong'],
        $_SESSION['game_started'],
        $_SESSION['game_lastGuess'],
        $_SESSION['secretWord_len'],
        $_SESSION['secretWord_array'],
        $_SESSION['guess_image']
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSP09</title>
</head>
<body>
    <form method="post" action="SSP09T.php">
        <label for="frosty_letter_guess">Enter a letter:</label>
        <input type="text" id="frosty_letter_guess" name="frosty_letter_guess" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
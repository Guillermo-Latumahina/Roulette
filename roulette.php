<?php

$roulette = [
    [0, " GREEN"], [1, " RED"], [2, " BLACK"], [3, " RED"], [4, " BLACK"], [5, " RED"], [6, " BLACK"], [7, " RED"], [8, " BLACK"], [9, " RED"], [10, " BLACK"],
    [11, " BLACK"], [12, " RED"], [13, " BLACK"], [14, " RED"], [15, " BLACK"], [16, " RED"], [17, " BLACK"], [18, " RED"], [19, " RED"], [20, " BLACK"], [21, " RED"],
    [22, " BLACK"], [23, " RED"], [24, " BLACK"], [25, " RED"], [26, " BLACK"], [27, " RED"], [28, " BLACK"], [29, " BLACK"], [30, " RED"], [31, " BLACK"], [32, " RED"],
    [33, " BLACK"], [34, " RED"], [35, " BLACK"], [36, " RED"]
];
$column1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
$column2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
$column3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];

$balance = 500;
$bettingArray = [];
echo "Welcome to Roulette!!! ";
$balance = betMenu($balance, $roulette, $column1, $column2, $column3, $number);


while (keepPlaying($balance, $roulette, $column1, $column2, $column3, $number)) {
    $balance = betMenu($balance, $roulette, $column1, $column2, $column3, $number);
}

function betMenu($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Your balance is $balance." . PHP_EOL;
    echo "Place your bets please!" . PHP_EOL;
    echo "> 1) Odd bet/Even bet" . PHP_EOL;
    echo "> 2) High bet/low bet" . PHP_EOL;
    echo "> 3) Black bet/Red bet" . PHP_EOL;
    echo "> 4) Column bet" . PHP_EOL;
    echo "> 5) Dozen bet" . PHP_EOL;
    echo "> 6) Single number bet" . PHP_EOL;
    $choice = readline("> ");
    switch ($choice) {
        case 1:
            $balance = oddEvenBet($balance, $roulette, $column1, $column2, $column3, $number);
            break;
        case 2:
            $balance = highLowBet($balance, $roulette, $column1, $column2, $column3, $number);
            break;
        case 3:
            $balance = blackRedBet($balance, $roulette, $column1, $column2, $column3, $number);
            break;
        case 4:
            $balance = columnBet($balance, $roulette, $column1, $column2, $column3, $number);
            break;
        case 5:
            $balance = dozenBet($balance, $roulette, $column1, $column2, $column3, $number);
            break;
        case 6:
            $balance = singleNumberBet($balance, $roulette, $column1, $column2, $column3, $number);
            break;
        default:
            echo "Kies een geldige bet (1-6)" . PHP_EOL;
            break;
    }
    return $balance;
}

function oddEvenBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Do you want odd or even?" . PHP_EOL;
    echo "> 1) Odd" . PHP_EOL;
    echo "> 2) Even" . PHP_EOL;
    $oddEvenChoice = readline("> ");
    echo "What amount do you want to bet?" . PHP_EOL;
    $bettingAmount = readline("> ");
    $balance -= $bettingAmount;
    $balance = extraBet($balance, $roulette, $column1, $column2, $column3, $number);
    switch ($oddEvenChoice) {
        case 1:
            if ($number % 2 == 1) {
                $bettingAmount *= 2;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 2:
            if ($number % 2 == 0) {
                $bettingAmount *= 2;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        default:
            echo "Kies een geldige bet (1-2)" . PHP_EOL;
            break;
    }
    return $balance;
}

function highLowBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Do you want high or low?" . PHP_EOL;
    echo "> 1) High" . PHP_EOL;
    echo "> 2) Low" . PHP_EOL;
    $highLowChoice = readline("> ");
    echo "What amount do you want to bet?" . PHP_EOL;
    $bettingAmount = readline("> ");
    $balance -= $bettingAmount;
    $balance = extraBet($balance, $roulette, $column1, $column2, $column3, $number);
    switch ($highLowChoice) {
        case 1:
            if ($number >= 19) {
                $bettingAmount *= 2;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 2:
            if ($number > 0 && $number <= 18) {
                $bettingAmount *= 2;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        default:
            echo "Kies een geldige bet (1-2)" . PHP_EOL;
            break;
    }
    return $balance;
}

function blackRedBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Do you want BLACK or RED?" . PHP_EOL;
    echo "> 1) BLACK" . PHP_EOL;
    echo "> 2) RED" . PHP_EOL;
    $blackRedChoice = readline("> ");
    echo "What amount do you want to bet?" . PHP_EOL;
    $bettingAmount = readline("> ");
    $balance -= $bettingAmount;
    $balance = extraBet($balance, $roulette, $column1, $column2, $column3, $number);
    switch ($blackRedChoice) {
        case 1:
            if ($roulette[$number][1] === "BLACK") {
                $bettingAmount *= 2;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 2:
            if ($roulette[$number][1] === "RED") {
                $bettingAmount *= 2;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        default:
            echo "Kies een geldige bet (1-2)" . PHP_EOL;
            break;
    }
    return $balance;
}
function columnBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Do you want Column 1, 2 or 3?" . PHP_EOL;
    echo "> 1) Column 1" . PHP_EOL;
    echo "> 2) Column 2" . PHP_EOL;
    echo "> 3) Column 3" . PHP_EOL;
    $columnChoice = readline("> ");
    echo "What amount do you want to bet?" . PHP_EOL;
    $bettingAmount = readline("> ");
    $balance -= $bettingAmount;
    $balance = extraBet($balance, $roulette, $column1, $column2, $column3, $number);
    switch ($columnChoice) {
        case 1:
            if (in_array($number, $column1)) {
                $bettingAmount *= 3;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 2:
            if (in_array($number, $column2)) {
                $bettingAmount *= 3;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 3:
            if (in_array($number, $column3)) {
                $bettingAmount *= 3;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        default:
            echo "Kies een geldige bet (1-3)" . PHP_EOL;
            break;
    }
    return $balance;
}
function dozenBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Do you want the 1st, 2nd or 3rd dozen?" . PHP_EOL;
    echo "> 1) First 12" . PHP_EOL;
    echo "> 2) Second 12" . PHP_EOL;
    echo "> 3) Third 12" . PHP_EOL;
    $dozenChoice = readline("> ");
    echo "What amount do you want to bet?" . PHP_EOL;
    $bettingAmount = readline("> ");
    $balance -= $bettingAmount;
    $balance = extraBet($balance, $roulette, $column1, $column2, $column3, $number);
    switch ($dozenChoice) {
        case 1:
            if ($number >= 1 && $number <= 12) {
                $bettingAmount *= 3;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 2:
            if ($number >= 13 && $number <= 24) {
                $bettingAmount *= 3;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        case 3:
            if ($number >= 25 && $number <= 36) {
                $bettingAmount *= 3;
                $balance += $bettingAmount;
                echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
            } else {
                echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
            }
            break;
        default:
            echo "Kies een geldige bet (1-3)" . PHP_EOL;
            break;
    }
    return $balance;
}
function singleNumberBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Which number do you want?" . PHP_EOL;
    $numberChoice = readline("> ");
    echo "What amount do you want to bet?" . PHP_EOL;
    $bettingAmount = readline("> ");
    $balance -= $bettingAmount;
    $balance = extraBet($balance, $roulette, $column1, $column2, $column3, $number);
    if ($numberChoice == $number) {
        $bettingAmount *= 37;
        $balance += $bettingAmount;
        echo "You won $bettingAmount! Congratulations! Your new balance is $balance." . PHP_EOL;
    } else {
        echo "You lost $bettingAmount! Your new balance is $balance." . PHP_EOL;
    }
    return $balance;
}

function keepPlaying($balance)
{
    if ($balance > 0) {
        echo "Want to continue playing?" . PHP_EOL;
        echo "1) Yes" . PHP_EOL;
        echo "2) No" . PHP_EOL;
        $keepPlayingChoice = readline("> ");
        if ($keepPlayingChoice == 1) {
            echo "_____________________________________________________" . PHP_EOL;
            return $balance;
            return true;
        } else {
            echo "Cashing out $balance!" . PHP_EOL;
            sleep(2);
            echo "Goodbye!" . PHP_EOL;
            return (false);
        }
    } else {
        echo "Your balance is $balance. You can't play anymore!" . PHP_EOL;
        sleep(2);
        echo "Goodbye!" . PHP_EOL;
        return (false);
    }
}

function dots()
{
    echo "Lets Roll!" . PHP_EOL;
    for ($dot = 0; $dot < 5; $dot++) {
        echo ".";
        sleep(1);
    }
}

function extraBet($balance, $roulette, $column1, $column2, $column3, $number)
{
    echo "Thank you. Would you like to place another bet?" . PHP_EOL;
    echo "> 1) Yes" . PHP_EOL;
    echo "> 2) No" . PHP_EOL;
    $extraBetChoice = readline("> ");
    if ($extraBetChoice == 1) {
        betMenu($balance, $roulette, $column1, $column2, $column3, $number);
    } else {
        echo "No more bets please! ";
        dots();
        rollRoullete($roulette, $number);
    }
    return $balance;
}

function rollRoullete($roulette, $number)
{
    $number = array_rand($roulette);
    echo $number . $roulette[$number][1] . PHP_EOL;
    return $number;
}

function bets($balance, $bettingAmount, $bettingArray)
{
    $balance -= $bettingAmount;
    $bettingArray = $bettingAmount;
}

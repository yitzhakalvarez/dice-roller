<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dice Roller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <main class="container">
        <h1>&#127922; Dice Roller</h1>
        <br>
        <form class="form-group" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-container">
                <div class="input">
                    <label for="num">Number of Rolls</label>
                    <br>
                    <input class="item" type="number" name="num" min="1" required value="1">
                </div>

                <div class="input">
                    <label for="sides">Number of Sides</label>
                    <br>
                    <select class="item" name="sides" id="Sides" required>
                        <option id="4d" value="6">d4</option>
                        <option id="6d" value="6">d6</option>
                        <option id="8d" value="8">d8</option>
                        <option id="10d" value="10">d10</option>
                        <option id="12d" value="12">d12</option>
                        <option id="20d" value="20">d20</option>
                    </select>
                </div>

                <div class="submitBtn">
                    <button class="item" type="submit" name="dice-roll-btn" value="Roll the dice">Roll the dice</button>
                </div>

                <div class="resetBtn">
                    <button class="reset" type="reset" onclick="reloadPage()" <?php if (!isset($_POST['dice-roll-btn'])) {
                                                                                    echo "disabled";
                                                                                } ?>>Reset</button>
                </div>
        </form>

        <div class="result-container">
            <?php

            if (isset($_POST["dice-roll-btn"])) {
                $Num = $_POST["num"];
                $Sides = $_POST["sides"];

                $diceArray = array();
                for ($i = 0; $i < $Num; $i++) {
                    array_push($diceArray, rand(1, $Sides));
                }
            ?>

                <?php

                for ($i = 0; $i < $Num; $i++) {
                ?>
                    <p class="result"> <?php echo $diceArray[$i] ?> </p>

                <?php
                }

                ?>
            <?php
            }

            ?>
        </div>
    </main>
    <script src="script.js"></script>
</body>

</html>
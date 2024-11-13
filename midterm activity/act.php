<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    //ACTIVITY 1
        echo "<strong>Activity 1</strong><br>";
        $i = 1;
        while ($i < 11) {
          echo $i . " ";
          $i++;
        }
        echo "<br>";
        $i = 2;
        while ($i <= 20) {
            if ($i % 2 == 0) {
                echo $i . " ";
            }
            $i++;
        }
    ?>
    
    <?php
        //ACTIVITY 2
        echo "<br><br><strong>Activity 2</strong><br>";
        if (isset($_POST['password'])) {
            $input = trim($_POST['password']);
            if ($input != "password123") {
                $error = "Incorrect password.";
            } else {
                $error = "Access Granted.";
                $accessGranted = true;
            }
        } else {
            $error = "";
            $accessGranted = false;
        }
    ?>

    <form method="post">
        <label for="password">Please enter the password:</label>
        <input type="text" id="password" name="password">
        <input type="submit" value="Submit">
    </form>
    <?php if ($error) { echo "<br>$error"; } ?>


    <?php
        //ACTIVITY 3
        echo "<br><br><strong>Activity 3</strong><br>";
        for ($i = 1; $i <= 10; $i++){
            echo "7 x $i = " . (7 * $i) . "<br>";
        }
    ?>

    <?php
        //ACTIVITY 4
        echo "<br><br><strong>Activity 4</strong><br>";
        for ($i=1; $i <10; $i++){
            if ($i == 5 ){
                continue;
            }
            if ($i == 8){
                break;
            }
            $num = $i;
            echo $num . " ";
        }
    ?> 

    <?php
        //ACTIVITY 5
        echo "<br><br><strong>Activity 5</strong><br>";
        $sum = 0;
        $count = 1;
        while ($count <= 100){
            $sum += $count;
            $count ++;
        }
        echo "The sum of all 100 numbers is: " . $sum;
    ?>

    <?php
        //ACTIVITY 6
        echo "<br><br><strong>Activity 6</strong><br>";
        $movies = array("Her", "Spirited Away", "Blade Runner(1982)", "Amelie", "Seven Samurai");
        $i = 1;
        foreach ($movies as $movie) {
            echo $i. ". ". $movie . "<br>";
            $i++;
        }
    ?>
    
    <?php
        //ACTIVITY 7
        echo "<br><strong>Activity 7</strong><br>";
        $studentInfo = array(
            "Name" => "Alice",
            "Age" => 20,
            "Grade" => "A",
            "City" => "Baguio"
        );

        foreach ($studentInfo as $key => $value) {
            echo "$key: $value<br>";
        }
    ?>

    <?php
        //ACTIVITY 8
        echo "<br><br><strong>Activity 8</strong><br>";
        $number = 5;
        $factorial = 1;

        for ($i = 1; $i <= $number; $i++) {
            $factorial *= $i;
        }

        echo "Factorial of $number is: $factorial";
    ?>

    <?php
        //ACTIVITY 9
        echo "<br><br><strong>Activity 9</strong><br>";
        for ($i = 1; $i <= 50; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo "FizzBuzz ";
            } elseif ($i % 3 == 0) {
                echo "Fizz ";
            } elseif ($i % 5 == 0) {
                echo "Buzz ";
            } else {
                echo "$i ";
            }
        }
    ?>

    <?php
        //ACTIVITY 10
        echo "<br><br><strong>Activity 10</strong><br>";
        $output = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['num'])) {
                $number = (int) $_POST['num'];

                $prime = true;

                if ($number <= 1) {
                    $prime = false;
                } else {
                    for ($i = 2; $i <= sqrt($number); $i++) {
                        if ($number % $i == 0) {
                            $prime = false;
                            break;
                        }
                    }
                }

                if ($prime) {
                    $output = "$number is a prime number.";
                } else {
                    $output = "$number is not a prime number.";
                }
            } else {
                $output = "Please enter a number.";
            }
        }
    ?>

    <form method="post">
        Enter a number: <input type="number" name="num">
        <input type="submit" value="Submit">
    </form>
    <p><?php echo $output; ?></p>

    <?php
        //ACTIVITY 11
        echo "<br><strong>Activity 11</strong><br>";

        $a = 0;
        $b = 1;
        $count = 0;
        $output = "";

        while ($count < 10) {
            $output .= $a . " ";
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
            $count++;
        }

        echo $output;
    ?>

    <?php
        //ACTIVITY 12
        echo "<br><br><strong>Activity 12</strong><br>";

        $input = "";
        $reversed = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['string'])) {
            $input = $_POST['string'];

            for ($i = strlen($input) - 1; $i >= 0; $i--) {
                $reversed .= $input[$i];
            }
        }
    ?>

    <form method="post">
        Enter a string: <input type="text" name="string" value="<?php echo $input; ?>">
        <input type="submit" value="Reverse">
    </form>

    <?php if ($input != "") { ?>
        <br>
        Input: "<?php echo $input; ?>"<br>
        Output: "<?php echo $reversed; ?>"<br>
    <?php } ?>

</body>
</html>
<?php
    // Take an MD5 hash and brute force it to find a four digit PIN number
    function crackPIN($hash) {
        $checksToPrint = 15;
        $numChecks = 0;
        for ($i = 0; $i < 10; $i++) {
            $try = $i;
            for ($j = 0; $j < 10; $j++) {
                $try = $i . $j;
                for ($m = 0; $m < 10; $m++) {
                    $try = $i . $j . $m;
                    for ($n = 0; $n < 10; $n++) {
                        $try = $i . $j . $m . $n;
                        $tryHash = hash("md5", $try);
                        $numChecks++;
                        if ($checksToPrint > 0) { // Print the first 15 checks
                            print "$tryHash $try<br><br>"; 
                            $checksToPrint--;
                        }
                        if ($tryHash == $hash) {
                            print "Total checks: $numChecks<br>";
                            return $try;
                        }
                    }
                }
            }
        }
        print "Total checks: $numChecks<br>";
        return "Not found"; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jordan Ballard MD5</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <h1>MD5 Cracker</h1>
    <p>This application takes an MD5 hash of a four digit pin and checks all 10,000 possible combinations to determine the PIN.</p>

    <p class="output">
        <?php
            $pin = false;
            if (isset($_GET["md5"])) {
                $timeStart = microtime(true); // Start timer
                print "Debug output:<br><br>";
                $pin = crackPIN($_GET["md5"]); 
                $timeEnd = microtime(true); // Stop timer
                $time = $timeEnd - $timeStart; // Get time elapsed to crack PIN
                print "Time Elapsed: $time";
            }
        ?>
    </p>

    <p class="pin">
        <?php 
            if ($pin !== false) {
                print "PIN: $pin"; 
            }
        ?>
    </p>

    <form>
        <label for="md5">Enter the MD5 hash of a four digit PIN number: </label>
        <input type="text" id="md5" name="md5" size="40">
        <button type="submit">Crack MD5</button>
    </form>
    <p classs="reset"><a href="./index.php">Reset Page</a></p>
    <p><a href="./createMD5.php" target="_blank">Create an MD5 hash</a></p>
</body>
</html>
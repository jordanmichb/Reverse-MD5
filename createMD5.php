<?php
    $md5 = false;
    $error = false;
    if (isset($_GET["value"])) {
        $val = $_GET["value"];
        if ($val == "") {
            $error = "Please enter a value.";
        }
        else {
            $md5 = hash("md5", $val);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jordan Ballard MD5</title>
</head>
<body>
    <h1>Convert Value to MD5</h1>
    <p>Enter a value to get its MD5 hash.</p>
    <?php 
        if ($error !== false) {
            print "<p style='color:red'>$error</p>";
        }
        elseif ($md5 !== false) {
            print "<p>MD5 Value of " . $_GET["value"] . ": $md5</p>";
        }
    ?>
    <form>
        <input type="text" name="value" maxlength="4" size="20">
        <button type="submit">Convert to MD5</button>
    </form>
    <p style="margin-top:20px"><a href="./createMD5.php">Reset Page</a></p>
</body>
</html>
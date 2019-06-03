<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation</title>
</head>
<body>
    <?php
    // * presence
    $value = trim(" ");
    if (!isset($value) || $value === ""){
        echo "Presence: Validaton failed.<br />";
    }
    // * String length
    // minimum length
    $value = "";
    $min = 3;
    if (strlen($value) < $min){
        echo "Minimum: Validaton failed.<br />";
    }
    // max length
    $max = 6;
    if (strlen($value) > $max){
        echo "Max: Validaton failed.<br />";
    }
    // * Type
    $value = "";
    if (!is_string($value)){
        echo "Type: Validaton failed.<br />";
    }
    // * Inclusion in a set
    $value ="5";
    $set = array("1","2","3","4");
    if (!in_array($value, $set)){
        echo "Inclusion: Validaton failed.<br />";
    }
    // * Uniqueness
    // uses a database to check uniqueness

    // * Format 
    // use a regex on a string
    // preg_match($regex, $subject)
    if (preg_match("/PHP/", "PHP is fun.")) {
        echo " A match was found.<br />";
    } else {
        echo "A match was not found.<br />";
    }
    $value = "nobody@nowhere.com";
    if (!preg_match("/@/", $value)) {
        echo "Validation failed.<br />";
    }


    ?>
</body>
</html>
<!-- 
    Common Validations
    Presence
        String length
        min
        max   
        Type
        Inclusion in a set
        Uniqueness
        Format    
    -->
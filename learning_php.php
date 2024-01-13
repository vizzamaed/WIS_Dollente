<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning PHP</title>
</head>
<body>
    <?php
    //PHP Syntax Overview
    $age = 2024 - 2000;
    $greetings="Hi!, ";
    $name= "Vizza Mae";
    print("$greetings $name<br>");
    print("You are $age years old.<br>");

    if($age > 17)
    {
        print ("You passed the minimum age requirement!<br>");
    }
    else
    {
        print("Sorry, your age is not allowed<br>");
    }

    if(2+3 == 5)
    {
        print("Just Practicing!");
    }
    else
    {
        print("This must not show!")
    }
    ?>
    
</body>
</html>
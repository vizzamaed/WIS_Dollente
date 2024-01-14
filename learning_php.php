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
        print("Just Practicing!<br>");
    }
    else
    {
        print("This must not show!<br>");
    }

    //PHP Variable Types
        #Integers
        $int_number = 2024;
        $int_add_numbers = -2024+2024;
        
        #Doubles
        $long_decimals=2.0242424;
        $long_decimals_again =2.0232323;
        $short=$long_decimals+$long_decimals_again;
        print($long_decimals + $long_decimals_again =$short);

        #Boolean
        $true_string = "This is true";
        if (TRUE)
            print("This will always print<br>");
        else
            print("This will never print<br>");

        #Null
        $num_empty =NULL;
        if ($num_empty)
            print("This is null, this must not show<br>");
        else
            print("This must show because null = false <br>");

        #String
        $name= "Guacamole";
        $breed= "shih tzu";
        $message="My dog , $name , is a $breed!\n";
        print($message);

    ?>
    
</body>
</html>
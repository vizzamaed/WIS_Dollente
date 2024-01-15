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
        $message="My dog , $name , is a $breed!<br>";
        print($message);


        #PHP Function Parameters
        function multiply($int_price){
            $int_price=$int_price*100;
            return $int_price;
        }

        $retval = multiply (3.142344);
        print"Your total price of purchase :Php $retval <br>";

        #PHP Global Variables
        $round_off_price =$retval;
        function addit(){
        GLOBAL $round_off_price;
        $round_off_price--;
        print "Official payment is $round_off_price<br>";
        }
        addit();

        #PHP Local Variables
        $num=5;
        function assignx ()
            {
            $num=10;
            print "$num is local variable, inside of function,<br>";
            }
            assignx();
            print "$num is global variable, outside of function.<br>";
        

        #PHP Static Variables
        function keep_track(){
            STATIC $count=4;
            $count++;
            print $count;
            print "";
        }
        keep_track();
        keep_track();
        keep_track();

        #PHP Function Parameters
        function mul ($number){
            $number=$number*15;
            return $number;
        }

        $retvalue=mul(15);
        print"<br>Return Value is $retvalue<br>";

    //PHP Constants
    define ("MINSIZE", 25);
    echo MINSIZE;
    echo constant("MINSIZE");
    print"<br>"; 

    //PHP Operator Types
    $a=60;
    $b=80;

    $c=$a+$b;
    echo "Addition Operation Result: $c <br/>";
    $c=$a-$b;
    echo "Subtraction Operation Result: $c <br/>";
    $c=$a*$b;
    echo "Multiplication Operation Result: $c <br/>";
    $c=$a/$b;
    echo "Division Operation Result: $c <br/>";
    $c=$a%$b;
    echo "Modulus Operation Result: $c <br/>";
    $c=$a++;
    echo "Increment Operation Result: $c <br/>";
    $c=$a--;
    echo "Decrement Operation Result: $c <br/>";
    print "Done with Learning PHP Lessons!<br>";



    ?>
    
</body>
</html>
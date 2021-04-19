<?php
require_once("fileops.php");


if($_SERVER['REQUEST_METHOD']== 'GET')
{
        require("header.php");
        ?>
<form method = "POST"  action= "http://deltona.birdnest.org/~acc.williamsm75/signupEmail.php">

<label>  Email: <input type= "text" name="Email"></label><br>

<button type= "subscribe">Subscribe</button>
</form>


<?php

require("footer.php");
}

else {
    $emailAddress = $_POST['Email'];
    $msg = "Dear $emailAddress: \nThank you for signing up, please check email to confirm subscription";
    echo $msg;
if(isset($_POST['Email'])) 
        {

                $emailAddress = $_POST['Email'];
                $status= "False";
                $rand= bin2hex(random_bytes(10));
                $file = 'emails.csv';
                //$row = "$emailAddress,$rand,$status\n";
                //$msg = "Dear $emailAddress: \nThank you for signing up, please click here to confirm";

                // variable for email address asking to subscribe!";
        
        $link = " <a href='http://deltona.birdnest.org/~acc.williamsm75/confirmEmail.php?email=". urlencode($emailAddress). "&confirmation=". urlencode($rand) ."'> click </a>"; 
        
        //echo  " <a href='confirmEmail.php?email=". urlencode($emailAddress). "&confirmation=". urlencode($rand) ."> click </a>"; 
   

    //print_r($link);

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    

    $subject = "Confirm Subscription"; 

    $join = "Click on link to subscribe $link";

 //use wordwrap
 $msg= wordwrap($msg,1000);


 //send email
mail("williamsm75@mailbox.winthrop.edu",$subject,$join,$headers);


             $subCheck= array();
             $subCheck[]=$emailAddress;
     $subCheck[]=$rand;
     $subCheck[]=$status;

     $subCheck[2]= str_replace("\r\n", "", $subCheck[2]);
             appendLine($file, implode(",", $subCheck) . "\r\n") ;




     
     }


}
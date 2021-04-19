<?php
require_once("fileops.php");

//print_r ($_GET); 
//Array ( [email] => 9williamsm75@winthrop.edu [confirmation] => 6c5dad1d4c1c3194f819> click
require("header.php");
$userEmail= trim($_GET['email']); // Email from email link
 $userConfirm= trim($_GET['confirmation']); // Confirmation string fron user

 if(isset($_GET['email'])) 
        {
 $Contents= readLines('emails.csv');

 
$i=0;
 foreach ($Contents as $ContentLine)
 {
    $ContentLine = explode("," ,$ContentLine);



if ($userEmail == $ContentLine[0] && $userConfirm == $ContentLine[1] )
{

    echo "your email is confimed";
    deleteLine('emails.csv',$i);
    
    

    $subCheck= array();
                $subCheck[]=$userEmail;
        $subCheck[]= $userConfirm;
        $subCheck[]="True";

        $subCheck[2]= str_replace("\r\n", "", $subCheck[2]);
                appendLine("emails.csv", implode(",", $subCheck) . "\r\n");
}
$i++;
    }
 //echo "$ContentLine[0],$ContentLine[1],$ContentLine[2]";
 
 //print_r($ContentLine);
 }
//deleteLine('emails.csv', $_GET[$Contents]);

 /*if ($ContentLine[2]== $userEmail) 
 {
 deleteLine('emails.csv', $ContentLine[2]);  
 $ContentLine[2]= "True";
 echo $ContentLine[2];
  }
 */
 /*
 $subCheck= array();
                $subCheck[]=$emailAddress;
        $subCheck[]=$rand;
        $subCheck[]=$status;

        $subCheck[2]= str_replace("\r\n", "", $subCheck[2]);
                appendLine($file, implode(",", $subCheck) . "\r\n") ;

 appendLine('emails.csv', )   */  

 //echo $ContentLine[2];


//echo $ContentLine[0];
//echo "<br>";  
//print_r($ContentLine[0]);


 //echo "yo";
    require("footer.php");

?>



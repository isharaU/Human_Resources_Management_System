<?php
header("Location: index.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sadeepaekanayaked@gmail.com';
    $mail->Password   = 'bcinmlnyoximsxfg'; // need to change
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('sadeepaekanayaked@gmail.com', 'Sadeepa Dhananjaya');
    $mail->addAddress('esadeepa@yahoo.com');

    $mail->isHTML(true);
    $mail->Subject = 'Subject';

    $mail->Body = '
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  
    <form method="GET" action="http://localhost:80/jupyter/admin_add_user.php">
        <div>
            <label >First Name</label>
                <input type="text" name="xfname" value="' . $_POST['fname'] . '"><br>        
        </div>
        <div>
            <label >Last Name</label>
                <input type="text" name="xlname" value="' . $_POST['lname'] . '"><br>        
        </div>
        <div>
            <label >Email</label>
                <input type="text" name="xemail" value="' . $_POST['email'] . '"><br>        
        </div>
        <div>
            <label >Phone Number</label>
                <input type="text" name="xphone" value="' . $_POST['phone'] . '"><br>        
        </div>
        <div>
            <label >Birth Day</label>
                <input type="text" name="xbdate" value="' . $_POST['bdate'] . '"><br>        
        </div>
        <div>
            <label >Gender</label>
                <input type="text" name="xgender" value="' . $_POST['gender'] . '"><br>        
        </div>
        <div>
            <label >Marital Status</label>
                <input type="text" name="xmarital" value="' . $_POST['marital'] . '"><br>        
        </div>
        <div>
            <label >Address line 1</label>
                <input type="text" name="xadd1" value="' . $_POST['add1'] . '"><br>        
        </div>
        <div>
            <label >Address line 2</label>
                <input type="text" name="xadd2" value="' . $_POST['add2'] . '"><br>        
        </div>
        <div>
            <label >City</label>
                <input type="text" name="xcity" value="' . $_POST['city'] . '"><br>        
        </div>
        <div>
            <label >Province</label>
                <input type="text" name="xprovince" value="' . $_POST['province'] . '"><br>        
        </div>
        <div>
            <label >Zip</label>
                <input type="text" name="xzip" value="' . $_POST['zip'] . '"><br>        
        </div>
        <div>
            <label >Job Title</label>
                <input type="text" name="xjtitle" value="' . $_POST['jtitle'] . '"><br>        
        </div>
        <div>
            <label >Department</label>
                <input type="text" name="xdpt" value="' . $_POST['dpt'] . '"><br>        
        </div>
        <div>
            <label >Pay Grade</label>
                <input type="text" name="xpaygrade" value="' . $_POST['paygrade'] . '"><br>        
        </div>
        <div>
            <label >Status</label>
                <input type="text" name="xstatus" value="' . $_POST['status'] . '"><br>        
        </div>
        <div>
            <label >Bank Name</label>
                <input type="text" name="xbnkname" value="' . $_POST['bnkname'] . '"><br>        
        </div>
        <div>
            <label >Branch Name</label>
                <input type="text" name="xbrnchname" value="' . $_POST['brnchname'] . '"><br>        
        </div>
        <div>
            <label >Account Number</label>
                <input type="text" name="xaccn" value="' . $_POST['accn'] . '"><br>        
        </div>
        
      <input type="submit" value="Approve Job">
    </form>
  </div>
</body>

</html>
';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


exit();


<?php
$email_to = "yuli@kana.co.id ";
$subject = $_POST['name'];

$message = "
<h1>EMAIL KANA DIGITAL</h1>
<table width='400' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='100' valign='top'>Name</td>
    <td width='10' valign='top'>:</td>
    <td width='92' valign='top'>".$_POST['name']."</td>
  </tr>
  <tr>
    <td valign='top'>Email</td>
    <td valign='top'>:</td>
    <td valign='top'>".$_POST['email']."</td>
  </tr>
  <tr>
    <td valign='top'>Phone</td>
    <td valign='top'>:</td>
    <td valign='top'>".$_POST['phone']."</td>
  </tr>
  <tr>
    <td valign='top'>Company</td>
    <td valign='top'>:</td>
    <td valign='top'>".$_POST['company']."</td>
  </tr>
  <tr>
    <td valign='top'>Message</td>
    <td valign='top'>:</td>
    <td valign='top'>".$_POST['message']."</td>
  </tr>
</table>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";
    if(mail($email_to, $subject, $message, $headers)){
        echo '1'; // we are sending this text to the ajax request telling it that the mail is sent..      
    }else{
        echo '0';// ... or this one to tell it that it wasn't sent    
    }
?> 
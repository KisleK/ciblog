<?php
composer require mailgun/mailgun-php:~1.7.2
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use MailgunMailgun;
?>

<h2><?= $title;?></h2>
   
   <div class="container">
<div class="row">
<div class="col-md-12">
<div id="main">
<h1>Send Email via Mailgun API Using PHP</h1>
</div>
</div>
<div class="col-md-12">
<div class="matter">
<div id="login">
<h2>Send Email</h2>
<?php echo form_open('contacts/create'); ?>
<label class="lab">Sender's Name :</label>
<input type="text" name="sname" id="to" placeholder="Senders Name"/>
<label class="lab">Receiver's Email Address :</label>
<input type="email" name="to" id="to" placeholder="Receiver's email address" />
<label class="lab">Email type:</label><div class="clr"></div>
<div class="lab">
<input type="radio" value="def" name="etype" checked>Default
<input type="radio" value="cc" name="etype" >cc
<input type="radio" value="bcc" name="etype" >bcc </div>
<div class="clr"></div>
<label class="lab">Subject :</label>
<input type="text" name="subject" id="subject" placeholder="subject" required />
<label class="lab">Message body :</label><div class="clr"></div>
<div class="lab">
<input type="radio" value="text" name="msgtype" checked>Text
<input type="radio" value="html" name="msgtype" >HTML</div>
<textarea type="text" name="msg" id="msg" placeholder="Enter your message here.." required ></textarea>
<input type="submit" value=" Send " name="submit"/>
</form>
</div>
</div>
</div>
</div>
<!-- Right side div -->
</div>
 



<?php
if (isset($_POST['sname'])) {
$sname=$_POST['sname'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$msgtype = $_POST['msgtype'];
if($msgtype=='text'){
$html='';
}
else{
$msg = htmlentities($msg);
$html=$msg;
$msg='';
}
$mgClient = new Mailgun('8cda2ad72e14d0f9fd0c41848cdf2909-4167c382-1d8d1152');
// Enter domain which you find in Default Password
$domain = "https://api.mailgun.net/v3/sandboxbe0b4f475fc54f519822ba244213d93f.mailgun.org/messages";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
"from" => "$sname <postmaster@sandboxbe0b4f475fc54f519822ba244213d93f.mailgun.org>",
"to" => "Baz <$to>",
"subject" => "$subject",
"text" => "$msg!",
'html' => "$html"
));
echo "<script>alert('Email Sent Successfully.. !!');</script>";
}
?>
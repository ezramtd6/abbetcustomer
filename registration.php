<?php session_start(); ?>
<?php
    include('connection.php');
    $user_name = "";
    $email = "";
    $password ="";
    $rpassword = "";
    $phone="";
    $errors=array();
    if(isset($_POST["register"])){
        $user_name = $_POST["id"];
        $email = $_POST["name"];
        $password = $_POST["pass"];
        $rpassword = $_POST["rpass"];
        $phone= $_POST["phone"];
        $sqll="Select * from signup where username='$user_name'";
      	$res=mysqli_query($connect,$sqll);
        $sql2="Select * from signup where email='$email'";
        $res1=mysqli_query($connect,$sql2);
        $sql3="Select * from signup where phone='$phone'";
        $res2=mysqli_query($connect,$sql3);
        if(empty($user_name))
        {
	array_push($errors,"User Name not be empty");
        }
        else if(mysqli_num_rows($res)>0){
  array_push($errors,"Username already registered");
        }
       else if(empty($email))
        {
  array_push($errors,"Email not be empty");
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
  array_push($errors, "Invalid Email Format");
        }
        else if(mysqli_num_rows($res1)>0){
  array_push($errors,"Email already registered");
        }
        else if(empty($phone))
         {
   array_push($errors,"Phone number cant be empty");
         }
         else if(!preg_match('/^(09[-]?)[0-9]{8}$/',$phone))
         {
   array_push($errors, "Invalid Phone number Format");
         }
         else if(mysqli_num_rows($res2)>0){
   array_push($errors,"Phone number is already registered");
         }
        else if(empty($password))
         {
   array_push($errors,"Password not be empty");
         }
    else if(!preg_match('/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!*@#$%^&+=]).*$/',$password))
         {
   array_push($errors, "Password At least one lower case letter \n Password At least one upper caseletter \n Password At least one number \n Password At least 8 characters length");
         }
         else if(empty($rpassword))
          {
    array_push($errors,"Retype Password not be empty");
          }
         else if($password !== $rpassword){
          array_push($errors, "Password Not matched each other");
         }
         else
          {if(count($errors)==0)
              {  $password_hash = password_hash($password, PASSWORD_BCRYPT);
                  $expFormat = mktime(date("H"), date("i"), date("s")+370, date("m"), date("d"), date("Y"));
                  $expDate = date("Y-m-d H:i:s", $expFormat);
                    $otp = rand(100000,999999);
                    $_SESSION['mail'] = $email;
                    $q=$_SESSION['mail'];
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';

                    $mail->Username='ezramekuria463@gmail.com';
                    $mail->Password='uipqbqmmtxyrudba';
                    $mail->From=$email;
                    $mail->FromName="ABBET";
                    $mail->AddCC($email,"ABBET Website");

                    $mail->setFrom('email account', 'ABBET');
                    $mail->addAddress($_POST["name"],'Reciever');

                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>To authenticate, please use the following One Time Verification code:<h3> $otp </h3>

                  <p>Don't share this OTP with anyone. Our customer service team will never ask you for your password,</p>
                    <p>We hope to see you again soon.</p> ";
                    if(!$mail->send()){
                    array_push($errors, "Connection Failed !");
                  }  else { ?>
                    <?php
                        mysqli_query($connect, "INSERT INTO signup (username,email, password, status,phone) VALUES ('$user_name','$email', '$password_hash', 0,'$phone')");
                        $sqlu = mysqli_query($connect, "SELECT * FROM forgot where username = '$q'");
                        $countl = mysqli_num_rows($sqlu);
                        if($countl < 1 ){
                          $hash = password_hash( $otp , PASSWORD_DEFAULT );
                          $sql = mysqli_query($connect, "INSERT INTO forgot (username,token,expDate) VALUES ('$q','$hash','$expDate')");
                          $_SESSION["hash"]=$hash;    ?>
                          <script>
                             window.location.replace('verificationn.php');
                          </script>
                    <?php }
                     else if($countl == 1){
                      $hash = password_hash( $otp , PASSWORD_DEFAULT );
                      mysqli_query($connect, "UPDATE forgot SET token='$hash',expDate='$expDate' WHERE username='$q'");
                      $_SESSION["hash"]=$hash; ?>
                      <script>
                        alert("Please check ur email to coniform");
                         window.location.replace('verificationn.php');
                      </script>
       <?php

     }}}}}
          if(isset($_POST['login']))
      {
        include('connection.php');
        $email = mysqli_real_escape_string($connect, trim($_POST['id']));
        $password = $_POST['pass'];
        $sql = mysqli_query($connect, "SELECT * FROM signup where email = '$email' or username='$email'");
        $count = mysqli_num_rows($sql);
        $fetch = mysqli_fetch_assoc($sql);

          if(empty($email) or empty($password)){
            array_push($errors,"Username(Email) or password cannot be empty");
          }

        else if(count($errors) == 0 and $count > 0)
          {

                $hashpassword = $fetch["password"];
                if(password_verify($password, $hashpassword)){
                    if($fetch["status"] === '0'){
              ?>
                    <?php
                    $expFormat = mktime(date("H"), date("i"), date("s")+370, date("m"), date("d"), date("Y"));
                    $expDate = date("Y-m-d H:i:s", $expFormat);
                    $otp = rand(100000,999999);
                    $_SESSION['mai'] = $fetch['email'];
                    $p=  $_SESSION['mai'];
                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';

                    $mail->Username='ezramekuria463@gmail.com';
                    $mail->Password='uipqbqmmtxyrudba';
                    $mail->From=$fetch['email'];
                    $mail->FromName="ABBET";
                    $mail->AddCC($fetch['email'],"ABBET Website");

                    $mail->setFrom('email account', 'ABBET');
                    $mail->addAddress($_SESSION['mai'],'Reciever');

                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>To authenticate, please use the following One Time Verification code:<h3> $otp </h3>

                  <p>Don't share this OTP with anyone. Our customer service team will never ask you for your password,</p>
                    <p>We hope to see you again soon.</p> ";
                    if(!$mail->send()){
                    array_push($errors, "Register Failed, Poor connection");
                  } else{$sqlu = mysqli_query($connect, "SELECT * FROM forgot where username = '$p'");
                      $countl = mysqli_num_rows($sqlu);
                      if($countl < 1 ){
                        $hash = password_hash( $otp , PASSWORD_DEFAULT );
                        $sql = mysqli_query($connect, "INSERT INTO forgot (username,token,expDate) VALUES ('$p','$hash','$expDate')");
                        $_SESSION["hash"]=$hash;
                      ?>
                      <!-- Button trigger modal -->

                      <script>
                          alert("Please verify email account before login.");
                         window.location.replace('verification.php');
                      </script>
                      <?php
                    }
                        else if($countl == 1){
                          $hash = password_hash( $otp , PASSWORD_DEFAULT );
                          mysqli_query($connect, "UPDATE forgot SET token='$hash',expDate='$expDate' WHERE username='$p'");
                          $_SESSION["hash"]=$hash;?>
                          <script>
                              alert("Please verify email account before login.");
                             window.location.replace('verification.php');
                          </script>

                  <?php  } ?>

              <?php

            }
              }else{
                    $_SESSION["mailo"]=$fetch['username'];
                    header('location:home.php');
                 }}else{
                  array_push($errors,"Not matched");
                    ?>
                      <?php }  }}
                  if(isset($_POST["forgot"])){
                        $_SESSION['email']=$_POST["idd"];
                        $x=$_SESSION['email'];
                        $sql = mysqli_query($connect, "SELECT * FROM signup where email = '$x' LIMIT 1");
                        $count = mysqli_num_rows($sql);
                        $fetch = mysqli_fetch_assoc($sql);
                          if(empty($x)){
                            array_push($errors,"Email cannot be empty");
                          }
                          else if(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/',$x))
                          {
                            array_push($errors, "Invalid Email Format");
                          }
                          else if($count <= 0){
                            array_push($errors,"No email found");
                          }
                          else if($fetch["status"] == 0){
                            array_push($errors,"Sorry, your account must verify first, before you recover your password !");
                          }
                            else{
                              $expFormat = mktime(date("H"), date("i"), date("s")+370, date("m"), date("d"), date("Y"));
                              $expDate = date("Y-m-d H:i:s", $expFormat);
                              $_SESSION['mail']=$fetch["username"];
                              // generate token by binaryhexa
                              $token=bin2hex(random_bytes(80));
                              $_SESSION['token'] = $token;
                              $_SESSION['email'] = $x;
                              require "Mail/phpmailer/PHPMailerAutoload.php";
                              $mail = new PHPMailer;

                              $mail->isSMTP();
                              $mail->Host='smtp.gmail.com';
                              $mail->Port=587;
                              $mail->SMTPAuth=true;
                              $mail->SMTPSecure='tls';

                              // h-hotel account
                              $mail->Username='ezramekuria463@gmail.com';
                              $mail->Password='uipqbqmmtxyrudba';

                              // send by h-hotel email
                                $mail->FromName="ABBET";
                              // get email from input
                              $mail->AddCC($x,"ABBET Website");

                              $mail->setFrom('email account', 'ABBET');
                              $mail->addAddress($_SESSION["email"]);
                              //$mail->addReplyTo('lamkaizhe16@gmail.com');

                              // HTML body
                              $mail->isHTML(true);
                              $mail->Subject="Recover your password";
                              $mail->Body="<b>Dear User</b>
                              <h3>We received a request to reset your password.</h3>
                              <p>Kindly click the below link to reset your password</p>
                              <a href='http://localhost/sp/customer/reset_psw.php?password=$token'>Click this link to reset your password</a>

                              <br><br>
                              <p>With regrads,</p>
                              <b>ABBET</b>";

                              if(!$mail->send()){
                                  ?>
                                      <script>
                                          alert("<?php echo " Connection not stable "?>");
                                      </script>
                                  <?php
                              }else{
                                $sqlu = mysqli_query($connect, "SELECT * FROM forgot where username = '$x'");
                                $countl = mysqli_num_rows($sqlu);
                                if($countl < 1 ){
                                  $sql = mysqli_query($connect, "INSERT INTO forgot (username,token,expDate) VALUES ('$x','$token','$expDate')");}
                                  else if($countl == 1){
                                    mysqli_query($connect, "UPDATE forgot SET token='$token',expDate='$expDate' WHERE username='$x'");
                                }

                                  ?>
                                      <script>
                                          window.location.replace("notification.php");
                                      </script>
                                  <?php
                                }
                              }

                        }
          ?>
          <?php
          if(isset($_GET['logout']))
              {
              unset($_SESSION['mailo']);
              header('location:perlog.php');
            }
            if(isset($_POST['ChangeP'])){
              $old=$_POST["opass"];
              $new=$_POST["npass"];
              $rpass=$_POST["rpass"];
              $q= $_SESSION["mailo"];
              if(empty($old)){
        	array_push($errors,"Old password not be empty");
              }
              else if(empty($new)){
          	array_push($errors,"New password not be empty");
                }
            else if(!preg_match('/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!*@#$%^&+=]).*$/',$new))
                     {
               array_push($errors, "Password At least one lower case letter \n Password At least one upper caseletter \n Password At least one number \n Password At least 8 characters length");
                     }
              else if(empty($rpass)){
            array_push($errors,"Retype password not be empty");
                }
              else if($new !== $rpass){
                 array_push($errors,"New and Retype password not Matched");
               }

                else{
                    $sql = mysqli_query($connect, "SELECT password FROM signup where username='$q'");
                    $fetch = mysqli_fetch_assoc($sql);
                      if(password_verify($old, $fetch['password'])){
                        $hash = password_hash( $new , PASSWORD_DEFAULT );
                        mysqli_query($connect, "UPDATE signup SET password='$hash' WHERE username='$q'");
                      ?>
                      <script>
                          alert("<?php echo " Password Successfully Changed "?>");
                          window.location.replace("home.php");
                      </script>
                    <?php }
                else {?>
                  <script>
                      alert("<?php echo "Old Password Incorrect "?>");
                  </script>
                <?php }
                }
            }

          ?>

		<?php
					// support only using localhost to sending an email
					use PHPMailer\PHPMailer\PHPMailer;
					if(isset($_POST['submit'])){
						$firstname = $_POST['firstname'];
						$lastname = $_POST['lastname'];
						$emailTo = $_POST['email'];
						$phoneNumber = $_POST['phonenumber'];
						$comment = $_POST['comment'];
						require_once "PHPMailer/PHPMailer.php";
						require_once "PHPMailer/SMTP.php";
						require_once "PHPMailer/Exception.php";

						// condition for checking corrected form
						if(empty($firstname) || empty($lastname) || empty($emailTo) || empty($comment)){

							echo '<script>alert("Please fill your information completely");</script>';

							}

						 if(filter_var($emailTo, FILTER_VALIDATE_EMAIL) == false && !empty($emailTo)){
							echo '<script>alert("Please enter a valid email address");</script>';
							}
						if(!preg_match("/^\d{10}+$/", $phoneNumber)){
							echo '<script>alert("Only number with 10 digits required");</script>';

						}
						if(!empty($firstname) || !empty($lastname) || !empty($emailTo) || !empty($comment)){
							
							// send an email
							$mail = new PHPMailer();
							$txt = "Hello, ".$firstname." ".$lastname."<br><br>"."Thank you for feedback on our website, we will solve this issue as soon as possible"."<br><br><br><br>"."<table border = 1 ><tr>Your comment</tr>"."<tr>".$comment."</tr></table>";
							$mail->isSMTP();
							$mail->Host ="smtp.gmail.com";
							$mail->SMTPAuth= true;
							$mail->Username="feedbacktocustomer@gmail.com";
							$mail->Password="Test2019";
							$mail->Port = 587;
							$mail->SMTPSecure = "tls";
							//Email Settings
							$mail->isHTML(true);
							$mail->setFrom("feedbacktocustomer@gmail.com","Suthasinee Boonsang");
							$mail->addAddress($emailTo);
							$mail->Subject = "feedback on Website";
							$mail->Body = $txt ;
							if($mail->send()){
								echo '<script>alert("Successfully!");</script>';
							}else{
								
								echo '<script>alert("Please try again!");</script>';
							}

							// add data to database (mysql)
							$dbServername = "localhost";
							$dbUsername = "root";
							$dbPassword = "";
							$dbName = "feedback";
							$conn = new mysqli ($dbServername,$dbUsername,$dbPassword,$dbName);
							if(mysqli_connect_error()){
								echo '<script>alert("can not connect database ");</script>';

							}else{
								$sql = "INSERT INTO customer_feedback(firstname,lastname,emailaddress,phonenumber,comments) values('$firstname','$lastname','$emailTo','$phoneNumber','$comment')";
								if($conn->query($sql)){
									echo "New record is inserted ";
								}
								else{
									echo "Error: ".$sql."<br>".$conn->error;
								}
								$conn->close();
							}


						}


					}

			?>
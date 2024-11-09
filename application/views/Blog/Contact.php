<?php include 'Components\Header.php';

require 'Components/Includes/PHPMailer.php';
require 'Components/Includes/SMTP.php';
require 'Components/Includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Username = "sorabhj2312@gmail.com";
$mail->Password = "uxyn lffa lwpj gbgt";
$mail->Subject = "User Request";
$mail->isHTML(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = htmlspecialchars($_POST['name']);
   $email = htmlspecialchars($_POST['email']);
   $subject = htmlspecialchars($_POST['subject']);
   $message = htmlspecialchars($_POST['message']);

   $mail->setFrom("sorabhj2312@gmail.com", "Website Contact Form"); 
   $mail->addAddress('sorabhj2312@gmail.com');
   $mail->addReplyTo($email, $name); 
   $mail->Body = "
       <h2>Contact Request from Blog</h2>
       <h3><strong>Subject:</strong> {$subject}</h3>
       <p><strong>Name:</strong> {$name}</p>
       <p><strong>Email:</strong> {$email}</p>
       <p><strong>Message:</strong><br>{$message}</p>
   ";

   if ($mail->send()) {
      
   } else {
       echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
   }

   $mail->smtpClose();
}
?>

<main class="content">
    <h1 class="contact-title">Contact Us</h1>
    <div class="form-container">
        <form method="POST" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required placeholder="Subject">

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="3" required placeholder="Your message"></textarea>

            <button type="submit" class="submit-btn">Send</button>
        </form>
    </div>
</main>

<?php include 'Components\Footer.php'; ?>

<style>

.content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

/* Contact Title Styling */
.contact-title {
    color: #333;
    font-size: 2em;
    margin-bottom: 20px;
    text-align: center;
    width: 100%;
}
#message{
   resize: vertical;
}
/* Form Container Styling */
.form-container {
    background-color: #ffffff;
    width: 100%;
    max-width: 600px;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    border-left: 5px solid #5a6c7b; /* Blue-gray accent border */
}

/* Form Label Styling */
.contact-form label {
    display: block;
    margin-top: 10px;
    color: #555;
    font-weight: bold;
}

/* Input Field Styling */
.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #fafafa;
}

/* Submit Button Styling */
.submit-btn {
    background-color: #5a6c7b;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #4e5e6c; /* Darker blue-gray on hover */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .form-container {
        padding: 20px;
    }
    .contact-title {
        font-size: 1.5em;
    }
}
</style>

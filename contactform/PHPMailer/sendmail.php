<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

            $mail = new PHPMailer(true);

            //Enable SMTP debugging.
            $mail->SMTPDebug = 0; //0 or 2

            //Set PHPMailer to use SMTP.
            $mail->isSMTP();

            //Set SMTP host name
            $mail->Host = "smtp.gmail.com";

            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Provide username and password
            $mail->Username = "chiranjib.bablu@gmail.com";
            $mail->Password = "voowkmasjzkmqnse";

            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "tls";

            //Set TCP port to connect to
            $mail->Port = 587;

            $mail->From = $_POST["email"];
            $mail->FromName = "Web Contact";

            $mail->addAddress('chiranjib.bablu@gmail.com' , "user");

            $mail->isHTML(true);
            $mail->Subject = "Contact";

            $message = "
            <style>
            b{background-color: powderblue;}
            
            </style>
            <table>
            <tr><td><b>User Name : </b></td><td>" . $_POST["name"] . "</td></tr>
                <tr><td><b>User Email : </b></td><td>" . $_POST["email"] . "</td></tr>
                <tr><td><b>Subject : </b></td><td>" . $_POST["subject"] . "</td></tr>
                <tr><td><b>Message : </b></td><td>" . $_POST["message"] . "</td></tr>
            </table>
            ";

            $mail->Body = $message;
            try {
                $mail->send();
                // header("HTTP/1.1 200 OK"); // Set the HTTP response code to 200 for success
                // $httpProtocol = $_SERVER['SERVER_PROTOCOL'];
                // echo "HTTP Protocol Version: $httpProtocol";

                //return status 200 with message
                $response = [
                    "status" => 200,
                    "message" => 'succcess',
                    "result" => 'Your message has been sent. Thank you!'
                ];
                
                // Set the HTTP response content type to JSON
                header("Content-Type: application/json");
                
                // Encode the response array into JSON format and echo it
                echo json_encode($response);
            } catch (Exception $e) {
                //return status 500 with message
                $response = [
                    "status" => 500,
                    "message" => 'failed',
                    "result" => 'Please try again. Thank you!'
                ];
                
                // Set the HTTP response content type to JSON
                header("Content-Type: application/json");
                // Encode the response array into JSON format and echo it
                echo json_encode($response);
            }
        


    





























?>

<?php
// *********************
// CONTACT FORM SETTINGS
// *********************

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Gmail SMTP settings
$gmailUser = 'amigosplumbingdraincleaninginc@gmail.com';
$gmailAppPassword = 'mruw xizi jmjo wqdr';

// Get submitted form fields (sanitized)
$name     = htmlspecialchars(trim($_POST['name'] ?? ''));
$email    = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$phone    = htmlspecialchars(trim($_POST['phone'] ?? ''));
$zipcode  = htmlspecialchars(trim($_POST['zipcode'] ?? ''));
$service  = htmlspecialchars(trim($_POST['service'] ?? ''));
$message  = htmlspecialchars(trim($_POST['message'] ?? ''));

// Basic validation
if (!$name || !$phone || !$service) {
    die("Please fill out all required fields.");
}

// Build HTML email message body
$body = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #1a1a1a; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #1a1a1a;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color: #000000; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #222222 0%, #000000 100%); padding: 30px 40px; border-bottom: 3px solid #333333;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600; letter-spacing: 1px;">New Contact Form Submission</h1>
                            <p style="margin: 8px 0 0 0; color: #888888; font-size: 14px;">Amigos Plumbing &amp; Drain Cleaning Website</p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px;">
                            <!-- Name -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding: 15px 20px; background-color: #111111; border-radius: 8px; border-left: 4px solid #4a90d9;">
                                        <p style="margin: 0 0 5px 0; color: #888888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Name</p>
                                        <p style="margin: 0; color: #ffffff; font-size: 16px; font-weight: 500;">' . $name . '</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Email -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding: 15px 20px; background-color: #111111; border-radius: 8px; border-left: 4px solid #4a90d9;">
                                        <p style="margin: 0 0 5px 0; color: #888888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Email</p>
                                        <p style="margin: 0; color: #4a90d9; font-size: 16px;"><a href="mailto:' . $email . '" style="color: #4a90d9; text-decoration: none;">' . $email . '</a></p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Phone -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding: 15px 20px; background-color: #111111; border-radius: 8px; border-left: 4px solid #4a90d9;">
                                        <p style="margin: 0 0 5px 0; color: #888888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Phone</p>
                                        <p style="margin: 0; color: #ffffff; font-size: 16px;"><a href="tel:' . $phone . '" style="color: #ffffff; text-decoration: none;">' . $phone . '</a></p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Zip Code -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding: 15px 20px; background-color: #111111; border-radius: 8px; border-left: 4px solid #4a90d9;">
                                        <p style="margin: 0 0 5px 0; color: #888888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Zip Code</p>
                                        <p style="margin: 0; color: #ffffff; font-size: 16px;">' . $zipcode . '</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Service Requested -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding: 15px 20px; background-color: #111111; border-radius: 8px; border-left: 4px solid #4a90d9;">
                                        <p style="margin: 0 0 5px 0; color: #888888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Service Requested</p>
                                        <p style="margin: 0; color: #ffffff; font-size: 16px; font-weight: 500;">' . $service . '</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message -->
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="padding: 20px; background-color: #111111; border-radius: 8px; border-left: 4px solid #4a90d9;">
                                        <p style="margin: 0 0 10px 0; color: #888888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">Message</p>
                                        <p style="margin: 0; color: #ffffff; font-size: 15px; line-height: 1.6;">' . nl2br($message) . '</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #0a0a0a; padding: 25px 40px; text-align: center; border-top: 1px solid #222222;">
                            <a href="https://goldmarkdigital.com" style="color: #d4af37; font-size: 14px; font-weight: 600; text-decoration: none; letter-spacing: 2px;">GOLDMARK DIGITAL</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

// Send email using PHPMailer with Gmail SMTP
$mail = new PHPMailer(true);

try {
    // SMTP server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $gmailUser;
    $mail->Password = $gmailAppPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($gmailUser, 'Amigos Plumbing Website');
    $mail->addAddress('jesse@amigosplumbinganddrain.com');
    $mail->addBCC('jarren@goldmarkdigital.com');
    if ($email) { $mail->addReplyTo($email, $name); }

    // Content
    $mail->isHTML(true);
    $mail->Subject = '! New Plumbing Quote Request — ' . $service . ' !';
    $mail->Body = $body;

    $mail->send();
    echo "SUCCESS";
} catch (Exception $e) {
    echo "ERROR: Could not send email. {$mail->ErrorInfo}";
}
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';


class Reservation extends Dbconn {

    protected function createWalk($dateOfWalk, $startLoc, $endLoc, $details, $dateEnd, $status, $customer_id, $walker_id){
        $pdo = $this->setConnection();
        $pdoStatement = $pdo->prepare('INSERT INTO walk(walk_date, start_location, end_location, description, walk_end, status, customer_id, walker_id) VALUES (?,?,?,?,?,?,?,?)');

        if(!$pdoStatement->execute([$dateOfWalk, $startLoc, $endLoc, $details, $dateEnd, $status, $customer_id, $walker_id])) {
            $pdoStatement = null;
            $array = array("error" => "stmtCreateReservationFail");
            echo json_encode($array);
            die();
        }
        $walk_id = $pdo->lastInsertId();
        $pdoStatement = null;
        $this->sendMail($walker_id);
        return $walk_id;
    }

    protected function createWalkDogs($walk_id, $dogs_id)
    {
        //var_dump($walk_id); die();
        //inserts address in address table
        $sql = "INSERT INTO walk_dogs (walk_id, dog_id) VALUES (?,?)";
        $stmt = $this->setConnection()->prepare($sql);

        if (!$stmt->execute([$walk_id, $dogs_id])) {
            $stmt = null;
            $array = array("error" => "stmtCreateWalkFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;
    }

    private function sendMail($walker_id){
        $sql = "SELECT email FROM user WHERE id = ? ";
        $stmt = $this->setConnection()->prepare($sql);
        if(!$stmt->execute([$walker_id])){
            $stmt = null;
            $array = array("error" => "stmtGetWalkerEmailFailed");
            echo json_encode($array);
            die();
        }
        $walker = $stmt->fetch(PDO::FETCH_ASSOC);

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.mail.yahoo.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ivonamilankovic@yahoo.com';
            $mail->Password = 'csernhctlmisttok';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('ivonamilankovic@yahoo.com', 'Paw Walks');
            $mail->addAddress($walker['email']);
            $mail->isHTML(true);

            $mail->Subject = 'New reservation request for you! - Paw Walks';
            $mail->Body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                            <head>
                            <!--[if gte mso 9]>
                            <xml>
                              <o:OfficeDocumentSettings>
                                <o:AllowPNG/>
                                <o:PixelsPerInch>96</o:PixelsPerInch>
                              </o:OfficeDocumentSettings>
                            </xml>
                            <![endif]-->
                              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                              <meta name="viewport" content="width=device-width, initial-scale=1.0">
                              <meta name="x-apple-disable-message-reformatting">
                              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
                              <title></title>
                              
                                <style type="text/css">
                                  @media only screen and (min-width: 520px) {
                              .u-row {
                                width: 500px !important;
                              }
                              .u-row .u-col {
                                vertical-align: top;
                              }
                            
                              .u-row .u-col-100 {
                                width: 500px !important;
                              }
                            
                            }
                            
                            @media (max-width: 520px) {
                              .u-row-container {
                                max-width: 100% !important;
                                padding-left: 0px !important;
                                padding-right: 0px !important;
                              }
                              .u-row .u-col {
                                min-width: 320px !important;
                                max-width: 100% !important;
                                display: block !important;
                              }
                              .u-row {
                                width: calc(100% - 40px) !important;
                              }
                              .u-col {
                                width: 100% !important;
                              }
                              .u-col > div {
                                margin: 0 auto;
                              }
                            }
                            body {
                              margin: 0;
                              padding: 0;
                            }
                            
                            table,
                            tr,
                            td {
                              vertical-align: top;
                              border-collapse: collapse;
                            }
                            
                            p {
                              margin: 0;
                            }
                            
                            .ie-container table,
                            .mso-container table {
                              table-layout: fixed;
                            }
                            
                            * {
                              line-height: inherit;
                            }
                            
                            a[x-apple-data-detectors="true"] {
                              color: inherit !important;
                              text-decoration: none !important;
                            }
                            
                            table, td { color: #000000; } </style>
                              
                              
                            
                            <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
                            
                            </head>
                            
                            <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
                              <!--[if IE]><div class="ie-container"><![endif]-->
                              <!--[if mso]><div class="mso-container"><![endif]-->
                              <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
                              <tbody>
                              <tr style="vertical-align: top">
                                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->
                                
                            
                            <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                              <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
                                  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: #ffffff;"><![endif]-->
                                  
                            <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                              <div style="width: 100% !important;">
                              <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
                              
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                  <a href="https://freeimage.host/"><img src="https://iili.io/h5CDX9.jpg" alt="h5CDX9.jpg" border="0" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 300px;" width="300" /></a>
                                  <img align="center" border="0" src="https://freeimage.host/i/h5CDX9" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 480px;" width="480"/>
                                  
                                </td>
                              </tr>
                            </table>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:13px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                              <div style="line-height: 150%; text-align: left; word-wrap: break-word;">
                                <p style="font-size: 14px; line-height: 150%; text-align: center;"><span style="font-family: \'Cabin\', sans-serif; font-size: 20px; line-height: 30px;"><span style="line-height: 30px; font-size: 20px;">New reservation request for you!</span></span></p>
                              </div>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                              <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-family: \'Cabin\', sans-serif; font-size: 14px; line-height: 19.6px;"></span></p>
                              </div>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                              <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
                              </div>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:8px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                  <a href="https://freeimage.host/"><img src="https://iili.io/h5YidP.jpg" alt="h5YidP.jpg" border="0" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 15%;max-width: 60px;" width="60px" /></a>
                                  
                                </td>
                              </tr>
                            </table>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                                  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                              </div>
                            </div>
                            
                            
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                </td>
                              </tr>
                              </tbody>
                              </table>
                              <!--[if mso]></div><![endif]-->
                              <!--[if IE]></div><![endif]-->
                            </body>
                            
                            </html>';

            $mail->send();
        }
        catch (Exception $e){
            echo "Message could not be sent. Mail error: ". $mail->ErrorInfo;
        }
        /*
        $headers = "From: Paw Walks <sarababic01@yahoo.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $txt = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                            <head>
                            <!--[if gte mso 9]>
                            <xml>
                              <o:OfficeDocumentSettings>
                                <o:AllowPNG/>
                                <o:PixelsPerInch>96</o:PixelsPerInch>
                              </o:OfficeDocumentSettings>
                            </xml>
                            <![endif]-->
                              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                              <meta name="viewport" content="width=device-width, initial-scale=1.0">
                              <meta name="x-apple-disable-message-reformatting">
                              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
                              <title></title>
                              
                                <style type="text/css">
                                  @media only screen and (min-width: 520px) {
                              .u-row {
                                width: 500px !important;
                              }
                              .u-row .u-col {
                                vertical-align: top;
                              }
                            
                              .u-row .u-col-100 {
                                width: 500px !important;
                              }
                            
                            }
                            
                            @media (max-width: 520px) {
                              .u-row-container {
                                max-width: 100% !important;
                                padding-left: 0px !important;
                                padding-right: 0px !important;
                              }
                              .u-row .u-col {
                                min-width: 320px !important;
                                max-width: 100% !important;
                                display: block !important;
                              }
                              .u-row {
                                width: calc(100% - 40px) !important;
                              }
                              .u-col {
                                width: 100% !important;
                              }
                              .u-col > div {
                                margin: 0 auto;
                              }
                            }
                            body {
                              margin: 0;
                              padding: 0;
                            }
                            
                            table,
                            tr,
                            td {
                              vertical-align: top;
                              border-collapse: collapse;
                            }
                            
                            p {
                              margin: 0;
                            }
                            
                            .ie-container table,
                            .mso-container table {
                              table-layout: fixed;
                            }
                            
                            * {
                              line-height: inherit;
                            }
                            
                            a[x-apple-data-detectors="true"] {
                              color: inherit !important;
                              text-decoration: none !important;
                            }
                            
                            table, td { color: #000000; } </style>
                              
                              
                            
                            <!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->
                            
                            </head>
                            
                            <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
                              <!--[if IE]><div class="ie-container"><![endif]-->
                              <!--[if mso]><div class="mso-container"><![endif]-->
                              <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%" cellpadding="0" cellspacing="0">
                              <tbody>
                              <tr style="vertical-align: top">
                                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->
                                
                            
                            <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                              <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                                <div style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
                                  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: #ffffff;"><![endif]-->
                                  
                            <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                              <div style="width: 100% !important;">
                              <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
                              
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                  <a href="https://freeimage.host/"><img src="https://iili.io/h5CDX9.jpg" alt="h5CDX9.jpg" border="0" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 300px;" width="300" /></a>
                                  <img align="center" border="0" src="https://freeimage.host/i/h5CDX9" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 480px;" width="480"/>
                                  
                                </td>
                              </tr>
                            </table>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:13px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                              <div style="line-height: 150%; text-align: left; word-wrap: break-word;">
                                <p style="font-size: 14px; line-height: 150%; text-align: center;"><span style="font-family: \'Cabin\', sans-serif; font-size: 20px; line-height: 30px;"><span style="line-height: 30px; font-size: 20px;">New reservation request for you!</span></span></p>
                              </div>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                              <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-family: \'Cabin\', sans-serif; font-size: 14px; line-height: 19.6px;"></span></p>
                              </div>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                              <div style="line-height: 140%; text-align: left; word-wrap: break-word;">
                              </div>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                            <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                              <tbody>
                                <tr>
                                  <td style="overflow-wrap:break-word;word-break:break-word;padding:8px;font-family:arial,helvetica,sans-serif;" align="left">
                                    
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                  <a href="https://freeimage.host/"><img src="https://iili.io/h5YidP.jpg" alt="h5YidP.jpg" border="0" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 15%;max-width: 60px;" width="60px" /></a>
                                  
                                </td>
                              </tr>
                            </table>
                            
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
                              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                                  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                </div>
                              </div>
                            </div>
                            
                            
                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                </td>
                              </tr>
                              </tbody>
                              </table>
                              <!--[if mso]></div><![endif]-->
                              <!--[if IE]></div><![endif]-->
                            </body>
                            
                            </html>
                            ';
        */
        //$txt = "You have new request for walk. Please go to your profile to confirm or decline.";
        //$subject = "New reservation request for you! - Paw Walks";
        //mail($walker['email'], $subject,$txt, $headers);
    }

}
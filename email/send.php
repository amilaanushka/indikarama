<?php

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header("HTTP/1.0 404 Not Found");
    exit();
}

require_once ('../app-config.php');
require_once ('../classes/Database/MysqliDb.class.php');
require_once ('../classes/PHPMailer/PHPMailerAutoload.php');

$db = new MysqliDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mail = new PHPMailer;

function setHTMLTemplate($templateFile) {
    $template = file_get_contents($templateFile);

    preg_match_all('/{(.*)}/', $template, $matches, PREG_SET_ORDER);

    $search = array();
    $replace = array();
    foreach ($matches as $var) {
        $search[] = $var[0];
        $replace[] = $_POST[$var[1]];
    }

    $html = str_replace($search, $replace, $template);
    return $html;
}

$json = array('success' => false);
print_r(!empty($Corporate));

if (isset($_POST) && count($_POST) > 0) {
    extract($_POST);

    $run = false;

    $data = Array(
        'name' => $txtName,
        'email' => $txtEmail,
        'contact' => $txtPhone,
        'message' => $txtMessage,
    );

    if ($id = $db->insert('inquiries', $data)) {
        $run = true;
    }

    if ($run) {
        if ($config['mail']['provider'] == 'smtp') {
            $mail->isSMTP();

            $mail->SMTPDebug = $config['mail']['smtp']['debug'];
            $mail->Debugoutput = 'html';

            $mail->Host = $config['mail']['smtp']['host'];
            $mail->Port = $config['mail']['smtp']['port'];
            $mail->SMTPSecure = $config['mail']['smtp']['secure'];

            $mail->SMTPAuth = $config['mail']['smtp']['auth'];
            $mail->Username = $config['mail']['smtp']['username'];
            $mail->Password = $config['mail']['smtp']['password'];
        } elseif ($config['mail']['provider'] == 'sendmail') {
            $mail->isSendmail();
        }

        // $mail->setFrom($config['mail']['from'][0], $config['mail']['from'][1]);
        // $mail->addReplyTo($txtemail, $txtname);

        if (isset($config['mail']['to']) && count($config['mail']['to']) > 0) {
            foreach ($config['mail']['to'] as $email => $name) {
                $mail->addAddress($email, $name);
            }
        }
        if (isset($config['mail']['cc']) && count($config['mail']['cc']) > 0) {
            foreach ($config['mail']['cc'] as $email => $name) {
                $mail->addCC($email, $name);
            }
        }

        // $mail->Subject = 'ACCA Landing Page - ' . $txtFirstName . ' ' . $txtLastName;
        $mail->Subject = 'Indika Rama Inquiry - ';
        $mail->msgHTML(setHTMLTemplate('send.html'), dirname(__FILE__));

        if ($mail->send()) {
            $json = array('success' => true);
            echo json_encode($json);
            return;
        } else {
            $json = array('success' => false, 'error' => $mail->ErrorInfo);
            echo json_encode($json);
            return;
        }
    } else {
        $json = array('success' => false, 'error' => $db->getLastError());
        echo json_encode($json);
        return;
    }
}

echo json_encode($json);

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    $mail->SMTPDebug = 1;
    // 使用smtp鉴权方式发送邮件
    $mail->isSMTP();
    //  smtp需要鉴权 这个必须是trues
    $mail->SMTPAuth = true;
    // 服务器地址
    $mail->Host = '';
    // 设置ssl连接smtp服务器的远程服务器端口号
    $mail->Port = 587;
    // 设置发送的邮件的编码
    $mail->CharSet = 'UTF-8';
   // smtp登录的账号 QQ邮箱即可
    $mail->Username = '';                 // SMTP username
    // smtp登录的密码 使用生成的授权码
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted


    //Recipients
    $mail->setFrom('', 'zhangjun');
    //发送对象
    $mail->addAddress('', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');              // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments 附件
    $mail->addAttachment('/var/tmp/file.tar.gz');
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '邮件主题';
    $mail->Body    = '<b>hello world</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '邮件已成功发生';
} catch (Exception $e) {
    echo '邮件发送失败. 失败原因: ', $mail->ErrorInfo;
}
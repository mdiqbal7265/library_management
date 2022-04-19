<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(__FILE__).'/../../vendor/autoload.php';
// require 'MysqliDb.php';



class Helper
{

    public $title;

    public $mail;
    protected $conn;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->conn = new MysqliDb('localhost','root','','lms');
    }

    /**
     * @Random String and Number Generator Function
     */
    public function generateRandomString($length = 25)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Random Unique Number Generator
     */
    public function random_num($len)
    {
        $ch = "0123456789";
        $l = strlen($ch) - 1;
        $str = "";
        for ($i = 0; $i < $len; $i++) {
            $x = rand(0, $l);
            $str .= $ch[$x];
        }
        return $str;
    }

    public function send_mail($email, $subject, $body)
    {
        try {

            $this->mail->isSMTP();

            $this->mail->Host = 'smtp.mailtrap.io';

            $this->mail->SMTPAuth = true;

            $this->mail->Username   = 'ef4113ce44efb0';                     // SMTP username
            $this->mail->Password   = 'a0aff7124fdd5f';

            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $this->mail->Port = 2525;

            $this->mail->setFrom('lms@demo.com', 'LMS');

            $this->mail->addAddress($email);

            $this->mail->isHTML(true);

            $this->mail->Subject = $subject;

            $this->mail->Body = $body;

            $this->mail->send();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function user_exists($email)
    {
        $this->conn->where('user_email_address', $email);
        $result = $this->conn->getOne('lms_user');
        return $result;
    }

    public function is_valid_email_verification_code($code)
    {
        $this->conn->where('user_verificaton_code', $code);
        $result = $this->conn->getOne('lms_user');
        if($result)
        {
            return true;
        }else{
            return false;
        }
    }

    public function update_verification_status($code){
        $data = [
            'user_verification_status' => 'Yes'
        ];
        $this->conn->where('user_verificaton_code', $code);
        if($this->conn->update('lms_user', $data)){
            return true;
        }else{
            return false;
        }
    }

    public function menu_active($file_name){
        if(basename($_SERVER['PHP_SELF']) == $file_name){
            echo "active";
        }else{
            echo "";
        }
    }

    public function getTitle(){
        $title = ucfirst(basename($_SERVER['PHP_SELF'], '.php'));
        $title = str_replace('_', '', $title);
        echo $title;
    }

    
}

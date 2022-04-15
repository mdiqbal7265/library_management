<?php

// $verification_code = 'LM'.rand(0, 1000000);
// echo $verification_code;

$password = password_hash(12345, PASSWORD_BCRYPT);
// echo $password;

if(password_verify(12345, $password)){
    echo "matched";
}else{
    echo "dont matched";
}

?>
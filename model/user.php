<?php
//them tai khoan
function insert_taikhoan($user_name, $email, $password, $phone, $address)
{
    $sql = "INSERT INTO `users`( `users_name`, `email`, `password`, `phone`, `address`) VALUES ('$user_name','$email','$password','$phone','$address')";
    pdo_execute($sql);
}
//check du lieu de dang nhap user
function checkuser($email, $password)
{
    $sql = "SELECT * FROM users where email = '$email' AND password = '$password'";
    $p = pdo_query_one($sql);
    return $p;
}
//list danh sach nguoi dung o admin
function listdskh()
{
    $sql = "SELECT * FROM users order by users_id";
    $listdskh = pdo_query($sql);
    return $listdskh;
}

//quen mk
function check_email($email)
{
    $sql = "select * from users where email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
//update tai khoan
function updatetaikhoan($users_id, $user_name, $tel, $email, $address){
    $sql="UPDATE `users` SET `users_name`='$user_name',`phone`='$tel',`email`='$email',`address`='$address' WHERE users_id='$users_id'";
    pdo_execute($sql);
}
//update tai khoan
function updatemk($users_id, $password){
    $sql="UPDATE `users` SET `password`='$password' WHERE users_id='$users_id'";
    pdo_execute($sql);
}
function load_user($user_id){
    $sql = "SELECT * FROM users WHERE users_id='$user_id'";
    $result= pdo_query_one($sql);
    return $result;
}
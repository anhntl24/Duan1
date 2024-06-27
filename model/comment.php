<?php
//comment
function insert_binhluan($content, $time, $stars, $product_id, $users_id)
{
    $sql = "INSERT INTO comments(`content`,`time`,`star`,`product_id`,`users_id`) VALUES
         ('$content','$time',' $stars,','$product_id','$users_id')";
    pdo_execute($sql);
}
//load binh luan
function loadall_binhluan($product_id)
{
    $sql = "SELECT * FROM `comments` 
    LEFT JOIN users ON comments.users_id = users.users_id
    WHERE product_id = '$product_id'
    ";
    $bl = pdo_query($sql);
    return $bl;
}
//dem cmt
function countcm($id){
    $sql = "SELECT COUNT(comments_id) as countcm FROM comments where product_id = '$id'";
    return $sql = pdo_query($sql);
}
//tinh tb sao
function star($id){
    $sql = "SELECT AVG(star) as avgstar FROM comments where product_id = '$id'";
    return $sql = pdo_query($sql);
}
//comment
function comments(){
    $sql = "SELECT 
    comments.comments_id  as comments_id,
    comments.content as content_cm,
    comments.time as time_cm,
    comments.star as star_cm,
    users.users_name as users_name,
    products.name as product_name,
    products.product_id as product_id
    FROM comments
    LEFT JOIN users ON users.users_id = comments.users_id
    LEFT JOIN products ON products.product_id = comments.product_id
    ORDER BY comments_id DESC";
    return pdo_query($sql);
}
//xoa comments
function deletecomments($comments_id){
    $sql = "DELETE 
    FROM `comments` WHERE comments_id = '$comments_id'";
    return pdo_query($sql);
}
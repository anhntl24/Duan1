<?php
//them san pham admin
function insert_sanpham($tensp, $giasp, $filename, $mota, $iddm)
{
    $sql = "INSERT INTO products(name,price,img,description,category_id) 
    VALUES ('$tensp','$giasp','$filename','$mota','$iddm')";
    pdo_execute($sql);
}
//load san pham admin
function listAll()
{
    $sql = "SELECT * FROM products";
    $listAll = pdo_query($sql);
    return $listAll;
}
//xoa san pham admin
function delete_sanpham($id)
{
    $id = $_GET['product_id'];
    $sql = "DELETE FROM products WHERE product_id = '$id';";
    pdo_execute($sql);
}
//chi tiet san pham
function loadeone_sanpham($id)
{
    $sql = "SELECT * FROM products WHERE product_id = '$id';";
    $sp = pdo_query_one($sql);
    return $sp;
}
// update san pham admin
function update_sanpham($idsp, $tensp, $giasp, $filename, $mota, $iddm)
{
    $sql = "UPDATE products SET name='$tensp', price='$giasp',img='$filename',description='$mota',category_id='$iddm' WHERE product_id = '$idsp';";
    pdo_execute($sql);
}
//loade san pham home
function loadsphome($category_id)
{
    $sql = "SELECT * FROM products WHERE category_id = '$category_id';";
    $sp = pdo_query($sql);
    return $sp;
}
//tim kiem san pham theo ten
function loade_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM products
    where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and category_id = '" . $iddm . "'";
    }
    $sql .= " order by product_id";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// load san pham theo danh muc
function loade_tendm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT * FROM categorys WHERE categorys_id = '$iddm';";
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
//sp cung loai
function sanpham_cungloai($id)
{
    $sp = getone_sanpham($id);
    $iddm = $sp['category_id'];
    $sql = "SELECT * FROM products where category_id=$iddm and product_id <> $id limit 0,10";
    $result = pdo_query($sql);
    return $result;
}
function getone_sanpham($id)
{
    $sql = "SELECT * FROM products WHERE product_id = '$id';";
    $sp = pdo_query_one($sql);
    return $sp;
}
//size
function size_product($product_id)
{
    $sql = "SELECT * FROM variants where product_id = '$product_id'";
    return pdo_query($sql);
}
// con bao nieu san pham
function soluongsp($id)
{
    $sql = "SELECT SUM(quantity) as soluongtonkho FROM variants where product_id = '$id'";
    return pdo_query($sql);
}
//cart
function addtocart($quantity, $users_id, $variant_id)
{
    $sql = "INSERT INTO `cart`(`cart_quantity`, `users_id`, `Variant_id`) 
    VALUES ('$quantity','$users_id','$variant_id')";
    return $sql = pdo_execute($sql);
}

function load_variant($product_id, $size)
{
    $sql = "SELECT * FROM variants 
    WHERE product_id = '$product_id' 
    AND (size_quan = '$size' OR size_ao = '$size' OR size_phukien = '$size')";
    $result = pdo_query_one($sql);
    return $result;
}

//loade cart theo id user
function cart_load_all($user_id)
{
    $sql = "SELECT * FROM cart 
    LEFT JOIN  variants ON variants.Variant_id = cart.Variant_id
    LEFT JOIN products ON products.product_id = variants.product_id
    WHERE cart.users_id = '$user_id' AND order_name = 0";
    return pdo_query($sql);
}
//loade cart theo id user khi thanh toan xong
function cartdetail($user_id, $order_name)
{
    $sql = "SELECT *, 
    users.phone as phone,
    users.address as address_us
    FROM cart 
    LEFT JOIN  variants ON variants.Variant_id = cart.Variant_id
    LEFT JOIN products ON products.product_id = variants.product_id
    LEFT JOIN  users ON users.users_id = cart.users_id
    WHERE cart.users_id = '$user_id' AND cart.order_name = '$order_name'";
    return pdo_query($sql);
}

// chi tiet cart
function order_name($name, $id_user)
{
    $sql = "UPDATE cart SET order_name = '$name' 
    WHERE users_id = '$id_user' AND order_name = 0";
    pdo_execute($sql);
}
//luot xem
function view($id)
{
    $sql = "UPDATE `products` SET `view` = `view`+ 1 WHERE product_id = '$id'";
    return pdo_execute($sql);
}

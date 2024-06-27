<?php
//insert tu checkout vo order
function insert_order($name, $ngaydathang, $total, $payment, $id_user)
{
    $sql = "INSERT INTO orders(`order_name`, `time`,`total`,`payment`,`user_id`) 
        VALUE ('$name','$ngaydathang','$total','$payment', '$id_user')";
    pdo_execute($sql);
}
//xoa sa pham o gio hang
function delete_sanphamcart($cart_id, $users_id)
{
    $sql = "DELETE FROM cart 
    WHERE cart_id  = '$cart_id' AND users_id = '$users_id'";
    pdo_execute($sql);
}
//loade ten oder khi thanh toAN
function loado_orders($name)
{
    $sql = "SELECT * FROM orders WHERE order_name = '$name'";
    return pdo_query_one($sql);
}

//xoa sp khi thanh toan
function delete_cartoder($id_user)
{
    $sql = "DELETE FROM cart WHERE users_id = '$id_user'";
    return pdo_execute($sql);
}
//mycart
function mycart($user_id)
{
    $sql = "SELECT * FROM orders where user_id = '$user_id'";
    return pdo_query($sql);
}
//loade oder admin
function loadorder()
{
    $sql = "SELECT * FROM orders 
    where `status` = 0 or `status` = 1 order by order_id desc";
    return pdo_query($sql);
}
//don hang da huy
function loadorderdahuy()
{
    $sql = "SELECT * FROM orders where `status` = 3 order by order_id desc";
    return pdo_query($sql);
}
function loadorderhoanthanh()
{
    $sql = "SELECT * FROM orders where `status` = 2 order by order_id desc";
    return pdo_query($sql);
}
// chấp nhận đơn hàng
function acceptorder($order_name)
{
    $sql = "UPDATE orders SET `status` = `status` + 1
    WHERE order_name = '$order_name'";
    pdo_execute($sql);
}
// hủy đơn hàng

function cancelorder($order_id)
{
    $sql = "UPDATE orders SET `status` = 3 
    WHERE order_id = '$order_id'";
    pdo_execute($sql);
}
//loade odername
function load_order($order_name)
{

    $sql = "SELECT * FROM orders
    LEFT JOIN cart ON cart.order_name = orders.order_name
    WHERE cart.order_name = '$order_name'";
    return pdo_query($sql);
}
// trừ lượt bán khi admin chấp nhận đơn hàng

function minus_quantity_variants($vatiant_id, $quantity)
{
    $sql = "UPDATE variants SET quantity = quantity - $quantity
    WHERE Variant_id = '$vatiant_id'";
    pdo_execute($sql);
}

// trả lại lượt bán khi hủy
function plus_quantity_variants($vatiant_id, $quantity)
{
    $sql = "UPDATE variants SET quantity = quantity + $quantity
    WHERE Variant_id = '$vatiant_id'";
    pdo_execute($sql);
}
//isert ordetail
function order_detail($order_detail_id, $name, $compemailany, $tel){
    $sql = "INSERT INTO `order_detail`(`order_detail_id`, `order_name`, `address`, `phone`) VALUES ('$order_detail_id','$name','$compemailany','$tel')";
    return pdo_query($sql);
}

<?php
//doanh thu
function doanhthu()
{
    $sql = "SELECT SUM(total) as doanhthu FROM orders WHERE `status` = 2";
    return $sql = pdo_query($sql);
}//thong ke san pham
function products()
{
    $sql = "SELECT SUM(quantity) as count_product FROM variants";
    return pdo_query($sql);
}
//thongke danh muc
function categorys()
{
    $sql = "SELECT COUNT(categorys_id) as count_categorys FROM categorys";
    return $sql = pdo_query($sql);
}
//thong ke sp theo doanh muc
function load_thongke()
{
    $sql = "SELECT categorys.name as tendm, 
    count(products.product_id) as countsp
    FROM products left join categorys on categorys.categorys_id=products.category_id group by categorys.categorys_id order by categorys.categorys_id";
    return pdo_query($sql);
}
//thong ke san pham theo luot xem
function sanphamnhieuluotxem()
{
    $sql = "SELECT * FROM products ORDER BY view DESC limit 0,5";
    return pdo_query($sql);
}
//so don hang
function sodonhang()
{
    $sql = "SELECT COUNT(order_id) as sodonhang FROM orders";
    return $sql = pdo_query($sql);
}
//sanphamphobien
function sanphamphobien()
{
    $sql = "SELECT COUNT(cart.cart_quantity) AS cart_count, 
               products.name AS product_name, 
               products.price AS product_price, 
               products.img AS product_img, 
               categorys.name AS category_name, 
               variants.*, cart.*
        FROM cart 
        LEFT JOIN variants ON variants.Variant_id = cart.Variant_id
        LEFT JOIN products ON products.product_id = variants.product_id
        LEFT JOIN categorys ON categorys.categorys_id = products.category_id
        GROUP BY products.product_id ORDER BY cart_count DESC limit 0,5";
    return pdo_query($sql);
}
// hiển thị doanh thu theo tháng
function thongkedoanhthu()
{
    $sql = "SELECT 
    month_list.month,
    COALESCE(SUM(orders.total), 0) AS total
FROM 
    (
        SELECT '01' AS month
        UNION SELECT '02'
        UNION SELECT '03'
        UNION SELECT '04'
        UNION SELECT '05'
        UNION SELECT '06'
        UNION SELECT '07'
        UNION SELECT '08'
        UNION SELECT '09'
        UNION SELECT '10'
        UNION SELECT '11'
        UNION SELECT '12'
    ) AS month_list
LEFT JOIN 
    orders ON MONTH(STR_TO_DATE(orders.time, '%h:%i:%s %d/%m/%Y')) = month_list.month
          AND YEAR(STR_TO_DATE(orders.time, '%h:%i:%s %d/%m/%Y')) = YEAR(CURRENT_DATE())
          AND `status` = 2
GROUP BY 
    month_list.month
ORDER BY 
    month_list.month
";
    return pdo_query($sql);
}
//ty le don hang
function tyledonhang()
{
    $sql = "SELECT 
    (COUNT(CASE WHEN `status` = 0 THEN 1 END) / COUNT(*)) * 100 AS choxacnhan,
    (COUNT(CASE WHEN `status` = 1 THEN 1 END) / COUNT(*)) * 100 AS dangvanchuyen,
    (COUNT(CASE WHEN `status` = 2 THEN 1 END) / COUNT(*)) * 100 AS thanhcong,
    (COUNT(CASE WHEN `status` = 3 THEN 1 END) / COUNT(*)) * 100 AS huy
    FROM orders 
    ";
    return pdo_query($sql);
}



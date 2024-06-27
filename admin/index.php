<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 18:12:16 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin GROUP9</title>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <link rel="stylesheet" href="../css/metisMenu.css">
    <link rel="stylesheet" href="../css/style1.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="crm_body_bg">
    <?php
    ob_start();
    include "header.php";
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/user.php";
    include "../model/order.php";
    include "../model/thongke.php";
    include "../model/comment.php";
    $listdanhmuc = loade_danhmuc();
    ?>
    <?php
    if ((isset($_GET['act'])) && ($_GET['act']) != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'addddm':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    if (empty($_POST['tenloai'])) {
                        $_SESSION['tenloai'] = "Không được bỏ trống";
                    } else {
                        $tenloai = $_POST['tenloai'];
                    }
                    if (!isset($_SESSION['tenloai'])) {
                        isert_danhmuc($tenloai);
                    }
                }
                include 'category/addCategory.php';
                break;
            case 'listdm':
                $listdanhmuc = loade_danhmuc();
                include 'category/category.php';
                break;
            case 'xoadm':
                if (isset($_GET['categorys_id']) && ($_GET['categorys_id'] > 0)) {
                    delete_danhmuc($_GET['categorys_id']);
                }
                $listdanhmuc = loade_danhmuc();
                include 'category/category.php';
                break;
            case 'suadm':
                if (isset($_GET['categorys_id']) && ($_GET['categorys_id'] > 0)) {
                    $dm = loadeone_danhmuc($_GET['categorys_id']);
                }
                include 'category/updateCatefory.php';
                break;
            case 'updatedm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($tenloai, $id);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loade_danhmuc();
                include 'category/category.php';
                break;
                //product
            case 'addproduct':
                if (isset($_POST['themmoi'])) {
                    if (empty($_POST['tensp'])) {
                        $_SESSION['tensp'] = "Không được bỏ trống";
                        $_SESSION['giasp'] = "Không được bỏ trống";
                        $_SESSION['mota'] = "Không được bỏ trống";
                        $_SESSION['iddm'] = "Không được bỏ trống";
                        $_SESSION['img'] = "Không được bỏ trống";
                    } else {
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $filename = $_FILES['img']['name'];
                        $duongdan = "../uploades/";
                        $chiden = $duongdan . basename($_FILES['img']['name']);
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $chiden)) {
                        } else {
                        }
                    }
                    if (!isset($_SESSION['tensp']) && !isset($_SESSION['giasp']) && !isset($_SESSION['mota']) && !isset($_SESSION['iddm']) && !isset($_SESSION['img'])) {
                        insert_sanpham($tensp, $giasp, $filename, $mota, $iddm);
                    }
                    $thongbao = "Thêm thành công";
                }
                $listdanhmuc = loade_danhmuc();
                include 'product/addProduct.php';
                break;
            case 'listproduct':
                $listAll = listAll();
                include 'product/Products.php';
                break;
            case 'xoasp':
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    delete_sanpham($_GET['product_id']);
                }
                $listAll = listAll("", 0);
                include 'product/Products.php';
                break;
            case 'suasp':
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    $sanpham = loadeone_sanpham($_GET['product_id']);
                }
                $listdanhmuc = loade_danhmuc();
                $listAll = listAll("", 0);
                include 'product/updateProduct.php';
                break;
            case 'updatesp':
                if (isset($_POST['update'])) {
                    $idsp = $_GET['product_id'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddm'];
                    $filename = $_FILES['img']['name'];
                    $duongdan = "../uploades/";
                    $chiden = $duongdan . basename($_FILES['img']['name']);
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $chiden)) {
                    } else {
                    }
                    update_sanpham($idsp, $tensp, $giasp, $filename, $mota, $iddm);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loade_danhmuc();
                $listAll = listAll("", 0);
                include 'product/Products.php';
                break;
            case 'dsbl':
                $listcomments = comments();
                include 'binhluan/comment.php';
                break;
            case 'deletecomments':
                if (isset($_GET['comments_id']) && ($_GET['comments_id'] > 0)) {
                    deletecomments($_GET['comments_id']);
                }
                $comments_id = $_GET['comments_id'];
                $listcomments = comments();
                include 'binhluan/comment.php';
                break;
            case 'dskh':
                $listdskh = listdskh();
                include 'taikhoan/account.php';
                break;
            case 'dsdh':
                $listorder = loadorder();
                if (isset($_POST['chapnhandonhang'])) {
                    $order_name = $_GET['order_name'];
                    acceptorder($order_name);
                    $order = load_order($order_name);
                    foreach ($order as $value) {
                        extract($value);
                        if ($status == 1) {
                            minus_quantity_variants($Variant_id, $cart_quantity);
                        }
                    }
                    header("Location: index.php?act=dsdh");
                }
                if (isset($_POST['huydonhang'])) {
                    $order_name = $_GET['order_name'];
                    $order = load_order($order_name);
                    foreach ($order as $value) {
                        extract($value);
                        if ($status == 1) {
                            plus_quantity_variants($Variant_id, $cart_quantity);
                        }
                    }
                    cancelorder($order_id);
                    header("Location: index.php?act=dsdh");
                }
                include 'orders/order.php';
                break;
            case 'cacdondahuy':
                $listorder = loadorderdahuy();
                include 'orders/recycle.php';
                break;
            case 'cacdondahoanthanh':
                $listorder = loadorderhoanthanh();
                include 'orders/recycle.php';
                break;
        }
    } else {
        $listtk = load_thongke();
        $doanhthu  = doanhthu();
        $product = products();
        $category = categorys();
        $sodonhang = sodonhang();
        $sppb = sanphamphobien();
        $spview = sanphamnhieuluotxem();
        $donhang = tyledonhang();
        $thongkedoanhthu = thongkedoanhthu();
        include "home.php";
    }
    ?>
    <?php
    include "footer.php";
    ?>
</body>

</html>
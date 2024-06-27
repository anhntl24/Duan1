<?php
ob_start();
error_reporting(E_ALL);
include "./model/pdo.php";
include "./model/user.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/order.php";
include "./model/comment.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Trang chủ</title>
    <link rel="stylesheet" type="text/css" href="./view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./view/assets/css/font-awesome.css">
    <link rel="stylesheet" href="./view/assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="./view/assets/css/owl-carousel.css">
    <link rel="stylesheet" href="./view/assets/css/lightbox.css">
    <link rel="stylesheet" href="./view/css/style.css">
    <link rel="stylesheet" href="./view/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <?php
    session_start();
    include "view/header.php";
    $listcategory = loade_danhmuc();
    ?>
    <?php
    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                if (isset($_GET['categorys_id']) && ($_GET['categorys_id'] > 0)) {
                    $iddm = $_GET['categorys_id'];
                } else {
                    $iddm = 0;
                }
                $dssp = loade_sanpham($kyw, $iddm);
                $tendm = loade_tendm($iddm);
                include "view/products.php";
                break;
            case 'chitietsanpham':
                $_SESSION['product_id'] = $_GET['product_id'];
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    $id = $_GET['product_id'];
                    $sizeproduct = size_product($id);
                    $ctsanpham = loadeone_sanpham($id);
                    $view = view($id);
                    $sltonkho = soluongsp($id);
                    $spcungloai = sanpham_cungloai($id);
                    $countcm = countcm($id);
                    $avgstar = star($id);
                    include "view/productdetails.php";
                } else {
                    include "view/productdetails.php";
                }
                break;
            case 'cart':
                if (isset($_SESSION['user'])) {
                    $user_id = $_SESSION['user']['users_id'];
                } else {
                    header("Location: index.php?act=login");
                }
                if (isset($_POST['addtocart'])) {
                    $product_id = $_POST['product_id'];
                    $size = $_POST['size'];
                    $variant = load_variant($product_id, $size);
                    $soluong = $_POST['quantity'];
                    $variant_id = $variant['Variant_id'];
                    addtocart($soluong, $user_id, $variant_id);
                }
                $listcart = cart_load_all($user_id);
                include "view/cart.php";
                break;
            case 'order':
                $user_id = $_SESSION['user']['users_id'];
                if (isset($_POST['addorder'])) {
                    $product_id = $_POST['product_id'];
                    $size = $_POST['size'];
                    $variant = load_variant($product_id, $size);
                    $soluong = $_POST['quantity'];
                    $variant_id = $variant['Variant_id'];
                    addtocart($soluong, $user_id, $variant_id);
                }
                $user = cart_load_all($user_id);
                include "view/checkout.php";
                break;
            case 'checkout':
                $user_id = $_SESSION['user']['users_id'];
                $user = cart_load_all($user_id);
                include 'view/checkout.php';
                break;
            case 'checkoutconfirm':
                $user_id = $_SESSION['user']['users_id'];
                if (isset($_POST['dathang'])) {
                    $total = $_POST['tongtien'];
                    $name = $_POST['name'];
                    $payment = 1;
                    date_default_timezone_set('Asia/Ho_Chi_Minh'); // set ve gio vietnam
                    $ngaydathang = date('h:i:s d/m/Y');
                    $id_user = $user_id;
                    insert_order($name, $ngaydathang, $total, $payment, $id_user);
                    order_name($name, $id_user);
                    $order = loado_orders($name);
                    header("Location: index.php?dathangtc");
                }
                if (isset($_POST['momo'])) {
                    $total = $_POST['tongtien'];
                    $name = $_POST['name'];
                    $payment = 2;
                    date_default_timezone_set('Asia/Ho_Chi_Minh'); // set ve gio vietnam
                    $ngaydathang = date('h:i:s d/m/Y');
                    $id_user = $user_id;
                    insert_order($name, $ngaydathang, $total, $payment, $id_user);
                    order_name($name, $id_user);
                    $order = loado_orders($name);
                    include 'view/thanhtoanATM.php';
                }
                break;
            case 'review':
                $users_id = $_SESSION['user']['users_id'];
                if (isset($_POST['comment']) && ($_POST['comment'])) {
                    $content = $_POST['content'];
                    $product_id = $_POST['product_id'];
                    $stars = $_POST['stars'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh'); // set ve gio vietnam
                    $time = date('h:i:s a d/m/Y');
                    insert_binhluan($content, $time, $stars, $product_id, $users_id);
                    header("Location: " . $_SERVER['HTTP_REFERER']); //dung im tai cho
                }
                include "view/productdetails.php";
                break;
            case 'delcart':
                $user_id = $_SESSION['user']['users_id'];
                if (isset($_GET['cart_id']) && $_GET['cart_id'] > 0) {
                    $cart_id = $_GET['cart_id'];
                    delete_sanphamcart($cart_id, $users_id);
                }
                header('Location: index.php?act=cart');
                break;
            case 'mycart':
                $user_id = $_SESSION['user']['users_id'];
                $mycart = mycart($user_id);
                if (isset($_POST['huydonhang'])) {
                    $order_id = $_GET['order_id'];
                    cancelorder($order_id);
                    header("Location: index.php?act=mycart");
                }
                include 'view/mycart.php';
                break;
            case 'cartdetail':
                $user_id = $_SESSION['user']['users_id'];
                $order_name = $_GET['order_name'];
                $cartdetail = cartdetail($user_id, $order_name);
                include 'view/cartdetail.php';
                break;
            case 'register':
                if (isset($_POST['register'])) {
                    $user_name = $_POST['user'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];
                    $comfirm = $_POST['repassword'];
                    $index = 0;
                    $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                    if (isset($user_name) && $user_name == "") {
                        $index++;
                        $error1 = '* Vui lòng nhập tên tài khoản';
                    }
                    if (isset($password) && $password == "") {
                        $index++;
                        $error2 = '* Vui lòng nhập mật khẩu';
                    } else if (strlen($password) <= 6) {
                        $error2 = '* Vui lòng nhập mật khẩu dài hơn 6 ký tự';
                    }

                    if (!preg_match($pattern_email, $email)) { // check không đúng định dạng
                        $index++;
                        $error3 = "* Email không hợp lệ";
                    }
                    if (isset($comfirm) && $comfirm == "") {
                        $index++;
                        $error4 = '* Vui lòng nhập xác nhận mật khẩu';
                    }
                    if ($comfirm != $password) {
                        $index++;
                        $error4 = 'Xác nhận mật khẩu sai';
                    }
                    if (isset($phone) && $phone == "") {
                        $index++;
                        $error5 = '* Vui lòng nhập số điện thoại';
                    }
                    if (isset($address) && $address == "") {
                        $index++;
                        $error6 = '* Vui lòng nhập địa chỉ';
                    }
                    if ($index == 0) {
                        insert_taikhoan($user_name, $email, $password, $phone, $address);
                        header("Location: index.php?act=login&dangkytc");
                    }
                }
                include "view/register.php";
                break;
            case 'login':
                $loadtk = listdskh();
                if (isset($_POST['login']) && $_POST['login']) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $check = true;
                    if (empty($_POST['email'])) {
                        $check = false;
                        $error1 = "* Vui lòng nhập Email";
                    }
                    if (empty($_POST['password'])) {
                        $check = false;
                        $error2 = "* Vui lòng nhập mật khẩu";
                    }
                    if ($check == true) {
                        $checkuser = checkuser($email, $password);
                        if (is_array($checkuser)) {
                            $_SESSION['user'] = $checkuser;
                            header('Location: index.php?dangnhaptc');
                        } else {
                            $error1 = "* Email hoặc mật khẩu không chính xác";
                            $error2 = "* Email hoặc mật khẩu không chính xác";
                        }
                    }
                }
                include 'view/login.php';
                break;
            case 'Forgotpassword':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $email = $_POST['email'];
                    $checkemail = check_email($email);
                    if (is_array($checkemail)) {
                        $thongbao = "<span style='color: red;'>Mật Khẩu của bạn là: </span>" . $checkemail['password'];
                    } else {
                        $thongbao = "email không tồn tại";
                    }
                }
                include "view/Forgotpassword.php";
                break;
            case 'changepasswordtc':
                $user_id = $_SESSION['user']['users_id'];
                $pass = $_SESSION['user']['password'];
                if (isset($_POST['doimk'])) {
                    $password1 = $_POST['password1'];
                    $password2 = $_POST['password2'];
                    $password3 = $_POST['password3'];
                    $index = 0;
                    if (isset($password1) && $password1 == "") {
                        $index++;
                        $error1 = '* Vui lòng nhập mật khẩu cũ';
                    } elseif ($pass != $password1) {
                        $index++;
                        $error1 = '* Mật khẩu cũ không chính xác';
                    }
                    if (isset($password2) && $password2 == "") {
                        $index++;
                        $error2 = '* Vui lòng nhập mật khẩu';
                    } else if (strlen($password2) <= 6) {
                        $error2 = '* Vui lòng nhập mật khẩu dài hơn 6 ký tự';
                    }
                    if (isset($password3) && $password3 == "") {
                        $index++;
                        $error3 = '* Vui lòng nhập xác nhận mật khẩu mới';
                    }
                    if ($password2 != $password3) {
                        $index++;
                        $error3 = 'Xác nhận mật khẩu sai';
                    }
                    if ($index == 0) {
                        updatemk($users_id, $password2);
                        header("Location: index.php?changepasswordtc");
                    }
                }
                include 'view/changepasswordtc.php';
                break;
            case 'capnhattaikhoan':
                $user_id = $_SESSION['user']['users_id'];
                if (isset($_POST['capnhat'])) {
                    $user_name = $_POST['user'];
                    $tel = $_POST['tel'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $index = 0;
                    $pattern_phone = '/^(03[2-9]|07[0-9]|08[1-9]|09[0-9])[0-9]{7}$/';
                    $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                    if (isset($user_name) && $user_name == "") {
                        $index++;
                        $error1 = 'Không được bỏ trống trường này';
                    }
                    if (!preg_match($pattern_phone, $tel)) { // check không đúng định dạng
                        $index++;
                        $error2 = 'Số điện thoại không hợp lệ';
                    }
                    if (!preg_match($pattern_email, $email)) { // check không đúng định dạng
                        $index++;
                        $error3 = 'Email không hợp lệ';
                    }
                    if (isset($address) && $address == "") {
                        $index++;
                        $error4 = 'Không được bỏ trống trường này';
                    }
                    if ($index == 0) {
                        updatetaikhoan($users_id, $user_name, $tel, $email, $address);
                        header("Location: index.php?changeinfotc");
                    }
                }
                include "view/updateuser.php";
                break;
            case 'thoat':
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                    header("location: index.php?dangxuattc");
                }
                break;
            case 'reviews':
                include 'view/reviews.php';
                break;
            case 'ttmomoqr':
                include 'view/xulythanhtoanmomo.php';
                break;
            case 'Forgotpassword':
                include 'view/Forgotpassword.php';
                break;
            case 'product':
                include 'view/products.php';
                break;
            case 'productdeltai':
                include 'view/productdetails.php';
                break;
            case 'gioithieu':
                include 'view/about.php';
                break;
            case 'lienhe':
                include 'view/contact.php';
                break;
        }
    } else {
        $avgstar = star($id);
        include "view/home.php";
    }
    ?>
    <!-- ***** Footer ***** -->
    <?php
    include "view/footer.php";
    include "view/thongbao.php";
    ?>
</body>

</html>
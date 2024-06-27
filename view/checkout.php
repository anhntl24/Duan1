<!-- breadcrumb start-->
<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Checkout</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================Checkout Area =================-->
<form action="index.php?act=checkoutconfirm" method="post">
  <section class="checkout_area padding_top">
    <?php
    if (isset($_SESSION['user'])) {
      $name = $_SESSION['user']['users_name'];
      $phone = $_SESSION['user']['phone'];
      $email = $_SESSION['user']['email'];
      $address = $_SESSION['user']['address'];
    } else {
      $name = "";
      $phone = "";
      $email = "";
      $address = "";
    }
    ?>
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <!-- thông tin khách hàng  -->
          <div class="col-lg-4">
            <h3>Thông tin khách hàng</h3>
            <div class="col-md-12 form-group">
              <label for="">Họ và tên</label>
              <input type="text" class="form-control" id="company" name="name" placeholder="Company name" value="<?php echo $name ?>" />
            </div>
            <div class="col-md-12 form-group p_star">
              <label for="">Số điện thoại</label>
              <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $phone ?>" />
            </div>
            <div class="col-md-12 form-group p_star">
              <label for="">Địa chỉ nhận hàng</label>
              <input type="text" class="form-control" id="email" name="compemailany" value="<?php echo $address ?>" />
            </div>
            <a href="index.php?act=capnhattaikhoan"><button type="button" class="btn btn-dark" onclick=" return confirmdeupdate()">Thay đổi thông tin đặt hàng</button></a>
          </div>
          <!-- end thông tin khách hàng  -->
          <!-- thông tin đơn hàng  -->
          <div class="col-lg-8">
            <div class="order_box" style="background:#f0eeee">
              <h2>Thông tin đơn hàng của bạn</h2>
              <table class="table">
                <thead style="text-align:center;">
                  <tr>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Kích cỡ</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tiền</th>
                  </tr>
                </thead>
                <?php
                $time = date('hisdmY');
                $tongtien = 0;
                $thanhtien = 0;
                foreach ($user as $checkout) :
                  extract($checkout);
                  $tongtien = $price * $cart_quantity;
                  $thanhtien += $tongtien;
                ?>
                  <tbody style="text-align:center;">
                    <tr>
                      <td>
                        <img src="./uploades/<?= $img ?>" alt="Image" width="80" height="80">
                      </td>
                      <td>
                        <input type="hidden" value="<?= $product_id ?>" name="product_id">
                        <span class="font-weight-bold"><?php echo $name; ?></span>
                      </td>
                      <td>
                        <input type="hidden" value="<?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?>" name="size_order">
                        <?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?>
                      </td>
                      <td><?= $price ?></td>
                      <td>
                        <input type="hidden" value="<?= $cart_quantity ?>" name="quantity_order">
                        <?= $cart_quantity ?>
                      </td>
                      <td>
                        <input type="hidden" value="<?= $tongtien ?>" njame="total_order">
                        <?= number_format($tongtien, 0, ',', '.') ?> VNĐ
                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>
              <ul class="list list_2">
                <li>
                  <a href="#">Mã đơn hàng
                    <span><?php echo $time ?>-<?= $user_id ?></span>
                    <input type="hidden" name="name" value="<?= $time ?><?= $user_id ?>">
                  </a>
                </li>
                <li>
                  <a href="#">Tổng Tiền
                    <span><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</span>
                  </a>
                </li>
                <li>
                  <a href="#">Phí giao hàng
                    <span>0 VNĐ</span>
                  </a>
                </li>
                <li>
                  <a href="#">Thành tiền
                    <span><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</span>
                  </a>
                </li>
              </ul>
              <!-- thanh toán atm  -->
              <input type="hidden" value="<?php echo $thanhtien; ?>" name="tongtien">
              <input type="submit" class="btn btn-danger" id="f-option6" value="Thanh toán khi nhận hàng" onclick="return confirmOrder()" name="dathang" />
              <input type="submit" class="btn btn-danger" id="f-option6" value="Thanh toán online" name="momo" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
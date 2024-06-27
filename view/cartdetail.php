<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Chi tiết đơn hàng</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
  <div class="col-md-9">
    <div class="card mt-5">
      <div class="card-header" style="background-color: black">
        <p style="color: white; font-size: 20px;">Đơn hàng của bạn</p>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Size</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $index = 0;
          $tongtien = 0;
          foreach ($cartdetail as $cart) {
            extract($cart);
            $index++;
            $tongtien += ($price * $cart_quantity);
          ?>
            <tr>
              <th scope="row"><?= $index ?></th>
              <td>
                <span class="font-weight-bold"><?= $name ?></span>
              </td>
              <td><img src="./uploades/<?= $img ?>" alt="" width="100px"></td>
              <td><?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?></td>
              <td><?= number_format($price, 0, ',', '.') ?></td>
              <td>
                <p><?= $cart_quantity ?></p>
              </td>
              <td><?= number_format($price * $cart_quantity, 0, ',', '.'); ?> VNĐ</td>
            </tr>
          <?php } ?>
        </tbody>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">Tổng tiền</th>
          <th scope="col"><?= number_format($tongtien, 0, ',', '.') ?> <span> VNĐ</span></th>
        </tr>
        <tr>
          <th scope="col"></th>
          <th scope="col">SĐT nhận hàng: <?= $phone ?></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col">Địa chỉ nhận hàng: <?= $address_us ?></th>
          <th scope="col"></th>
        </tr>
      </table>
    </div>
  </div>
</div>
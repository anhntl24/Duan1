<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Giỏ hàng của tôi</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
  <div class="col-md-9">
    <div class="card mt-5">
      <div class="card-header" style="background-color: black">
        <p style="color: white; font-size: 20px;">Giỏ hàng Sản phẩm</p>
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
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $index = 0;
          $tongtien = 0;
          foreach ($listcart as $cart) {
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
              <td>
                <button class="btn btn-danger">
                  <a href="index.php?act=delcart&cart_id=<?php echo $cart_id ?>" onclick="return confirmdelete()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                    </svg>
                  </a>
                </button>
              </td>
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
          <th scope="col"><a href="index.php?act=checkout"><button class="btn btn-success w-30">Thanh toán</button></a></th>
        </tr>
      </table>
    </div>
  </div>
</div>
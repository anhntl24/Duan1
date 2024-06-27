<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Cập nhật tài khoản</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="vh-200" style="background-color: white;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-12">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-8 col-lg-5 d-none d-md-block">
              <img src="view/assets/images/ao-khoac-gio-nam-dep-cao-cap.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%;" />
            </div>
            <div class="col-md-4 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <form action="?act=capnhattaikhoan" method="post">
            <div class="col-md-12 form-group">
              <label for="">Họ và tên</label>
              <input type="text" class="form-control" name="user" placeholder="Company name" value="<?php echo $users_name ?>" />
              <?php if (isset($error1)) { ?>
                <span style="color:red;"><?= $error1 ?></span>
              <?php } ?>
            </div>
            <div class="col-md-12 form-group p_star">
              <label for="">Số điện thoại</label>
              <input type="text" class="form-control" name="tel" value="<?php echo $phone ?>" />
              <?php if (isset($error2)) { ?>
                <span style="color:red;"><?= $error2 ?></span>
              <?php } ?>
            </div>
            <div class="col-md-12 form-group p_star">
              <label for="">Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo $email ?>" />
              <span style="color:red;">
                <?php if (isset($error3)) { ?> <span style="color:red;"><?= $error3 ?>
                  </span>
                <?php } ?></span>
            </div>
            <div class="col-md-12 form-group p_star">
              <label for="">Địa chỉ</label>
              <input type="text" class="form-control" name="address" value="<?php echo $address ?>" />
              <?php if (isset($error4)) { ?>
                <span style="color:red;"><?= $error4 ?></span>
              <?php } ?>
            </div>
            <input type="submit" name="capnhat" value="Cập nhật tài khoản">
          </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
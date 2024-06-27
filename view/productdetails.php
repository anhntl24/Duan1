<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Trang sản phẩm duy nhất</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
        <?php
        extract($ctsanpham);
        ?>
        <div class="row mb-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="./uploades/<?= $img ?>" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?= $name ?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-warning mr-2">
                            <div class="product__details__rating">
                                <?php foreach ($avgstar as $avg) :
                                    extract($avg);
                                ?>
                                    <?php
                                    if ($avgstar >= 4.5) {
                                        echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>';
                                    } elseif ($avgstar < 4.5 && $avgstar >= 3.5) {
                                        echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>';
                                    } elseif ($avgstar < 3.5 && $avgstar >= 2.5) {
                                        echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>';
                                    } elseif ($avgstar < 2.5 && $avgstar >= 1.5) {
                                        echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>';
                                    } elseif ($avgstar < 1.5 && $avgstar >= 0.5) {
                                        echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>';
                                    } else {
                                        echo '<i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>';
                                    }
                                    ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php foreach ($countcm as $cm) :
                            extract($cm);
                        ?>
                            <span>(<?= $countcm ?> đánh giá)</span>
                        <?php endforeach; ?>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4 text-danger"><?= number_format($price, 0, ',', '.'); ?> <span>VNĐ</span></h3>
                    <p class="mb-4">Hàng chính hãng 100%, miễn phí vận chuyển, hoàn toàn yên tâm khi mua hàng ở <br> No1-Store với ưu đãi miễn phí trả hàng lên đến 7 ngày.</p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">SIZE:</strong>
                        <form class="ps-1" action="index?act=size" method="POST">
                            <?php
                            $index = 1;
                            foreach ($sizeproduct as $size) :
                                extract($size);
                            ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="radio<?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?>" name="size" value="<?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?>" <?php echo ($index === 1) ? 'checked' : ''; ?>>
                                    <label class="custom-control-label" for="radio<?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?>"><?= $size_quan ?><?= $size_ao ?><?= $size_phukien ?></label>
                                </div>
                            <?php
                                $index++;
                            endforeach;
                            ?>
                        </form>
                    </div>
                    <!-- <div style="display: flex; margin-bottom: 20px;">
                        <div style="margin-right: 10px;">
                            Màu sắc :
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-danger">Đỏ</button>
                                <button type="button" class="btn btn-warning">Vàng</button>
                                <button type="button" class="btn btn-success">Xanh</button>
                            </div>
                        </div>
                    </div> -->

                    <div class="d-flex align-items-center mb-4 pt-2">
                        <strong class="text-dark mr-3 me-2">Số lượng:</strong>
                        <div>
                            <button id="decreaseQuantity" style="width: 30px; border: 1px solid #8b8383;">-</button>
                            <span class="productQuantity" style="margin-left: 10px; margin-right: 10px;">1</span>
                            <button id="increaseQuantity" style="width: 30px; border: 1px solid #8b8383;">+</button>
                        </div>
                    </div>
                    <?php
                    foreach ($sltonkho as $sl) :
                        extract($sl);
                    ?>
                        <span>Còn <?= $soluongtonkho ?> sản phẩm</span>
                    <?php
                    endforeach;
                    ?>
                    <div class="button-cart d-flex justify-content-center">
                        <form class="button-cart d-flex justify-content-center" method="POST" action="index.php?act=cart">
                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                            <input type="hidden" name="product_name" value="<?= $name ?>">
                            <input type="hidden" name="image" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= number_format($price, 0, ',', '.'); ?>">
                            <input type="hidden" class="selectedSizeInput" name="size" value="">
                            <input type="hidden" class="selectedQuantity" name="quantity" value="1">
                            <button class="btn btn-outline-primary px-3  mx-2" type="submit" name="addtocart">
                                <i class="fa fa-shopping-cart mr-1 pe-1"></i>
                                Thêm giỏ hàng
                            </button>
                        </form>
                        <form class="button-cart d-flex justify-content-center" method="POST" action="index.php?act=order">
                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                            <input type="hidden" name="product_name" value="<?= $name ?>">
                            <input type="hidden" name="image" value="<?= $img ?>">
                            <input type="hidden" name="price" value="<?= number_format($price, 0, ',', '.'); ?>">
                            <input type="hidden" class="selectedSizeInput" name="size" value="">
                            <input type="hidden" class="selectedQuantity2" name="quantity" value="1">
                            <button class="btn btn-danger px-3  mx-2" type="submit" name="addorder">
                                <i class="fa fa-shopping-cart mr-1 pe-1"></i>
                                Đặt hàng
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Đánh giá (<?= $countcm ?>)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả sản phẩm</h4>
                            <p><?= $description ?>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row" style="height: 300px;">
                                <?php
                                if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                                    $product_id = $_REQUEST['product_id'];
                                ?>
                                    <div class="col-md-8">
                                        <iframe src="view/reviews.php" frameborder="1" width="100%" height="100%"></iframe>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="index.php?act=review" method="POST">
                                            <h4 class="mb-4">Để lại đánh giá</h4>
                                            <p class="mb-0 mr-2">Đánh giá của bạn :</p>
                                            <div class="d-flex my-3 text-warning mr-2">
                                                <div class="product__details__rating">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="radio10" name="star" value="1" onchange="updateHiddenInput()">
                                                        <label class="custom-control-label" for="radio10">
                                                            <i class="fa fa-star"></i>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="radio11" name="star" value="2" onchange="updateHiddenInput()">
                                                        <label class="custom-control-label" for="radio11">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="radio12" name="star" value="3" onchange="updateHiddenInput()">
                                                        <label class="custom-control-label" for="radio12">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="radio13" name="star" value="4" onchange="updateHiddenInput()">
                                                        <label class="custom-control-label" for="radio13">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="radio14" name="star" value="5" onchange="updateHiddenInput()" checked>
                                                        <label class="custom-control-label" for="radio14">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </label>
                                                    </div>
                                                    <input type="hidden" id="hiddenInput2" name="stars" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                                <label for="message">Nội dung: </label>
                                                <textarea id="message" cols="30" rows="5" name="content" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" name="comment" value="Gửi đánh giá" class="btn btn-outline-primary px-3 mt-2">
                                            </div>
                                        </form>
                                    </div>
                                <?php
                                } else {
                                    echo '<div class="col-md-8">
                            <iframe src="view/reviews.php" frameborder="1" width="100%" height="100%"></iframe>
                        </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- xem thêm sản phẩm tương tự  -->
<section class="section" id="men">
    <div class="container" style="width:60%">
        <div class="row">
            <div class="col-lg-12">
                <p style="text-align: center; font-size: 200%; font-weight: bold; margin-bottom: 4%;">Sản phẩm liên
                    quan</p>
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <?php foreach ($spcungloai as $sp) : ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id'] ?>"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id'] ?>"><i class="fa fa-star"></i></a></li>
                                            <li><a href="index.php?act=chitietsanpham&product_id=<?php echo $sp['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="uploades/<?php echo $sp['img'] ?>" alt="" height="400">
                                </div>
                                <div class="down-content">
                                    <h4><?= $sp['name'] ?></h4>
                                    <span><?= number_format($price, 0, ',', '.'); ?> VNĐ</span>
                                    <ul class="stars">
                                        <li><i style="color:gold" class="fa fa-star"></i></li>
                                        <li><i style="color:gold" class="fa fa-star"></i></li>
                                        <li><i style="color:gold" class="fa fa-star"></i></li>
                                        <li><i style="color:gold" class="fa fa-star"></i></li>
                                        <li><i style="color:gold" class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- lay size -->
<script>
    // Lấy tất cả các ô input có tên là 'size'
    var sizeInputs = document.querySelectorAll('.selectedSizeInput');

    // Lắng nghe sự kiện thay đổi cho tất cả các nút radio có tên là 'size'
    document.getElementsByName('size').forEach(function(radioButton, index) {
        radioButton.addEventListener('change', function() {
            if (radioButton.checked) {
                // Gán giá trị đã chọn vào tất cả các ô input có tên 'size'
                sizeInputs.forEach(function(sizeInput) {
                    sizeInput.value = radioButton.value;
                });
            }
        });
    });

    // Kích hoạt sự kiện thay đổi cho nút radio được chọn ban đầu (nếu có)
    var initiallyCheckedRadioButton = document.querySelector('input[name="size"]:checked');
    if (initiallyCheckedRadioButton) {
        sizeInputs.forEach(function(sizeInput) {
            sizeInput.value = initiallyCheckedRadioButton.value;
        });
    }
</script>
<!-- lay so luong -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy các phần tử cần thiết từ DOM
        var decreaseButton = document.getElementById('decreaseQuantity');
        var increaseButton = document.getElementById('increaseQuantity');
        var quantitySpan = document.querySelector('.productQuantity');

        // Sự kiện khi nhấn nút "-"
        decreaseButton.addEventListener('click', function() {
            var currentQuantity = parseInt(quantitySpan.textContent);

            // Đảm bảo giá trị không âm
            if (currentQuantity > 1) {
                currentQuantity--;
                quantitySpan.textContent = currentQuantity;

                // Cập nhật giá trị vào cả hai ô input
                document.querySelector('.selectedQuantity').value = currentQuantity;
                document.querySelector('.selectedQuantity2').value = currentQuantity;
            }
        });

        // Sự kiện khi nhấn nút "+"
        increaseButton.addEventListener('click', function() {
            var currentQuantity = parseInt(quantitySpan.textContent);

            // Tăng giá trị
            currentQuantity++;
            quantitySpan.textContent = currentQuantity;

            // Cập nhật giá trị vào cả hai ô input
            document.querySelector('.selectedQuantity').value = currentQuantity;
            document.querySelector('.selectedQuantity2').value = currentQuantity;
        });
    });
</script>
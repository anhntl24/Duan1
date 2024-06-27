<div class="page-heading about-page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Đơn hàng của bạn</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
    <div class="col-md-9">
        <div class="card mt-5">
            <div class="card-header" style="background-color: black">
                <p style="color: white; font-size: 20px;">Đơn hàng</p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian mua hàng</th>
                        <th scope="col">Số tiền thanh toán</th>
                        <th scope="col">Hình thức thanh toán</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 0;
                    $tongtien = 0;
                    foreach ($mycart as $mcart) {
                        extract($mcart);
                        $index++;
                    ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td>
                                <span class="font-weight-bold"><?= $order_name ?></span>
                            </td>
                            <td><?php
                                if ($status == 0) {
                                    echo 'Chờ xác nhận';
                                } elseif ($status == 1) {
                                    echo 'Đang giao hàng';
                                } elseif ($status == 2) {
                                    echo 'Đã giao hàng';
                                } elseif ($status == 3) {
                                    echo 'Đã hủy';
                                }
                                ?></td>
                            <td><?= $time ?></td>
                            <td><?= number_format($total, 0, ',', '.') ?> VNĐ</td>
                            <td><?php
                                if ($payment == 1) {
                                    echo 'Thanh toán khi nhận hàng';
                                } elseif ($payment == 2) {
                                    echo 'Thanh toán online';
                                }
                                ?></td>
                            <td>
                                <form action="index.php?act=mycart&order_id=<?= $order_id ?>" method="post">
                                    <?php if ($status == 0) { ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger" name="huydonhang" onclick="return cofirmcofirmhuy()">Hủy</button> <?php } ?>
                                        <a href="index.php?act=cartdetail&order_name=<?= $order_name ?>"><button type="button" class="btn btn-sm btn-success" style="width: 70px; font-size: 12px;">Chi tiết</button></a>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
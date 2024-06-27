<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách đơn hàng</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <?php
                    $index = 1;
                    foreach ($listorder as $dsdh) :
                        extract($dsdh);
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $index++ ?></th>
                                <td><?= $order_name ?></td>
                                <td><?= $time ?></td>
                                <td><?= number_format($total, 0, ',', '.'); ?> VNĐ</td>
                                <td><?php
                                    if ($payment == 1) {
                                        echo 'Thanh toán khi nhận hàng';
                                    } elseif ($payment == 2) {
                                        echo 'Thanh toán online';
                                    }
                                    ?>
                                <td>
                                    <?php if ($status == 0) { ?>
                                        <button type="button" class="btn btn-outline-danger">Chờ xác nhận</button>
                                    <?php } else if ($status == 1) { ?>
                                        <button type="button" class="btn btn-warning">Đang vận chuyển</button>
                                    <?php } else if ($status == 2) { ?>
                                        <button type="button" class="btn btn-success">Hoàn thành</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-danger">Đã hủy</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="index.php?act=dsdh&order_id=<?= $order_id ?>" method="post">
                                        <?php if ($status == 0) { ?>
                                            <button type="submit" class="btn btn-outline-primary" name="chapnhandonhang" onclick="return cofirmchapnhan()">Chấp nhận</button>
                                            <button type="submit" class="btn btn-outline-danger" name="huydonhang" onclick="return cofirmcofirmhuy()">Hủy</button>
                                        <?php } else if ($status == 1) { ?>
                                            <button type="submit" class="btn btn-outline-success" name="chapnhandonhang" onclick="return cofirmchapnhan()">Hoàn thành</button>
                                            <button type="submit" class="btn btn-outline-danger" name="huydonhang" onclick="return cofirmcofirmhuy()">Hủy</button>
                                        <?php } ?>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2023 - Designed by Qang<a href="#"> <i class="ti-heart"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
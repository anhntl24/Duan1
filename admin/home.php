<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Administrator</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Doanh thu</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center" style="height:140px">
                            <?php
                            foreach ($doanhthu as $dt);
                            extract($dt);
                            ?>
                            <h4 class="f_w_900 mb-0 me-2 color_text_3"><?= number_format($doanhthu, 0, ',', '.'); ?> VNĐ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tổng số đơn hàng</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center" style="height:140px">
                            <?php
                            foreach ($sodonhang as $dh);
                            extract($dh);
                            ?>
                            <h4 class="f_w_900 f_s_60 mb-0 me-2 color_text_3"><?= $sodonhang ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Sản phẩm tồn kho</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center" style="height:140px">
                            <?php
                            foreach ($product as $sp);
                            extract($sp);
                            ?>
                            <h4 class="f_w_900 f_s_60 mb-0 me-2 color_text_3"><?= $count_product ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tổng số danh mục</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body d-flex align-items-center" style="height:140px">
                            <?php
                            foreach ($category as $cate);
                            extract($cate);
                            ?>
                            <h4 class="f_w_900 f_s_60 mb-0 me-2 color_text_3"><?= $count_categorys ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 card_height_100">
                    <div class="white_card mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Doanh thu</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body" style="height: 500px;">
                            <canvas id="bar"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card_height_100 mb_20">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Thống kê sản phẩm theo danh mục</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body p-0" style="height: 500px;">
                            <div class="card_container">
                                <div id="myChart" style="width:100%; max-width:500px; height:500px;">
                                </div>
                                <script>
                                    google.charts.load('current', {
                                        'packages': ['corechart']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        // Set Data
                                        const data = google.visualization.arrayToDataTable([
                                            ['Danh mục', 'Số lượng sản phẩm'],
                                            <?php
                                            foreach ($listtk as $thongke) {
                                                extract($thongke);
                                                echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "],";
                                            }
                                            ?>
                                        ]);
                                        // Set Options
                                        const options = {
                                            'width': 450,
                                            'height': 450,
                                            is3D: true
                                        };
                                        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                                        chart.draw(data, options);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tóm tắt đơn hàng</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        foreach ($donhang as $dh) :
                            extract($dh);
                        ?>
                            <div class="white_card_body mt_30">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="mb_30">Hoàn thành</h3>
                                    </div>
                                </div>
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="<?= htmlspecialchars(substr($thanhcong, 0, 4)) ?>"></span>
                                </div>
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="mb_30">Chờ xác nhận</h3>
                                    </div>
                                </div>
                                <div id="bar1" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="<?= htmlspecialchars(substr($choxacnhan, 0, 4)) ?>"></span>
                                </div>
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="mb_30">Đang vận chuyển</h3>
                                    </div>
                                </div>
                                <div id="bar2" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="<?= htmlspecialchars(substr($dangvanchuyen, 0, 4)) ?>"></span>
                                </div>
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="mb_30">Đã hủy</h3>
                                    </div>
                                </div>
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="<?= htmlspecialchars(substr($huy, 0, 4)) ?>"></span>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="white_card card_height_100 mb_20 ">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Top sản phẩm bán chạy</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body QA_section">
                            <div class="QA_table ">
                                <table class="table lms_table_active2 p-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Lượt bán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sppb as $sp) :
                                            extract($sp);
                                        ?>
                                            <tr>
                                                <td><img src="../uploades/<?= $sp['product_img'] ?>" width="50" height="70"></td>
                                                <td><span class="f_s_20 f_w_400 color_text_3"><?= $sp['product_name'] ?></span></td>
                                                <td class="f_s_14 f_w_400 color_text_4"><?= $sp['category_name'] ?></td>
                                                <td class="f_s_14 f_w_400 color_text_3"><?= number_format($sp['product_price'], 0, ',', '.'); ?> VNĐ</td>
                                                <td class="f_s_14 f_w_400 color_text_3"><?= $sp['cart_count'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="index.php?act=listproduct" class="badge_btn_semi mt_30 ml_15">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_20 ">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Top sản phẩm nhiều lượt truy cập</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body QA_section">
                            <div class="QA_table ">
                                <table class="table lms_table_active2 p-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Lượt xem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($spview as $sp) :
                                            extract($sp);
                                        ?>
                                            <tr>
                                                <td><img src="../uploades/<?= $sp['img'] ?>" width="50" height="70"></td>
                                                <td><span class="f_s_20 f_w_400 color_text_3"><?= $sp['name'] ?></span></td>
                                                <td class="f_s_14 f_w_400 color_text_4"><?= $sp['view'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <a href="index.php?act=listproduct" class="badge_btn_semi mt_30 ml_15">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by Quang<a href="#"> <i class="ti-heart"></i> </a><a href="#">
                                Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
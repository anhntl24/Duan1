<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách bình luận</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Sản phẩm bình luận</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Đánh giá</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        foreach ($listcomments as $comments) :
                            extract($comments);
                        ?>
                            <tr>
                                <th scope="row"><?= $index++ ?></th>
                                <td><?= $users_name ?></td>
                                <td><?= $product_name ?></td>
                                <td><?= $content_cm ?></td>
                                <td><?= $star_cm ?></td>
                                <td><?= $time_cm ?></td>
                                <td>
                                    <a href="../index.php?act=chitietsanpham&product_id=<?= $product_id ?>"><button type="button" class="btn btn-primary">Xem</button></a>
                                    <a href="index.php?act=deletecomments&comments_id=<?= $comments_id ?>"><button type="button" class="btn btn-danger" onclick="return confirmdelete()">Xóa</button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2023 - Designed by quang<a href="#"> <i class="ti-heart"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
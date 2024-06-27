<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Danh sách khách hàng</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên tài khoản</th>
                            <!-- <th scope="col">Hình ảnh</th> -->
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Quyền truy cập</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listdskh as $kh) :
                            extract($kh);
                        ?>
                            <tr>
                                <th scope="row"><?= $users_id ?></th>
                                <td><?= $users_name ?></td>
                                <!-- <td><img src="" alt=""></td> -->
                                <td><?= $password ?></td>
                                <td><?= $email ?></td>
                                <td><?= $phone ?></td>
                                <td><?= $address ?></td>
                                <td>
                                <?php
                                if($role == 1){
                                    echo'Người quản trị';
                                }
                                else{
                                    echo'Khách hàng';
                                }
                                ?>
                                </td>
                                <!-- <td>
                                    <a href=""><button type="button" class="btn btn-success">Sửa</button></a>
                                    <a href=""><button type="button" class="btn btn-danger">Xóa</button></a>
                                </td> -->
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
                        <p>2023 - Designed by Quang<a href="#"> <i class="ti-heart"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
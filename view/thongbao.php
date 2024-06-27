<?php if (isset($_GET['dangkytc'])) { ?>
    <script>
        function showSwal() {
            Swal.fire({
                icon: "success",
                title: "Đăng ký thành công",
                showConfirmButton: false,
                timer: 1500
            });
        }
        // Gọi hàm khi trang được tải hoàn toàn
        window.onload = showSwal;
    </script>
<?php } ?>

<?php if (isset($_GET['dangnhaptc'])) { ?>
    <script>
        function showSwal() {
            Swal.fire({
                icon: "success",
                title: "Đăng nhập thành công",
                showConfirmButton: false,
                timer: 1500
            });
        }
        // Gọi hàm khi trang được tải hoàn toàn
        window.onload = showSwal;
    </script>
<?php } ?>

<?php if (isset($_GET['dangxuattc'])) { ?>
    <script>
        function showSwal() {
            Swal.fire({
                icon: "success",
                title: "Đăng xuất thành công",
                showConfirmButton: false,
                timer: 1500
            });
        }
        // Gọi hàm khi trang được tải hoàn toàn
        window.onload = showSwal;
    </script>
<?php } ?>


<?php if (isset($_GET['changepasswordtc'])) { ?>
    <script>
        function showSwal() {
            Swal.fire({
                icon: "success",
                title: "Đổi mật khẩu thành công",
                showConfirmButton: false,
                timer: 1500
            });
        }
        // Gọi hàm khi trang được tải hoàn toàn
        window.onload = showSwal;
    </script>
<?php } ?>

<?php if (isset($_GET['changeinfotc'])) { ?>
    <script>
        function showSwal() {
            Swal.fire({
                icon: "success",
                title: "Cập nhật thông tin thành công",
                showConfirmButton: false,
                timer: 1500
            });
        }
        // Gọi hàm khi trang được tải hoàn toàn
        window.onload = showSwal;
    </script>
<?php } ?>

<?php if (isset($_GET['dathangtc'])) { ?>
    <script>
        function showSwal() {
            Swal.fire({
                icon: "success",
                title: "Đặt hàng thành công",
                showConfirmButton: false,
                timer: 1500
            });
        }
        // Gọi hàm khi trang được tải hoàn toàn
        window.onload = showSwal;
    </script>
<?php } ?>

<?php if (isset($_GET['changeinfotc'])) { ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Thay đổi thông tin thành công",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
<?php } ?>
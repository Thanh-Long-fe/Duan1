</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="assets/libs/flot/excanvas.js"></script>
<script src="assets/libs/flot/jquery.flot.js"></script>
<script src="assets/libs/flot/jquery.flot.pie.js"></script>
<script src="assets/libs/flot/jquery.flot.time.js"></script>
<script src="assets/libs/flot/jquery.flot.stack.js"></script>
<script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="dist/js/pages/chart/chart-page-init.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<!-- this page js -->
<script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="assets/validator.js"></script>

<script>



<?php
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "update") {

        echo "toast({
        title: 'Update',
        message: 'Cập nhật thành công !',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }

    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "add") {

        echo "toast({
        title: 'Add',
        message: 'Thêm thành công !',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "hien") {

        echo "toast({
        title: 'Hiện',
        message: 'Hiện thành công !',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "delete") {

        echo "toast({
        title: 'Delete',
        message: 'Xóa thành công !',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "dang_cho") {

        echo "toast({
        title: 'Cảnh báo',
        message: 'Chú ý sản phẩm đang có đơn giao !',
        type: 'warning',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "error") {

        echo "toast({
        title: 'Có lỗi',
        message: 'Có lỗi xảy ra !',
        type: 'error',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "da_co") {

        echo "toast({
        title: 'Lỗi',
        message: 'Sản phẩm đã tồn tại!',
        type: 'error',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "ko_the") {

        echo "toast({
        title: 'Lỗi',
        message: 'Không thể ẩn vì có sản phẩm thuộc mục này',
        type: 'error',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "an") {

        echo "toast({
        title: 'Ẩn',
        message: 'Đã ẩn thành công!',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "block") {

        echo "toast({
        title: 'Khóa ',
        message: 'Đã khóa tài khoản thành công!',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    if (isset($_SESSION['toast']) && $_SESSION['toast'] == "open") {

        echo "toast({
        title: 'Mở khóa ',
        message: 'Đã mở khóa tài khoản thành công!',
        type: 'success',
        duration: 3000
    });";
        unset($_SESSION['toast']);
    }
    ?>
       Validator('.form-horizontal');
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
    function toast({
    title = "",
    message = "",
    type = 'success',
    duration = 3000
  }){
    const main = document.getElementById("toast_");
    if (main) {
      const toast = document.createElement('div');
      const icons = {
        success: 'bi bi-check-circle-fill',
        error: 'bi bi-exclamation-circle-fill',
        warning :'bi bi-exclamation-triangle-fill'
      }
      const icon = icons[type];
      toast.classList.add('toast_',`toast--${type}`);

      toast.innerHTML = `
      <div class="toast__icon">
        <i class="${icon}"></i>
      </div>
      <div class="toast__body">
        <h3 class="toast__title">${title}</h3>
        <p class="toast__msg">${message}</p>
      </div>
      <div class="toast__close">
        <i class="bi bi-x-lg"></i>
      </div>
      `
      main.appendChild(toast)
    }

  }
</script>



</body>


</html>
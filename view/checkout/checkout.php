<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Checkout</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Shopping Checkout Area Wrapper ==-->
    <section class="shopping-checkout-wrap">
        <div class="container">
            
            <div class="row">
                <div class="col-12">
                    <div class="checkout-page-coupon-wrap">
                        <!--== Start Checkout Coupon Accordion ==-->
                        <div class="coupon-accordion" id="CouponAccordion">
                            <div class="card">
                                <h3>
                                    <i class="fa fa-info-circle"></i>
                                    Have a Coupon?
                                    <a href="#/" data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click here to enter your code</a>
                                </h3>
                                <div id="couponaccordion" class="collapse" data-bs-parent="#CouponAccordion">
                                    <div class="card-body">
                                        <div class="apply-coupon-wrap mb-60">
                                            <p>If you have a coupon code, please apply it below.</p>
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" placeholder="Coupon code">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn-coupon">Apply coupon</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End Checkout Coupon Accordion ==-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!--== Start Billing Accordion ==-->
                    <div class="checkout-billing-details-wrap">
                        <h2 class="title">Billing details</h2>
                        <div class="billing-form-wrap">
                            <form action="index.php?act=checkout_pay" id="checkout" method="post">
                                <div class="row">
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="com_name">Họ tên</label>
                                            <input id="com_name" rules="required" name="ho_ten" type="text" class="form-control" value="<?=$_SESSION['user']['ho_ten']?>">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="street-address">Địa chỉ <abbr class="required" title="required">*</abbr></label>
                                            <input id="street-address" rules="required" name="dia_chi" type="text" class="form-control" placeholder="Số nhà (Khu) - Xã (Phường) - QUận (Huyện) - Tỉnh (Thành phố)" value="<?=$_SESSION['user']['dia_chi']?>">
                                            <span class="form-message"></span>
                                        </div>
                                        
                                    </div>
                                   
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input id="phone" rules="required" name="sdt" type="text" class="form-control" value="<?=$_SESSION['user']['sdt']?>">
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" data-margin-bottom="30">
                                            <label for="email">Email <abbr class="required" title="required">*</abbr></label>
                                            <input id="email" rules="required|email" name="email" type="text" class="form-control" value="<?=$_SESSION['user']['email']?>">
                                            <span class="form-message"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group mb--0">
                                            <label for="order-notes">Ghi chú</label>
                                            <textarea id="order-notes" name="ghi_chu" class="form-control" placeholder="Viết các ghi chú hay lưu ý về đơn hàng"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_hoa_don" value="<?= generate_id($_SESSION['user']['id_nguoi_dung'])?>">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--== End Billing Accordion ==-->
                </div>
                <div class="col-lg-6">
                    <!--== Start Order Details Accordion ==-->
                    <div class="checkout-order-details-wrap">
                        <div class="order-details-table-wrap table-responsive">
                            <h2 class="title mb-25">Đơn hàng của bạn</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                    $sum = 0;
                                    foreach ($product as $sp) :
                                    ?>

                                    <?php $sl = intval($sp['so_luong_cart']);
                                  
                                    $gia = floatval($sp['gia_bt']) - (floatval($sp['gia_bt']) * intval($sp['sale']) / 100);
                                    $sum += ($sl * $gia);
                                    ?>
                                        <tr class="cart-item">
                                            <td class="product-name"><?= $sp['ten_san_pham'] ?> |  Size: <?= $sp['ten_size'] ?> Color: <?= $sp['ten_mau'] ?>  <span class="product-quantity">× <?= $sp['so_luong_cart'] ?></span></td>
                                            <input type="hidden" form="checkout" name="sp_bt[<?=$sp['id_bien_the']?>]" value="<?= $sp['so_luong_cart'] ?>">
                                            <input type="hidden" form="checkout" name="gia[<?=$sp['id_bien_the']?>]" value="<?=$gia?>">
                                            <td class="product-total"><?= number_format($gia, 0, '.', '.') ?> VND</td>
                                            
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>

                                </tbody>
                                <tfoot class="table-foot">
                                    <tr class="cart-subtotal">
                                        <th>Tổng tiền sản phẩm</th>
                                        <td><?=number_format($sum,0,'.','.')?></td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Phí vận chuyển</th>
                                        <td><?=($sum >= 450000) ? $free : number_format($ship,0,'.','.') ?> VND</td>
                                       
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng tiền tất cả </th>
                                        <td><?php
                                        if ($sum >= 450000) {
                                            $tong_all = $sum;
                                            echo number_format($tong_all,0,'.','.');
                                            echo " <input form='checkout' name='monney' type='hidden' value='$tong_all'>";
                                        }
                                        else{
                                            $tong_all = ($sum+$ship);
                                            echo number_format( $tong_all,0,'.','.');
                                            echo " <input form='checkout' name='monney' type='hidden' value='$tong_all'>";
                                        }
                                        ?> VND</td>
                                       
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="shop-payment-method">
                                <div id="PaymentMethodAccordion">
                                <?php foreach($pay as $tt):?>
                                        <div class="card">
                                        <div class="card-header" id="check_payments">
                                        <input type="radio" form="checkout" <?=$tt['id_thanh_toan'] == 1 ? 'checked' : ''?> id="payment_direct<?=$tt['id_thanh_toan']?>" name="payment_method" value="<?=$tt['id_thanh_toan']?>">
                                            <label for="payment_direct<?=$tt['id_thanh_toan']?>" class="title collapsed" data-bs-toggle="collapse" data-bs-target="#itemOne<?=$tt['id_thanh_toan']?>" aria-controls="itemOne" aria-expanded="false"><?=$tt['ten_thanh_toan']?></label>

                                        </div>
                                        <div id="itemOne<?=$tt['id_thanh_toan']?>" class="collapse " aria-labelledby="check_payments<?=$tt['id_thanh_toan']?>" data-bs-parent="#PaymentMethodAccordion">
                                            <div class="card-body">
                                                <p><?=$tt['mota']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                  
                                 
                                  
                                </div>
                                <p class="p-text">Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của bạn trên trang web này và cho các mục đích khác được mô tả trong phần của chúng tôi<a href="#">privacy policy.</a></p>
                                <div class="agree-policy">
                                    <div class="custom-control custom-checkbox  d-flex">
                                        <input type="checkbox" id="dong_y">
                                        <label for="privacy" class="custom-control-label">Tôi đã đọc và đồng ý với tất cả các điều khoản của trang web <span class="required">*</span></label>
                                    </div>
                                </div>
                                <button form="checkout" class="btn-theme w-100 btn-checkout">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                    <!--== End Order Details Accordion ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Shopping Checkout Area Wrapper ==-->
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Lấy thẻ nút thanh toán
    var btnThanhToan = document.querySelector(".btn-checkout");
    
    
    btnThanhToan.addEventListener("click", function(event) {
      
        var radioInputs = document.querySelectorAll("input[name='payment_method']");
        var checkbox = document.querySelector("#dong_y");
        if (!checkbox.checked) {
            event.preventDefault();
            toast({
            title: 'error',
            message: 'Vui lòng chọn vào ô đồng ý với điều khoản...',
            type: 'error',
            duration: 3000
            });
        }
        else{
            setTimeout(function(){
            location.reload();
        },2000)
        }
        
        var formCheckout = document.getElementById("checkout");

        // Duyệt qua từng thẻ input radio
        radioInputs.forEach(function(radio) {
            
            if (radio.checked) {
                
                if (radio.value === "3") {
                    
                    formCheckout.action = "checkout/pay_atm_momo.php";
                    formCheckout.target = "_blank";
                    formCheckout.enctype = "application/x-www-form-urlencoded";
                }
                else if(radio.value === "2"){
                    formCheckout.action = "checkout/pay_momo.php";
                    formCheckout.target = "_blank";
                    formCheckout.enctype = "application/x-www-form-urlencoded";
                }
                 else {
                    
                }
            }



        });
        
    });
});
</script>
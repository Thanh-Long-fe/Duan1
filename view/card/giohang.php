<?php  $sum = 0;?>
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Shopping Cart</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Shopping Cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="shopping-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart-form table-responsive">
                        <form action="index.php?act=update_cart" method="post">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumb">&nbsp;</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-size px-5">Size</th>
                                        <th class="product-color">Màu</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                     if (isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
                                        <?php foreach ($sanpham as $sp) : ?>

                                            <tr class="cart-product-item">
                                                <td class="product-remove">
                                                    <a href="index.php?act=delete_cart&id_ct=<?= $sp['id_ct'] ?>&id_cart=<?= $sp['id_cart'] ?>"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product-thumb">
                                                    <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                        <img src="../upload/<?= isset($sp['bt_hinh_anh']) ? $sp['bt_hinh_anh'] : $sp['hinh_anh'] ?>" width="90" height="110" alt="Image-HasTech">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <h4 class="title"><a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_san_pham'] ?></a>
                                                    </h4>
                                                </td>
                                                <td class="product-size">
                                                    <span class="size"><?= $sp['ten_size'] ?></span>
                                                </td>
                                                <td class="product-color">
                                                    <span class="color"><?= $sp['ten_mau'] ?></span>
                                                </td>
                                                <td class="product-price">
                                                    <?php $new = floatval($sp['gia_bt']) - (floatval($sp['gia_bt']) * intval($sp['sale']) / 100);
                                                    
                                                    ?>
                                                    

                                                    <span class="price"><?= number_format($new, 0, '.', '.') ?></span>
                                                </td>
                                                <td class="product-quantity">

                                                    <div class="pro-qty">
                                                        <div class="d-flex" style="align-items: center;">
                                                           
                                                            <input type="text" class="sl_" title="Quantity" name="quantity[<?= $sp['id_bien_the'] ?>]" value="<?= $sp['so_luong_cart'] ?>">
                                                           
                                                        </div>
                                                        

                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="price"><?= number_format(intval($sp['so_luong_cart']) * $new, 0, '.', '.') ?></span>
                                                    <?php 
                                                    $sum+=(intval($sp['so_luong_cart']) * $new);
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php endforeach;


                                        ?>

                                    <?php else : ?>

                                        <?php header("location:index.php"); ?>
                                    <?php endif; ?>


                                    <tr class="actions">
                                        <td class="border-0" colspan="6">
                                            <button type="submit" class="update-cart">Cập nhật</button>
                                            <a href="index.php?act=clear_cart" class="clear-cart btn-theme btn-flat">Xóa hết</a>
                                            <a href="index.php?act=sanpham" class="btn-theme btn-flat">Continue
                                                Shopping</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row row-gutter-50">
                
                <div class="col-md-6 col-lg-6">
                    <div class="shipping-form-coupon">
                        <div class="section-title-cart">
                            <h5 class="title">Coupon Code</h5>
                            <div class="desc">
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="couponCode" class="visually-hidden">Mã giảm giá</label>
                                        <input type="text" id="couponCode" class="form-control" placeholder="Enter your coupon code..">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="coupon-btn">Áp dụng</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="shipping-form-cart-totals">
                        <div class="section-title-cart">
                            <h5 class="title">Cart totals</h5>
                        </div>
                        <div class="cart-total-table">
                            <table class="table">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <p class="value">Tổng tiền sản phẩm</p>
                                        </td>
                                        <td>
                                            <p class="price"><?= number_format($sum, 0, '.', '.') ?></p>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>
                                            <p class="value">Phí vận chuyển</p>
                                        </td>
                                        <td>
                                            <p class="price"><?= $sum < 450000 ? number_format(50000,0,'.','.') : '0'?></p>
                                        </td>
                                    </tr>
                                   
                                    <tr class="order-total">
                                        <td>
                                            <p class="value">Tổng tất cả</p>
                                        </td>
                                        <td>
                                            <?php if ($sum < 450000) {
                                                $sum += 50000;
                                            }?>
                                            <p class="price"><?= number_format($sum,0,'.','.')?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a class="btn-theme btn-flat" href="index.php?act=checkout">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
</main>

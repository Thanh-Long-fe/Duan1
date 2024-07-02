<?php

$sanPhamTrenMoiTrang = 12;

// Tổng số sản phẩm
$tongSoSanPham = count($product);

// Tính tổng số trang
$tongSoTrang = ceil($tongSoSanPham / $sanPhamTrenMoiTrang);

// Trang hiện tại (mặc định là trang 1 nếu không được chỉ định)
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính chỉ số bắt đầu của sản phẩm trên trang hiện tại
$batDau = ($trangHienTai - 1) * $sanPhamTrenMoiTrang;

// Tính chỉ số kết thúc của sản phẩm trên trang hiện tại
$ketThuc = min($batDau + $sanPhamTrenMoiTrang, $tongSoSanPham);
$max = 0;
?>
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Product Page</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Product Page</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <form action="index.php?act=loc" method="post">
        <section class="product-area product-default-area">
         
            <div class="container">
            
                <div class="row flex-xl-row-reverse justify-content-between">
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop-top-bar">
                                    <div class="shop-top-left">
                                        <p class="pagination-line">Danh sách sản phẩm</p>
                                    </div>
                                    <div class="shop-top-center">
                                        <nav class="product-nav">
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                                                <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list"></i></button>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="shop-top-right">
                                        <!-- <div class="shop-sort">
                                            <span>Sort By :</span>
                                            <select class="form-select" aria-label="Sort select example">
                                                <option selected>Default</option>
                                                <option value="1">Popularity</option>
                                                <option value="2">Average Rating</option>
                                                <option value="3">Newsness</option>
                                                <option value="4">Price Low to High</option>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                        <div class="row" style="justify-content: unset;">
                                            <?php foreach (array_slice($product, $batDau, $sanPhamTrenMoiTrang) as $sp) : ?>
                                                <div class="col-sm-6 col-lg-4 box">
                                                    <!--== Start Product Item ==-->
                                                    <div class="product-item">
                                                        <div class="inner-content">
                                                            <div class="product-thumb">
                                                                <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                                    <img src="../upload/<?= $sp['hinh_anh'] ?>" width="270" height="274" alt="Image-HasTech">
                                                                </a>
                                                                <div class="product-flag">
                                                                    <ul>
                                                                        <?php
                                                                        if ($sp['sale'] !== 0) {
                                                                            $price = $sp['sale'];
                                                                            echo "<li class='discount'>-$price %</li>";
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                                
                                                                <a class="banner-link-overlay" href="shop.html"></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="category">
                                                                    <ul>
                                                                        <li><a href="shop.html"><?= $sp['ten_thuong_hieu'] ?></a></li>
                                                                        <li class="sep">/</li>
                                                                        <li><a href="shop.html"><?= $sp['ten_danh_muc'] ?></a></li>
                                                                    </ul>
                                                                </div>
                                                                <h4 class="title"><a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>"><?= $sp['ten_san_pham'] ?></a></h4>
                                                                <div class="prices">
                                                                    <?php
                                                                    if ($sp['sale'] !== 0) {
                                                                    ?>
                                                                        <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                        <span class="sep">-</span>
                                                                    <?php } ?>

                                                                    <?php $old = $sp['gia'];
                                                                    $new = intval($old) - (intval($old) * intval($sp['sale']) / 100);
                                                                    ?>
                                                                    <span class="price"><?= number_format($new, 0, '.', '.') ?> VND</span>
                                                                    <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                    <?php $max = max($max, $new) ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--== End prPduct Item ==-->
                                                </div>
                                            <?php endforeach; ?>

                                            <div class="col-12">
                                                <div class="pagination-items">
                                                    <ul class="pagination justify-content-end mb--0">
                                                        <?php
                                                        for ($i = 1; $i <= $tongSoTrang; $i++) {
                                                            echo '<li><a' . ($i == $trangHienTai ? ' class="active"' : '') . ' href="' . $url . '&trang=' . $i . '">' . $i . '</a></li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                        <div class="row">

                                            <?php foreach (array_slice($product, $batDau, $sanPhamTrenMoiTrang) as $sp) : ?>
                                                <div class="col-md-12 box">
                                                    <!--== Start Product Item ==-->
                                                    <div class="product-item product-list-item">
                                                        <div class="inner-content">
                                                            <div class="product-thumb">
                                                                <a href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">
                                                                    <img src="../upload/<?= $sp['hinh_anh'] ?>" width="322" height="360" alt="Image-HasTech">
                                                                </a>
                                                                <div class="product-flag">
                                                                    <ul>
                                                                        <?php
                                                                        if ($sp['sale'] !== 0) {
                                                                            $price = $sp['sale'];
                                                                            echo "<li class='discount'>-$price %</li>";
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                               
                                                                <a class="banner-link-overlay" href="shop.html"></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="category">
                                                                    <ul>
                                                                        <li><a href="shop.html"><?= $sp['ten_thuong_hieu'] ?></a></li>
                                                                        <li class="sep">/</li>
                                                                        <li><a href="shop.html"><?= $sp['ten_danh_muc'] ?></a></li>
                                                                    </ul>
                                                                </div>
                                                                <h4 class="title"><a href="single-product.html"><?= $sp['ten_san_pham'] ?></a></h4>
                                                                <div class="prices">
                                                                    <div class="prices">
                                                                        <span class="price-old"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                        <span class="sep">-</span>
                                                                        <span class="price"><?= number_format($sp['gia'], 0, '.', '.') ?> VND</span>
                                                                        <span class="gia_tien" style="z-index: 1000; opacity: 0;"><?= $new ?></span>
                                                                    </div>
                                                                </div>
                                                                <p><?= $sp['mota'] ?></p>
                                                                <a class="btn-theme btn-sm" href="index.php?act=ctsp&id_sp=<?= $sp['id'] ?>">CHI TIẾT</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--== End prPduct Item ==-->
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="col-12">
                                                <div class="pagination-items">
                                                    <ul class="pagination justify-content-end mb--0">
                                                        <?php
                                                        for ($i = 1; $i <= $tongSoTrang; $i++) {
                                                            echo '<li><a' . ($i == $trangHienTai ? ' class="active"' : '') . ' href="' . $url . '&trang=' . $i . '">' . $i . '</a></li>';
                                                        }
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                    <button class="mb-3 w-100 py-2">Lọc</button>
                        <div class="shop-sidebar">
                            <div class="shop-sidebar-category">
                                <h4 class="sidebar-title">Danh mục</h4>
                                <div class="sidebar-category">
                                    <ul class="category-list mb--0">
                                        <?php foreach ($dm_ as $sp) : ?>

                                            <li class="d-flex"> <input type="checkbox" name="dm[<?= $sp['id_danh_muc'] ?>]" checked value="<?= $sp['id_danh_muc'] ?>"><a href="index.php?act=list_by_dm&id_dm=<?= $sp['id_danh_muc'] ?>"><?= $sp['ten_danh_muc'] ?> <span>(<?= $sp['so_luong_san_pham'] ?>)</span></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="shop-sidebar-price-range">
                                <h4 class="sidebar-title">Lọc giá</h4>
                                <div class="range-slider-container">
                                    <input type="range" min="0" max="<?= $max ?>" step="50000" value="0" class="range-slider" id="range1" name="min">
                                    <input type="range" min="0" max="<?= $max ?>" value="<?= $max ?>" step="50000" class="range-slider" id="range2" name="max">
                                    <div class="range-value ">
                                        <span id="value1"></span>
                                        <span id="value2"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-sidebar-brand">
                                <h4 class="sidebar-title">Thương hiệu</h4>
                                <div class="sidebar-brand">
                                    <ul class="brand-list mb--0">
                                        <?php foreach ($th_ as $sp) : ?>
                                            <li class="d-flex"><input type="checkbox" name="th[<?= $sp['id_thuong_hieu'] ?>]" checked value="<?= $sp['id_thuong_hieu'] ?>"> <a href="index.php?act=list_by_th&id_th=<?= $sp['id_thuong_hieu'] ?>"><?= $sp['ten_thuong_hieu'] ?> <span>(<?= $sp['so_luong_san_pham'] ?>)</span></a></li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>
    <!--== End Product Area Wrapper ==-->
</main>
<script>
   
    document.addEventListener("DOMContentLoaded", function() {
    let ranger1 = document.querySelector("#range1");
    let ranger2 = document.querySelector("#range2");
    let tien = document.querySelectorAll(".gia_tien");

    function handleRangeChange() {
        let value1 = parseInt(ranger1.value);
        let value2 = parseInt(ranger2.value);
        tien.forEach(function(element) {
            let value_ = parseInt(element.textContent);
            let block = getParent(element, '.box');
            if (value_ >= value1 && value_ <= value2) {
                block.style.display = "block";
            } else {
                block.style.display = "none";
            }
        });
    }

    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement
        }
    }

    
    ranger1.oninput = handleRangeChange;
    ranger2.oninput = handleRangeChange;

    
    handleRangeChange();
});
document.addEventListener("DOMContentLoaded", function() {
    let range1 = document.getElementById("range1");
    let range2 = document.getElementById("range2");
    let value1 = document.getElementById("value1");
    let value2 = document.getElementById("value2");

    // Cập nhật giá trị mỗi khi thanh trượt thay đổi
    range1.addEventListener("input", function() {
        value1.textContent = formatCurrency(this.value);
    });

    range2.addEventListener("input", function() {
        value2.textContent = formatCurrency(this.value);
    });

    // Hàm định dạng giá tiền
    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
    }

    // Khởi tạo giá trị ban đầu
    value1.textContent = formatCurrency(range1.value);
    value2.textContent = formatCurrency(range2.value);
});
</script>
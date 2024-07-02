<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Register</h2>
                        <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li>Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start My Account Area Wrapper ==-->
    <section class="account-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="section-title text-center">
                        <h2 class="title">Register</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="register-form-content">
                        <form action="index.php?act=register" method="post" class="form_register">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="hovaten">Họ và tên <span class="required">*</span></label>
                                        <input id="ho_ten" class="form-control" rules="required" type="text" name="ho_ten">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="username">Username <span class="required">*</span></label>
                                        <input id="ten_dang_nhap" class="form-control" rules="required|space" type="text" name="ten_dang_nhap">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email address <span class="required">*</span></label>
                                        <input id="text"  class="form-control" rules="required|email" type="email" name="email">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <input id="mat_khau" class="form-control" rules="required|space|min:6" type="password" name="mat_khau">
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Com firm Password <span class="required">*</span></label>
                                        <input id="confirm_mat_khau" class="form-control" rules="required|space|min:6" type="password" name="confirm_mat_khau"> 
                                        <span class="form-message"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb--0">
                                        <input class="btn-register" type="submit" name="register" value="Đăng kí">
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End My Account Area Wrapper ==-->
</main>
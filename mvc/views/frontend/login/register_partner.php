<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTQL</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Plugin js -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Font Awesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- Custom css Style  -->
    <link rel="stylesheet" href="./public/frontend/css/style.css">
    <style>
        .text_link {
            font-size: 14px;
            font-weight: 700;
            transition: color 0.3s linear;
            color: #333;
            text-decoration: none !important;
            cursor: pointer;
        }

        .text_link:hover {
            color: #b19361;
        }
    </style>
</head>

<body style="position: relative;">
    <!--<div class="loader_bg">-->
    <!--<div class="loader"></div>-->
    <!--</div>-->
    <!-- <div class="container-fluid mb-5" style="background: #fef5ef!important;">
    <div class="jumbotron jumbotron-fluid" style="background: #fef5ef!important;" >
        <div class="container">
            <h1 class="text-center">THERANKME SHOP</h1>
            <p class="text-center">Home > Đăng ký</p>
        </div>
    </div>
</div> -->

    <div class="container-fluid mb-5">
        <div class="jumbotron jumbotron-fluid" style="background-image: url(./public/frontend/images/nen.png); height:160px; width:74%; margin-left:210px;"></div>
        </div>
    </div>

    <div class="container-fluid" style="margin-bottom: 200px;">
        <div class="container-cover">
            <div class="row">

                <div class="col-sm-8 offset-sm-2">
                    <form action="index.php?url=Partner_Login/post_register" method="POST" class="border_form">
                        <h2 class="text-center mb-4">Tạo đối tác mới</h2>
                        <?php
                        if (isset($data['message_error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $data['message_error'] ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php }  ?>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản<span class="text-danger">*</span></label>
                                    <input type="text" name="user_name" value="<?php echo isset($data['result_old']['user_name']) ? $data['result_old']['user_name'] : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['user_name'][0]) ? $data['error']['user_name'][0] : "" ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên trường<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="<?php echo isset($data['result_old']['name']) ? $data['result_old']['name'] : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['name'][0]) ? $data['error']['name'][0] : "" ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="<?php echo isset($data['result_old']['email']) ? $data['result_old']['email'] : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['email'][0]) ? $data['error']['email'][0] : "" ?></span>

                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quốc gia<span class="text-danger">*</span></label>
                                <input type="text" name="country" value="<?php echo isset($data['result_old']['country']) ? $data['result_old']['country'] : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['country'][0]) ? $data['error']['country'][0] : "" ?></span>

                            </div>
                        </div>
                        <div class="row">
                        
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" name="address_detail" value="<?php echo isset($data['result_old']['address_detail']) ? $data['result_old']['address_detail'] : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['address_detail'][0]) ? $data['error']['address_detail'][0] : "" ?></span>

                    </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" name="password" value="<?php echo isset($data['result_old']['password']) ? $data['result_old']['password'] : '' ?>" class="form-control" id="exampleInputPassword1">
                            <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['password'][0]) ? $data['error']['password'][0] : "" ?></span>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirm" value="<?php echo isset($data['result_old']['password_confirm']) ? $data['result_old']['password_confirm'] : '' ?>" class="form-control" id="exampleInputPassword1">
                            <span class="text-danger" style="font-size: 14px;"><?php echo isset($data['error']['password_confirm'][0]) ? $data['error']['password_confirm'][0] : "" ?></span>

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn2 btn_login btn-primary mr-4" style="background-color: blue; cursor: pointer;">Tạo mới</button>
                            <!-- <a href="index.php?url=User_Login/login" class="text_link">Đăng nhập</a> -->
                            <a href="index.php?url=Admin/index">
                                <button type="button" class="btn2 btn-danger mr-4" style="background-color: red; color:white;">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 4  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Plugin js -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
        AOS.refresh();
    </script>
    <script src="./public/frontend/js/main.js"></script>
</body>

</html>
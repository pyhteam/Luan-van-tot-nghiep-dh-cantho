<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Tổng quan</h3>
        <ul class="nav side-menu">
            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Admin/index"><i class="fa fa-tachometer" aria-hidden="true"></i></i> Trang chủ</a>
                </li>
            <?php }
            ?>

            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Order/index"><i class="fa fa-th-list"></i> Danh sách SV đăng ký</a>
                </li>
            <?php }
            ?>

            <!-- <?php
                    if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Order/confirm"><i class="fa fa-shopping-cart"></i> Confirmed registration list</a>
                </li>
            <?php }
            ?> -->

            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Category/index"><i class="fa fa-list-alt"></i> Danh mục</a>
                </li>
            <?php }
            ?>
            <!-- Product -->
            <li>
                <a href="index.php?url=Product/index"><i class="fa fa-desktop"></i> Chương trình</a>
            </li>
            <!-- <?php
                    if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Tags/index"><i class="fa fa-tags"></i> Tags</a>
                </li>
            <?php }
            ?> -->

            <!-- <?php
                    if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=CategoryBlog/index"><i class="fa fa-list-alt"></i> Category of Blog </a>
                </li>
            <?php }
            ?> -->

            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Blog"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Tiêu chí </a>
                </li>
            <?php }
            ?>

            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                <a href="index.php?url=Slider"><i class="fa fa-book" aria-hidden="true"></i> Danh sách </a>
                </li>
            <?php }
            ?>

            <!-- <li>
                <a href="index.php?url=Slider"><i class="fa fa-picture-o" aria-hidden="true"></i> Standard</a>
            </li> -->

            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=User"><i class="fa fa-user" aria-hidden="true"></i></i> Sinh viên</a>
                </li>
            <?php }
            ?>
            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Partner"><i class="fa fa-user-secret" aria-hidden="true"></i></i> Đối tác</a>
                </li>
            <?php }
            ?>

            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Adduser/index"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Thêm sinh viên</a>
                </li>
                <!-- index.php?url=User_Login/register" -->
            <?php    }
            ?>
            <?php
            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                <li>
                    <a href="index.php?url=Partner_Login/register_partner"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Thêm đối tác</a>
                </li>

            <?php    }
            ?>
        </ul>
    </div>

</div>
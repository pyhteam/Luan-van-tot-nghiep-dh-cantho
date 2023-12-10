<div class="title_left">
<table>
    <th><h3>Danh sách sinh viên</h3></th>
    <!-- Chưa có thêm code xử lý tìm kiếm -->
    <th><div class="ml-4" style="position: fixed; top: 70px; right: 20px;">
        <form method="POST" action="index.php?url=User/search_order">
            <div class="input-group" style="width: 250px;">
                <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Tìm kiếm sinh viên...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default ml-2" type="button" style="background-color: #0000FF; color:white;">Tìm</button>
                 </span>
            </div>
        </form>
    </div></th>
</table>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MSSV</th>
                            <th>Họ và tên</th>
                            <th>Ảnh</th>
                            <th>Ngày sinh</th>
                            <th>Lớp</th>
                            <th>Ngành học</th>
                            <th>Khoa</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($data['list_user'])){
                                foreach($data['list_user'] as $key => $user){ ?>
                                <tr>
                                    <th scope="row"><?php echo ($key+1) ?></th>
                                    <td><?php echo $user->user_name ?></td>
                                    <td><?php echo $user->full_name ?></td>
                                    <td>
                                        <?php 
                                            if($user->image!=""){ ?>
                                                <img height="50" width="50" style="object-fit:cover" src="./public/uploads/<?php echo $user->image ?>" alt="">
                                            <?php }else{ ?>
                                                <img height="50" width="50" style="object-fit:cover" src="https://i.pinimg.com/280x280_RS/2e/45/66/2e4566fd829bcf9eb11ccdb5f252b02f.jpg" alt="">
                                            <?php }  ?>
                                    </td>
                                    <td><?php echo $user->ngay_sinh ?></td>
                                    <td><?php echo $user->ma_lop ?></td>
                                    <td><?php echo $user->nganh ?></td>
                                    <!-- <td><?php
                                            if ($user->khoa == '0') {
                                                echo "Công nghệ thông tin";
                                            } elseif ($user->khoa == '1') {
                                                echo 'Kỹ thuật phần mềm';
                                            } elseif ($user->khoa == '2') {
                                                echo 'Hệ thống thông tin';
                                            } elseif ($user->khoa == '3') {
                                                echo 'Khoa học máy tính';
                                            } elseif ($user->khoa == '4') {
                                                echo 'Mạng máy tính và truyền thông';
                                            } elseif ($user->khoa == '5') {
                                                echo 'Truyền thông đa phương tiện';
                                            } elseif ($user->khoa == '6') {
                                                echo 'An toàn thông tin';
                                            } elseif ($user->khoa == '7') {
                                                echo 'Công nghệ thông tin - CT Chất lượng cao';
                                            }  elseif ($user->khoa == '8') {
                                                echo 'Kỹ thuật phần mềm - CT Chất lượng cao';
                                            } else {
                                                echo 'Chuyên ngành Tin học ứng dụng';
                                            }
                                            ?>
                                    </td> -->
                                    <td><?php echo $user->khoa ?></td>
                                    <!-- <td><?php
                                            if ($user->khoa == '0') {
                                                echo "Công nghệ thông tin";
                                            } elseif ($user->khoa == '1') {
                                                echo 'Công nghệ phần mềm';
                                            } elseif ($user->khoa == '2') {
                                                echo 'Hệ thống thông tin';
                                            } elseif ($user->khoa == '3') {
                                                echo 'Khoa học máy tính';
                                            } elseif ($user->khoa == '4') {
                                                echo 'Mạng máy tính và truyền thông';
                                            } else {
                                                echo 'Truyền thông đa phương tiện';
                                            }
                                            ?>
                                    </td> -->
                                    <td><?php echo $user->phone ?></td>
                                    <td>
                                        <?php echo $user->email ?>
                                    </td>
                                    <td>
                                        <?php echo (isset($user->address_detail) && $user->address_detail!="")?$user->address_detail.', ':"" ?>
                                        <?php echo $user->commune.', '.$user->district.', '.$user->conscious.', '.$user->country ?><td>
                                </tr>
                        <?php  }  } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate">
    <ul class="pagination">
        <?php
            for ($i = 1; $i <= $data['page_number']; $i++) { ?>
                <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?>
                    href="index.php?url=User/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
        <?php  }  ?>
    </ul>
</div> -->
<div class="dataTables_paginate paging_simple_numbers float-right" id="datatable-checkbox_paginate">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $data['total_page_number']; $i++) { ?>
                        <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=User/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                    <?php  }  ?>
                </ul>
</div>
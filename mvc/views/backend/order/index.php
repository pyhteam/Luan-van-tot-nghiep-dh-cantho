<div class="title_left">
    <h3>Danh sách sinh viên đăng ký</h3>
</div>
<div class="row m-1">
    <div class="dropdown show">
        <label>
            Học bổng
        </label>

        <select class="form-control" id="hoc_bong" aria-labelledby="dropdownMenuLink">
            <option value="">Tất cả</option>
            <option <?= isset($_GET['hoc_bong']) && $_GET['hoc_bong'] == 0 ? 'selected' : '' ?> value="0">Có học bổng</option>
            <option <?= isset($_GET['hoc_bong']) && $_GET['hoc_bong'] == 1 ? 'selected' : '' ?> value="1">Không học bổng</option>
        </select>
    </div>
    <div class="dropdown show">
        <label>
            Chứng chỉ tiếng anh
        </label>

        <select class="form-control" id="anh_van" aria-labelledby="dropdownMenuLink">
            <option value="">Tất cả</option>
            <option <?= isset($_GET['av']) && $_GET['av'] == 0 ? 'selected' : '' ?> value="0">B1</option>
            <option <?= isset($_GET['av']) && $_GET['av'] == 1 ? 'selected' : '' ?> value="1">Toeic >= 450</option>
            <option <?= isset($_GET['av']) && $_GET['av'] == 2 ? 'selected' : '' ?> value="2">Ielts >= 4.5</option>
        </select>
    </div>
    <div class="dropdown show">
        <label>
            Nghiên cứu khoa học
        </label>

        <select class="form-control" id="nckh" aria-labelledby="dropdownMenuLink">
            <option value="">Tất cả</option>
            <option <?= isset($_GET['nckh']) && $_GET['nckh'] == 0 ? 'selected' : '' ?> value="0">Không tham gia NCKH và cũng không có bài báo</option>
            <option <?= isset($_GET['nckh']) && $_GET['nckh'] == 1 ? 'selected' : '' ?> value="1">Đã tham gia NCKH và đã nghiệm thu</option>
            <option <?= isset($_GET['nckh']) && $_GET['nckh'] == 2 ? 'selected' : '' ?> value="2">Đang tham gia NCKH, chưa nghiệm thu</option>
            <option <?= isset($_GET['nckh']) && $_GET['nckh'] == 3 ? 'selected' : '' ?> value="3">Có bài báo đăng trên các tạp chí</option>
        </select>
    </div>
    <div class="dropdown show">
        <label>
            Hình thức đi
        </label>

        <select class="form-control" id="hinh_thuc" aria-labelledby="dropdownMenuLink">
            <option value="">Tất cả</option>
            <option <?= isset($_GET['hinh_thuc']) && $_GET['hinh_thuc'] == 0 ? 'selected' : '' ?> value="0">Học bổng</option>
            <option <?= isset($_GET['hinh_thuc']) && $_GET['hinh_thuc'] == 1 ? 'selected' : '' ?> value="1">Tự túc</option>
        </select>
    </div>
    <div class="dropdown show">
        <label>
            Tình trạng đăng ký
        </label>

        <select class="form-control" id="status" aria-labelledby="dropdownMenuLink">
            <option value="">Tất cả</option>
            <option <?= isset($_GET['status']) && $_GET['status'] == 0 ? 'selected' : '' ?> value="0">Duyệt</option>
            <option <?= isset($_GET['status']) && $_GET['status'] == 1 ? 'selected' : '' ?> value="1">Đã thêm vào danh sách</option>
            <option <?= isset($_GET['status']) && $_GET['status'] == 2 ? 'selected' : '' ?> value="2">SV đã xác nhận</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Filter</label> <br>
        <button type="button" onclick="filter()" class="btn btn-primary" id="filter">Lọc</button>
    </div>

    <div class="ml-4" style="position: fixed; top: 110px; right: 20px;">
        <form method="POST">
            <div class="input-group" style="width: 300px;">
                <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Tìm kiếm tên chương trình...">
                <span class="input-group-btn">
                    <button type="buttom" class="btn btn-default ml-2" type="button" style="background-color: #0000FF;color:white;">Tìm</button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">

            <div class="x_content">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Lớp</th>
                                <th class="text-center">Ngành học</th>
                                <th class="text-center">Ngày sinh </th>
                                <th class="text-center">Số passport</th>
                                <th class="text-center">Thông tin chương trình</th>
                                <th class="text-center">Thông tin đăng ký</th>
                                <th class="text-center">Nghiên cứu khoa học</th>
                                <th class="text-center">Đi trao đổi</th>
                                <th class="text-center">Hình thức đăng ký đi</th>
                                <th class="text-center">Ngày đăng ký</th>
                                <th class="text-center">Tình trạng đăng ký</th>
                            </tr>
                        </thead>
                        <tbody id="dataTable">
                            <?php
                            if (isset($data['list_order'])) {
                                foreach ($data['list_order'] as $key => $order) { ?>
                                    <tr>
                                        <th scope="row"><?php echo ($key + 1); ?></th>
                                        <td><?php echo $order['full_name'] ?><br></td>
                                        <td><?php echo $order['ma_lop'] ?></td>
                                        <td><?php echo $order['nganh'] ?></td>
                                        <!-- <td>
                                            <?php
                                            if ($order['nganh'] == '0') {
                                                echo "Công nghệ thông tin";
                                            } elseif ($order['nganh'] == '1') {
                                                echo 'Kỹ thuật phần mềm';
                                            } elseif ($order['nganh'] == '2') {
                                                echo 'Hệ thống thông tin';
                                            } elseif ($order['nganh'] == '3') {
                                                echo 'Khoa học máy tính';
                                            } elseif ($order['nganh'] == '4') {
                                                echo 'Mạng máy tính và truyền thông';
                                            } elseif ($order['nganh'] == '5') {
                                                echo 'Truyền thông đa phương tiện';
                                            } elseif ($order['nganh'] == '6') {
                                                echo 'An toàn thông tin';
                                            } elseif ($order['nganh'] == '7') {
                                                echo 'Công nghệ thông tin - CT Chất lượng cao';
                                            } elseif ($order['nganh'] == '8') {
                                                echo 'Kỹ thuật phần mềm - CT Chất lượng cao';
                                            } else {
                                                echo 'Chuyên ngành Tin học ứng dụng';
                                            }
                                            ?>
                                        </td> -->
                                        <td><?php echo $order['ngay_sinh'] ?></td>
                                        <td><?php echo $order['passport'] ?></td>
                                        <td>
                                            <img height="100" width="130" src="./public/uploads/<?php echo $order['image'] ?>" alt="">
                                            <!-- <?php echo $order['image'] ?></td> -->
                                            <br><br>
                                            <?php echo $order['name'] ?>
                                            <br><br>
                                            <p><b>Cán bộ phụ trách:</b> <?php echo $order['can_bo'] ?></p>
                                        </td>
                                        </td>


                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">Chứng chỉ tiếng anh</div>
                                                <div class="col-md-6" style="font-weight: bold;">
                                                    <?php
                                                    if ($order['av'] == '0') {
                                                        echo "B1";
                                                    } elseif ($order['av'] == '1') {
                                                        echo 'Toeic >= 450';
                                                    } else {
                                                        echo 'Ielts >= 4.5';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">Học bổng khuyến khích</div>
                                                <div class="col-md-6" style="font-weight: bold;"><?php echo isset($order['hoc_bong']) && $order['hoc_bong'] == "0" ? "Có" : "Không" ?></div>

                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">Điểm trung bình</div>
                                                <div class="col-md-6" style="font-weight: bold;"><?php echo $order['diemtb'] ?></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">Điểm tích lũy</div>
                                                <div class="col-md-6" style="font-weight: bold;"><?php echo $order['diemtl'] ?></div>
                                            </div>
                                        </td>
                                        <!-- <td><?php echo $order['nckh'] ?></td> -->
                                        <td>
                                            <?php
                                            if ($order['nckh'] == '0') {
                                                echo "Không tham gia NCKH và cũng không có bài báo";
                                            } elseif ($order['nckh'] == '1') {
                                                echo 'Đã tham gia NCKH và đã nghiệm thu';
                                            } elseif ($order['nckh'] == '2') {
                                                echo 'Đang tham gia NCKH, chưa nghiệm thu';
                                            } else {
                                                echo 'Có bài báo đăng trên các tạp chí';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $order['trao_doi'] ?></td>
                                        <td><?php echo $order['hinh_thuc'] == '0' ? "Học bổng" : "Tự túc" ?></td>
                                        <td><?php echo $order['created_at']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            $string_status = "";
                                            if ($order['status'] == 0) {
                                                $string_status = "Duyệt";
                                            } elseif ($order['status'] == 1) {
                                                $string_status = "Đã thêm vào danh sách";
                                            } else {
                                                $string_status = "SV đã xác nhận";
                                            }

                                            ?>
                                            <span id="<?php echo $order['id']; ?>" style="cursor:pointer" class="order_status_confirm<?php echo $order['id']; ?> <?php if ($order['status'] == 0) {
                                                                                                                                                                        echo 'btn btn-sm btn-primary';
                                                                                                                                                                    }
                                                                                                                                                                    ?> btn_confirm_order"><?php echo $string_status; ?></span>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="dataTables_paginate paging_simple_numbers float-right" id="datatable-checkbox_paginate">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $data['total_page_number']; $i++) { ?>
                            <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=Order/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function filter() {
        const dataFilter = {
            hoc_bong: document.getElementById('hoc_bong').value,
            av: document.getElementById('anh_van').value,
            nckh: document.getElementById('nckh').value,
            hinh_thuc: document.getElementById('hinh_thuc').value,
            status: document.getElementById('status').value,
        }
        console.log(dataFilter);
        // redirect to url
        const url = "/index.php?url=Order/filter";
        let params = '';
        $.ajax({
            url: url,
            method: 'POST',
            application: 'json',
            data: dataFilter,
            success: function(res) {
                console.log(res);
                if(res.success) {
                    let html = ``;
                    res.items.forEach((item, index) => {
                        html += `
                            <tr>
                                <th scope="row">${index + 1}</th>
                                <td>${item.full_name}<br></td>
                                <td>${item.ma_lop}</td>
                                <td>${item.nganh}</td>
                                <td>${item.ngay_sinh}</td>
                                <td>${item.passport}</td>
                                <td>
                                    <img height="100" width="130" src="./public/uploads/${item.image}" alt="">
                                    <br><br>
                                    ${item.name}
                                    <br><br>
                                    <p><b>Cán bộ phụ trách:</b> ${item.can_bo}</p>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">Chứng chỉ tiếng anh</div>
                                        <div class="col-md-6" style="font-weight: bold;">
                                            ${item.av == 0 ? "B1" : item.av == 1 ? "Toeic >= 450" : "Ielts >= 4.5"}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">Học bổng khuyến khích</div>
                                        <div class="col-md-6" style="font-weight: bold;">${item.hoc_bong == 0 ? "Có" : "Không"}</div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">Điểm trung bình</div>
                                        <div class="col-md-6" style="font-weight: bold;">${item.diemtb}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">Điểm tích lũy</div>
                                        <div class="col-md-6" style="font-weight: bold;">${item.diemtl}</div>
                                    </div>
                                </td>
                                <td>
                                    ${item.nckh == 0 ? "Không tham gia NCKH và cũng không có bài báo" : item.nckh == 1 ? "Đã tham gia NCKH và đã nghiệm thu" : item.nckh == 2 ? "Đang tham gia NCKH, chưa nghiệm thu" : "Có bài báo đăng trên các tạp chí"}
                                </td>
                                <td>${item.trao_doi}</td>
                                <td>${item.hinh_thuc == 0 ? "Học bổng" : "Tự túc"}</td>
                                <td>${item.created_at}</td>
                                <td class="text-center">
                                    <span id="${item.id}" style="cursor:pointer" class="order_status_confirm${item.id} ${item.status == 0 ? 'btn btn-sm btn-primary' : ''} btn_confirm_order">${item.status == 0 ? 'Duyệt' : item.status == 1 ? 'Đã thêm vào danh sách' : 'SV đã xác nhận'}</span>
                                </td>
                            </tr>
                        `;
                    });
                    document.getElementById('dataTable').innerHTML = html;

                }
               
            }
        });
    }
</script>
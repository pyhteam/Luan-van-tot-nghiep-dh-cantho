<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="title_left">
<table>
    <th><h3>Danh sách chương trình</h3></th>
    <!-- Chưa có thêm code xử lý tìm kiếm -->
    <th><div class="ml-4" style="position: fixed; top: 70px; right: 20px;">
        <form method="POST" action="index.php?url=User/search_order">
            <div class="input-group" style="width: 300px;">
                <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Tìm kiếm tên chương trình...">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default ml-2" type="button" style="background-color: #0000FF; color:white;">Tìm</button>
                 </span>
            </div>
        </form>
    </div></th>
</table>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">

            <div class="x_title">
                <?php
                if (isset($data['message'])) { ?>
                    <h5 class="alert alert-success text-white"><?php echo $data['message']; ?></h5>
                <?php } ?>
                <a href="index.php?url=Product/create">
                    <button class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></button>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên chương trình</th>
                            <th>Chi phí ~~</th>
                            <th>Thời gian</th>
                            <th>Cán bộ</th>
                            <!-- <th>Trạng thái</th> -->
                            <?php
                            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                                <th>Trạng thái</th>
                            <?php }
                            ?>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <?php
                            if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                                <th>Quản lý</th>
                            <?php }
                            ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data['productes'])) {
                            foreach ($data['productes'] as $key => $product) { ?>
                                <tr>
                                    <th scope="row"><?php echo ($key + 1); ?></th>
                                    <td width="150"><?php echo $product->name; ?></td>
                                    <td><?php echo number_format($product->price_unit); ?>vnđ</td>
                                    <td><?php echo $product->thoi_gian; ?></td>
                                    <td><?php echo $product->can_bo; ?></td>
                                    <?php
                                    if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                                        <td><span id="<?php echo $product->id ?>" class="badge btn_status_product<?php echo $product->id ?> btn_status_product badge-sm <?php echo ($product->status == 1) ? 'badge-danger' : 'badge-secondary'  ?>"><?php echo ($product->status == 1) ? "Hiển thị" : "Không hiển thị"; ?></span></td>
                                    <?php }
                                    ?>

                                    <td><?php echo $product->quantity; ?></td>
                                    <td>
                                        <?php
                                        foreach ($product->image as $image) { ?>
                                            <img class="mb-2" src="./public/uploads/<?php echo $image; ?>" width="50" height="50" style="object-fit: cover;" alt="">
                                        <?php    }  ?>
                                    </td>
                                    <td><?php echo $product->cat_name; ?></td>
                                    <?php
                                    if (isset($_SESSION['admin_login']) && $_SESSION['admin_login']['role'] == 0) { ?>
                                        <td class="text-center">
                                            <a href="index.php?url=Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-danger">Edit</a>
                                            <button class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#btn_delete_product<?php echo $product->id ?>">Delete</button>
                                            <button type="button" onclick="exportExcel(<?= $product->id ?>)" class="btn btn-success">
                                                <i class="fa fa-file-excel-o"></i> Export User Register List
                                            </button>


                                            <div class="modal fade" id="btn_delete_product<?php echo $product->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Xóa chương trình </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Bạn chắc chắn muốn xóa chương trình này</h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="index.php?url=Product/delete">
                                                                <input type="hidden" name="product_id" value="<?php echo $product->id ?>">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    <?php }
                                    ?>

                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
                <div class="dataTables_paginate paging_simple_numbers" id="datatable-checkbox_paginate">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $data['page_number']; $i++) { ?>
                            <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=Product/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                        <?php  }  ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function exportExcel(id) {
        $.ajax({
            url: "index.php?url=Product/exportExcel",
            type: "POST",
            data: {
                product_id: id
            },
            success: function(res) {
                console.log(res);
                if (res.success) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Export thành công',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    const link = document.createElement('a');
                    link.href = res.data; // directly assign the URL to href
                    link.download = res.data.split('/').pop();
                    document.body.appendChild(link);
                    link.click();
                    link.remove();

                }
            }
        });
    }
</script>
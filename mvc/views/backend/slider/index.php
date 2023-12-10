<div class="title_left">
<table>
    <th><h3>Danh sách</h3></th>
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
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <a href="index.php?url=Slider/create" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a>
            <div class="x_content">
                <?php
                if (isset($data['message_success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5><strong><?php echo $data['message_success']; ?></strong></h5>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên chương trình</th>
                            <th>File</th>
                            <th>Trạng thái</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data['list_slider'])) {
                            foreach ($data['list_slider'] as $key => $slider) { ?>
                                <tr>
                                    <th scope="row"><?php echo $slider->id ?></th>
                                    <td><?php echo $slider->name; ?></td>
                                    <!-- <td><?php echo $slider->file; ?></td> -->
                                    <td><a href="./public/uploads/<?php echo $slider->file; ?>">danh sách</a></td>
                                    <td><span id="<?php echo $slider->id; ?>" class="badge btn_status_slider<?php echo $slider->id ?> btn_status_slider badge-sm <?php echo ($slider->status == 1) ? 'badge-danger' : 'badge-secondary'; ?>"><?php echo ($slider->status == 1) ? "Hiển thị" : "Không hiển thị" ?></span></td>
                                    <td>
                                        <a href="index.php?url=Slider/edit/<?php echo $slider->id ?>" class="btn btn-sm btn-warning text-white">Edit</a>
                                        <button class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#btn_delete_slider<?php echo $slider->id ?>">Delete</button>

                                        <div class="modal fade" id="btn_delete_slider<?php echo $slider->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Xóa bài viết </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>Bạn chắc chắn muốn xóa bài viết này</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="index.php?url=Slider/delete">
                                                            <input type="hidden" name="slider_id" value="<?php echo $slider->id ?>">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                        <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=Slider/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                    <?php  }  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
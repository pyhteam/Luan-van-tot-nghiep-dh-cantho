<div class="" style="margin-top: 100px;"></div> 
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
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
                        <!-- <tr>
                            <th>Tên</th>
                            <th>Nội dung bài viết</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data['list_blog'])) {
                            foreach ($data['list_blog'] as $key => $blog) { ?>
                                <tr>
                                    <td style="font-weight: bold; font-size: 42px;font-family: Times New Roman,Times, serif; text-align: center;"><?php echo $blog->title; ?></td>
                                </tr>
                                <tr><td style="font-size: 20px;font-family: Times New Roman,Times, serif;"><?php echo $blog->description; ?></td></tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="dataTables_paginate paging_simple_numbers float-right" id="datatable-checkbox_paginate">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $data['total_page_number']; $i++) { ?>
                        <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=Blog/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                    <?php  }  ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="title_left">
<table>
    <th><h3>Danh sách các đối tác</h3></th>
    <!-- Chưa có thêm code xử lý tìm kiếm -->
    <th><div class="ml-4" style="position: fixed; top: 70px; right: 20px;">
        <form method="POST" action="index.php?url=Partner/search_order">
            <div class="input-group" style="width: 250px;">
                <input type="text" id="search_key" name="search_key" class="form-control" placeholder="Tìm kiếm đối tác...">
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
                            <th>Tên tài khoản</th>
                            <th>Tên trường</th>
                            <th>Ảnh</th>
                            <th>Email</th>
                            <th>Quốc gia</th>
                            <th>Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($data['list_partner'])){
                                foreach($data['list_partner'] as $key => $partner){ ?>
                                <tr>
                                    <th scope="row"><?php echo ($key+1) ?></th>
                                    <td><?php echo $partner->user_name ?></td>
                                    <td><?php echo $partner->name ?></td>
                                    <td>
                                        <?php 
                                            if($partner->image!=""){ ?>
                                                <img height="50" width="50" style="object-fit:cover" src="./public/uploads/<?php echo $partner->image ?>" alt="">
                                            <?php }else{ ?>
                                                <img height="50" width="50" style="object-fit:cover" src="https://i.pinimg.com/280x280_RS/2e/45/66/2e4566fd829bcf9eb11ccdb5f252b02f.jpg" alt="">
                                            <?php }  ?>
                                    </td>
                                    <td>
                                        <?php echo $partner->email ?>
                                    </td>
                                    <td>
                                        <?php echo $partner->country ?>
                                    </td>
                                    <td>
                                        <?php echo $partner->address ?>
                                </tr>
                        <?php  }  } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="dataTables_paginate paging_simple_numbers float-right" id="datatable-checkbox_paginate">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $data['total_page_number']; $i++) { ?>
                        <li class="paginate_button active"><a <?php if (isset($data['page_index']) && $data['page_index'] == $i) { ?> style="color: #fff;" <?php } ?> href="index.php?url=Partner/index/page=<?php echo $i ?>" aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0"><?php echo ($i) ?></a></li>
                    <?php  }  ?>
                </ul>
</div>
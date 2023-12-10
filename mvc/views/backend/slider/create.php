<div class="title_left">
    <h3><?php echo isset($data['slider_edit'])?"Cập nhật danh sách":"Thêm mới danh sách" ?></h3>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm mới</h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                    if(isset($data['message_error'])){?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5><?php echo $data['message_error']; ?></h5>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?php }  ?>

                <form <?php if(isset($data['slider_edit'])){  ?>
                    action="index.php?url=Slider/update/<?php echo $data['slider_edit']->id ?>"
              <?php  }else{ ?>
                    action="index.php?url=Slider/store"
               <?php } ?> method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-6  form-group">
                        <label style="font-size: 16px" for="" class="form-label">Tên chương trình (<span class="text-danger">*</span>)</label>
                        <input type="text" class="form-control" value="<?php
                            if(isset($data['slider_edit'])) echo $data['slider_edit']->name;
                            else{
                                if(isset($data['result_old']) && isset($data['result_old']['name'])){
                                    echo $data['result_old']['name'];
                                }
                            }
                        ?>" name="name" placeholder="Nhập tên chương trình" >

                        <span class="text-danger">
                            <?php
                               echo isset($data['error']) && isset($data['error']['name']) && isset($data['error']['name'][0])?$data['error']['name'][0]:"";
                            ?>
                        </span>
                    </div>
                    
                    <!-- đường dẫn file -->
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 mb-2">
                            <h4>File danh sách</h4><?php if (isset($data['slider_edit'])) { ?> <span class="badge badge-danger">Tồn tại file</span> <?php } ?>
                            <input type="file" name="file" class="form-control" value="" multiple>
                            <?php
                            if (isset($data['error']['image']) && isset($data['error']['image'][0])) { ?>
                                <span class="text-danger"><?php echo $data['error']['image'][0]; ?></span>
                            <?php } ?>


                        </div>
                    </div>

                    <div class="col-md-12 mt-4 col-sm-12 ">
                        <div class="checkbox">
                            <label style="font-size: 16px">
                                <input name="status" value="1" <?php
                                if(isset($data['slider_edit']) && $data['slider_edit']->status==1) { ?>
                                    checked
                                 <?php }else{
                                    if(isset($data['result_old']) && isset($data['result_old']['status'])) { ?>
                                        checked
                                 <?php   } } ?> type="checkbox" value=""> Trạng thái
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href="index.php?url=Slider/index"><button type="button" class="btn btn-primary" style="background-color: red;">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    
<!--                    <input type="hidden" name="_token" value="DMk50zxxLpu1K9ZGOF2IejakwZePjikGhCWji9Mj">-->
                </form>
            </div>
        </div>
    </div>
</div>

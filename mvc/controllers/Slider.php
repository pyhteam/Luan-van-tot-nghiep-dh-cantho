<?php 
require_once('./mvc/helper/process_url.php');
    class Slider extends Controller{
        public $blogs;
        public $tags;
        public $product_image;
        public $slider;

        public function __construct(){
            $this->blogs        = $this->model('BlogModel');
            //danh muc blog
            $this->product_image= $this->model('Product_ImageModel');
            $this->slider = $this->model('SliderModel');
        }
        public function index(){
            // $list_blog = json_decode($this->blogs->getList());

            $count_slider  = json_decode($this->slider->count_slider());
            $number_display = 6;
            $total_page_number = ceil($count_slider/$number_display);
            $process_url = new process_url();
            $is_page = json_decode($process_url->is_page($_GET['url']));
            // url chua page
            $page_index = 1;
            if($is_page){
                $page_index =  json_decode($process_url->index_page($_GET['url']));
                $start_in = ($page_index-1)*$number_display;
                $list_slider = json_decode($this->slider->getListLimit($start_in,$number_display));
            }else{ //url khong chua page
                $start_in = 0;
                $list_slider = json_decode($this->slider->getListLimit($start_in,$number_display));
            }

            $this->view('backend/layout/master',[
                'page'          => 'backend/slider/index',
                'list_slider'     => $list_slider,
                'total_page_number' => $total_page_number,
                'page_index'        => $page_index
            ]);
        }

        public function create(){
            $this->view('backend/layout/master',[
               'page'           => 'backend/slider/create'
            ]);
        }

        public function store(){
            //validate
            $test_validate = false;
            $error = array();
            $result_old = array();

                //3. name
            $error['name'] = array();
            if(!isset($_POST['name']) || $_POST['name']==""){
                array_push($error['name'],'Vui lòng nhập tên chương trình');
                $test_validate = true;
            }else{
                $result_old['name'] = $_POST['name'];
            }

            $path = "public/uploads/";
            $file_name_file = $_FILES['file']['name'];
            $array = explode('.',$file_name_file);
            $file = $array[0].rand(0,999).'.'.$array[1];
            move_uploaded_file($_FILES['file']['tmp_name'],$path.$file);
           
            

            if(isset($_POST['status'])){
                $result_old['status'] = 1;
            }
            if($test_validate == false){
                $name          = $_POST['name'];
                
                $status         = isset($_POST['status'])?1:0;
                $created_at     = date('Y-m-d H:i:s');
                $updated_at     = date('Y-m-d H:i:s');
                $id_slider = json_decode($this->slider->insert($name,$file,$status,$created_at,$updated_at));
               
                if($id_slider == true){
                    $list_slider = json_decode($this->slider->getList());
                    $message_success = "Thêm mới danh sách thành công";
                    $this->view('backend/layout/master',[
                        'page'          => 'backend/slider/index',
                        'list_slider'     => $list_slider,
                        'message_success'  => $message_success
                    ]);
                    header('location: index.php?url=Slider');
                }
            }else{
                $message_error      = "Thêm mới danh sách không thành công";
                $this->view('backend/layout/master',[
                    'page'           => 'backend/slider/create',
                    'message_error' => $message_error,
                    'error'         => $error,
                    'result_old'    => $result_old
                ]);
            }
        }

        public function delete(){

            $slider_id = $_POST['slider_id'];
            $slider_delete =  json_decode($this->slider->getId($slider_id));

            //3.Xóa slider
            $result = $this->slider->delete($slider_id);
            if($result == 'true'){
                $list_slider = json_decode($this->slider->getList());
                $message_success = "Bạn đã xóa thành công danh sách";
                $this->view('backend/layout/master',[
                    'page'          => 'backend/slider/index',
                    'list_slider'     => $list_slider,
                    'message_success'        => $message_success
                ]);
                header('location: index.php?url=Slider');
            }
        }

        public function edit($id){
            $slider_edit = json_decode($this->slider->getId($id));
            $this->view('backend/layout/master',[
                'page'              => 'backend/slider/create',
                'slider_edit'         => $slider_edit
            ]);
        }

        public function update($id){
            
            //validate
            $test_validate = false;
            $error = array();
            $result_old = array();

            //3. name
            $error['name'] = array();
            if(!isset($_POST['name']) || $_POST['name']==""){
                array_push($error['name'],'Vui lòng nhập tên chương trình');
                $test_validate = true;
            }else{
                $result_old['name'] = $_POST['name'];
            }
            $slider_edit = $this->slider->getId($id);
            $slider_edit = json_decode($slider_edit);
            if($_FILES['file']['name']){
                $path = "public/uploads/";
                $file_name_file = $_FILES['file']['name'];
                $array = explode('.',$file_name_file);
                $pdf = $array[0].rand(0,999).'.'.$array[1];
              
                move_uploaded_file($_FILES['file']['tmp_name'],$path.$pdf);
            }else{
                $file =  $slider_edit->file;
            }

            if(isset($_POST['status'])){
                $result_old['status'] = 1;
            }



            if($test_validate==false){
                $slider_edit = json_decode($this->slider->getId($id));
                $name          = isset($_POST['name'])?$_POST['name']:$slider_edit->title;
                $status         = isset($_POST['status'])?1:0;
                $updated_at = Date("Y-m-d H:i:s");

                $path = "public/uploads/";
                $file_name_pdf = $_FILES['file']['name'];
                $array = explode('.',$file_name_pdf);
                $file = $array[0].rand(0,999).'.'.$array[1];
                move_uploaded_file($_FILES['file']['tmp_name'],$path.$file);


                $result = $this->slider->update($name,$file,$status,$updated_at,$slider_edit->id);
                if($result){
                    $list_slider = json_decode($this->slider->getList());
                    $this->view('backend/layout/master',[
                        'page'          => 'backend/slider/index',
                        'list_slider'     => $list_slider,
                        'message_success'   => "Cập nhật bài viết danh sách"
                    ]);
                    header('location: index.php?url=Slider');
                }else{
                    $message_error      = "Cập nhật danh sách không thành công";
                    $this->view('backend/layout/master',[
                        'page'           => 'backend/slider/create',
                        'message_error' => $message_error,
                        'error'         => $error,
                        'result_old'    => $result_old
                    ]);
                }
            }else{
                $message_error      = "Cập nhật danh sách không thành công";
                $this->view('backend/layout/master',[
                    'page'           => 'backend/slider/create',
                    'message_error' => $message_error,
                    'error'         => $error,
                    'result_old'    => $result_old
                ]);
            }


        }

        public function change_status(){
            $slider_id = $_GET['slider_id'];
            $slider_edit = json_decode($this->slider->getId($slider_id));
            $data = array();
            $data['slider_id'] = $slider_edit->id;
            if($slider_edit->status==0){
                $slider_edit->status = 1;
                $data['status'] = "Hiển thị";
                $data['num_status'] = 1;
            }else{
                $slider_edit->status = 0;
                $data['status'] = "Không hiển thị";
                $data['num_status'] = 0;
            }
            $updated_at     = date('Y-m-d H:i:s');
            $this->slider->update_status($slider_edit->id,$slider_edit->status,$updated_at);
            echo json_encode($data);
        }
        
    }
?>
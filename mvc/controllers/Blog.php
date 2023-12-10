<?php 
require_once('./mvc/helper/process_url.php');
    class Blog extends Controller{
        public $blogs;
        public $category_of_blogs;
        public $tags;
        public $product_image;
        public $blog_category;
        public $blog_tags;

        public function __construct(){
            $this->blogs        = $this->model('BlogModel');
            //danh muc blog
            $this->category_of_blogs   = $this->model('CategoryBlogModel');
            $this->tags         = $this->model('TagsModel');
            $this->product_image= $this->model('Product_ImageModel');
            $this->blog_category= $this->model('Blog_CategoryOfBlogModel');
            $this->blog_tags    = $this->model('Blog_TagsModel');
        }
        public function index(){
            // $list_blog = json_decode($this->blogs->getList());

            $count_blog  = json_decode($this->blogs->count_blog());
            $number_display = 6;
            $total_page_number = ceil($count_blog/$number_display);
            $process_url = new process_url();
            $is_page = json_decode($process_url->is_page($_GET['url']));
            // url chua page
            $page_index = 1;
            if($is_page){
                $page_index =  json_decode($process_url->index_page($_GET['url']));
                $start_in = ($page_index-1)*$number_display;
                $list_blog = json_decode($this->blogs->getListLimit($start_in,$number_display));
            }else{ //url khong chua page
                $start_in = 0;
                $list_blog = json_decode($this->blogs->getListLimit($start_in,$number_display));
            }

            $this->view('backend/layout/master',[
                'page'          => 'backend/blog/index',
                'list_blog'     => $list_blog,
                'total_page_number' => $total_page_number,
                'page_index'        => $page_index
            ]);
        }

        public function create(){
            $this->view('backend/layout/master',[
               'page'           => 'backend/blog/create'
            ]);
        }

        public function store(){
            //validate
            $test_validate = false;
            $error = array();
            $result_old = array();

                //3. title
            $error['title'] = array();
            if(!isset($_POST['title']) || $_POST['title']==""){
                array_push($error['title'],'Vui lòng nhập tên bài viết');
                $test_validate = true;
            }else{
                $result_old['title'] = $_POST['title'];
            }

                //Nội dung
            $error['description'] = array();
            if(!isset($_POST['description']) || $_POST['description']==""){
                array_push($error['description'],'');
                $test_validate = true;
            }else{
                $result_old['description'] = $_POST['description'];
            }

            if(isset($_POST['status'])){
                $result_old['status'] = 1;
            }
            if($test_validate == false){
                $title          = $_POST['title'];
                $description    = $_POST['description'];
                $status         = isset($_POST['status'])?1:0;
                $created_at     = date('Y-m-d H:i:s');
                $updated_at     = date('Y-m-d H:i:s');
                $id_blog = json_decode($this->blogs->insert($title,$description,$status,$created_at,$updated_at));
                if(isset($id_blog)){
                    $list_blog = json_decode($this->blogs->getList());
                    $message_success = "Tạo mới bài viết thành công";
                    $this->view('backend/layout/master',[
                        'page'          => 'backend/blog/index',
                        'list_blog'     => $list_blog,
                        'message_success'  => $message_success
                    ]);
                    header('location: index.php?url=Blog');
                }
            }else{
                $category_of_blogs  = json_decode($this->category_of_blogs->getList());
                $tags               = json_decode($this->tags->getList());
                $message_error      = "Tạo mới bài viết không thành công";
                $this->view('backend/layout/master',[
                    'page'           => 'backend/blog/create',
                    'categories'    => $category_of_blogs,
                    'tags'          => $tags,
                    'message_error' => $message_error,
                    'error'         => $error,
                    'result_old'    => $result_old
                ]);
            }
        }

        public function delete(){

            $blog_id = $_POST['blog_id'];
            $blog_delete =  json_decode($this->blogs->getId($blog_id));

            //3.Xóa blog
            $result = $this->blogs->delete($blog_id);
            if($result == 'true'){
                $list_blog = json_decode($this->blogs->getList());
                $message_success = "Bạn đã xóa thành công bài viết";
                $this->view('backend/layout/master',[
                    'page'          => 'backend/blog/index',
                    'list_blog'     => $list_blog,
                    'message_success'        => $message_success
                ]);
                header('location: index.php?url=Blog');
            }
        }

        public function edit($id){
            $blog_edit = json_decode($this->blogs->getId($id));
            $this->view('backend/layout/master',[
                'page'              => 'backend/blog/create',
                'blog_edit'         => $blog_edit
            ]);
        }

        public function update($id){
            //validate
            $test_validate = false;
            $error = array();
            $result_old = array();

            //3. title
            $error['title'] = array();
            if(!isset($_POST['title']) || $_POST['title']==""){
                array_push($error['title'],'Vui lòng nhập tên bài viết');
                $test_validate = true;
            }else{
                $result_old['title'] = $_POST['title'];
            }

            // Nội dung
            $error['description'] = array();
            if(!isset($_POST['description']) || $_POST['description']==""){
                array_push($error['description'],'');
                $test_validate = true;
            }else{
                $result_old['description'] = $_POST['description'];
            }

            if(isset($_POST['status'])){
                $result_old['status'] = 1;
            }

            if($test_validate==false){
                $blog_edit = json_decode($this->blogs->getId($id));
                $title          = isset($_POST['title'])?$_POST['title']:$blog_edit->title;
                $description    = isset($_POST['description'])?$_POST['description']:$blog_edit->description;
                $status         = isset($_POST['status'])?1:0;
                $updated_at = Date("Y-m-d H:i:s");

                $result = $this->blogs->update($title,$description,$status,$updated_at,$blog_edit->id);
                if($result){
                    $list_blog = json_decode($this->blogs->getList());
                    $this->view('backend/layout/master',[
                        'page'          => 'backend/blog/index',
                        'list_blog'     => $list_blog,
                        'message_success'   => "Cập nhật bài viết thành công"
                    ]);
                    header('location: index.php?url=Blog');
                }else{
                    $message_error      = "Cập nhật bài viết không thành công";
                    $this->view('backend/layout/master',[
                        'page'           => 'backend/blog/create',
                        'message_error' => $message_error,
                        'error'         => $error,
                        'result_old'    => $result_old
                    ]);
                }
            }else{
                $message_error      = "Cập nhật bài viết không thành công";
                $this->view('backend/layout/master',[
                    'page'           => 'backend/blog/create',
                    'message_error' => $message_error,
                    'error'         => $error,
                    'result_old'    => $result_old
                ]);
            }


        }

        public function change_status(){
            $blog_id = $_GET['blog_id'];
            $blog_edit = json_decode($this->blogs->getId($blog_id));
            $data = array();
            $data['blog_id'] = $blog_edit->id;
            if($blog_edit->status==0){
                $blog_edit->status = 1;
                $data['status'] = "Hiển thị";
                $data['num_status'] = 1;
            }else{
                $blog_edit->status = 0;
                $data['status'] = "Không hiển thị";
                $data['num_status'] = 0;
            }
            $updated_at     = date('Y-m-d H:i:s');
            $this->blogs->update_status($blog_edit->id,$blog_edit->status,$updated_at);
            echo json_encode($data);
        }
    }
?>
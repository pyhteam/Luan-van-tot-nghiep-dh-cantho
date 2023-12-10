<?php 
require_once('./mvc/helper/process_url.php');
    class User extends Controller{
        public $user;
        public function __construct(){
            $this->user = $this->model('UserModel');
        }

        // public function index(){
        //     $list_user = json_decode($this->user->getList());
        //     $count_user  = json_decode($this->user->count_user());
            
        //     $number_display = 8;
        //     $total_page_number = ceil($count_user/$number_display);
           
        //     $process_url = new process_url();
        
        //     if(!isset($_GET['url'])){
        //         $_GET['url'] = "User/index";
        //     }
        //     $is_page = json_decode($process_url->is_page($_GET['url']));
        //     $this->view('backend/layout/master',[
        //         'page'          => 'backend/User/index',
        //         'list_user' => $list_user,
        //         // 'total_page_number' => $total_page_number,
        //         // 'page_index'    => $page_index
        //     ]);
        // }
        public function index(){
            // $list_blog = json_decode($this->blogs->getList());

            $count_user  = json_decode($this->user->count_user());
            $number_display = 7;
            $total_page_number = ceil($count_user/$number_display);
            $process_url = new process_url();
            $is_page = json_decode($process_url->is_page($_GET['url']));
            // url chua page
            $page_index = 1;
            if($is_page){
                $page_index =  json_decode($process_url->index_page($_GET['url']));
                $start_in = ($page_index-1)*$number_display;
                $list_user = json_decode($this->user->getListLimit($start_in,$number_display));
            }else{ //url khong chua page
                $start_in = 0;
                $list_user = json_decode($this->user->getListLimit($start_in,$number_display));
            }

            $this->view('backend/layout/master',[
                'page'          => 'backend/user/index',
                'list_user'     => $list_user,
                'total_page_number' => $total_page_number,
                'page_index'        => $page_index
            ]);
        }



    }
    
?>
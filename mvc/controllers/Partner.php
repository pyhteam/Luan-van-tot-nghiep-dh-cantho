<?php 
require_once('./mvc/helper/process_url.php');
    class Partner extends Controller{
        public $partner;
        public function __construct(){
            $this->partner = $this->model('PartnerModel');
        }

        // public function index(){
        //     $list_partner = json_decode($this->partner->getList());
        //     $this->view('backend/layout/master',[
        //         'page'          => 'backend/Partner/index',
        //         'list_partner' => $list_partner,
        //         // 'total_page_number' => $total_page_number,
        //         // 'page_index'    => $page_index
        //     ]);
        // }

        public function index(){

            $count_partner  = json_decode($this->partner->count_partner());
            $number_display = 7;
            $total_page_number = ceil($count_partner/$number_display);
            $process_url = new process_url();
            $is_page = json_decode($process_url->is_page($_GET['url']));
            // url chua page
            $page_index = 1;
            if($is_page){
                $page_index =  json_decode($process_url->index_page($_GET['url']));
                $start_in = ($page_index-1)*$number_display;
                $list_partner = json_decode($this->partner->getListLimit($start_in,$number_display));
            }else{ //url khong chua page
                $start_in = 0;
                $list_partner = json_decode($this->partner->getListLimit($start_in,$number_display));
            }

            $this->view('backend/layout/master',[
                'page'          => 'backend/partner/index',
                'list_partner'     => $list_partner,
                'total_page_number' => $total_page_number,
                'page_index'        => $page_index
            ]);
        }



        
    }
?>
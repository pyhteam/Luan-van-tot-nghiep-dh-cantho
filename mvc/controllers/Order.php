<?php
require_once('./mvc/helper/process_url.php');
require_once('./mvc/helper/MailHelper.php');
// require 'vendor/autoload.php';

use Dompdf\Dompdf;
use FontLib\Table\Type\head;
use Helper\SendMail;

class Order extends Controller
{
    public $slider;
    public $product;
    public $category;
    public $blog;
    public $categoryofblog;
    public $tags;
    public $blog_categoryofblog;
    public $blog_tags;
    public $order;
    public $order_detail;

    public function __construct()
    {
        $this->slider = $this->model('SliderModel');
        $this->product = $this->model('ProductModel');
        $this->category = $this->model('CategoryModel');
        $this->blog = $this->model('BlogModel');
        $this->categoryofblog = $this->model('CategoryBlogModel');
        $this->tags = $this->model('TagsModel');
        $this->blog_categoryofblog = $this->model('Blog_CategoryOfBlogModel');
        $this->blog_tags = $this->model('Blog_TagsModel');
        $this->order = $this->model('OrderModel');
        $this->order_detail = $this->model('Order_DetailModel');
    }

    public function index()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        // echo json_encode($list_order);
        // die();

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    // public function getOrdersWithStatusZero() {
    //     // Gọi phương thức trong Model để truy vấn CSDL
    //     $orders =$this->order->getOrdersByStatus(0);

    // }
    public function hoc_bong()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_hocbong($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_hocbong($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        // echo json_encode($list_order);
        // die();

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function hoc_bong_khong()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_hocbong_khong($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_hocbong_khong($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        // echo json_encode($list_order);
        // die();

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function av_b1()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_av_b1($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_av_b1($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        // echo json_encode($list_order);
        // die();

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function av_toeic()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_av_toeic($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_av_toeic($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        // echo json_encode($list_order);
        // die();

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function av_ielts()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_av_ielts($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_av_ielts($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function nckh_0()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_nckh_0($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_nckh_0($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function nckh_1()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_nckh_1($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_nckh_1($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function nckh_2()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_nckh_2($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_nckh_2($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function nckh_3()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_nckh_3($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_nckh_3($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function hinh_thuc_0()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_hinh_thuc_0($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_hinh_thuc_0($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function hinh_thuc_1()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_hinh_thuc_1($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_hinh_thuc_1($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }
        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function status()
    {
        // $list_order = json_decode($this->order->getList(),true);

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_status0($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_status0($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    public function status1()
    {

        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_status1($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_status1($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }

    // filter 
    public function filter()
    {
        // check medthod GET
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = [
                'hoc_bong' => $_POST['hoc_bong'],
                'av' => $_POST['av'],
                'nckh' => $_POST['nckh'],
                'hinh_thuc' => $_POST['hinh_thuc'],
                'status' => $_POST['status'],
            ];
            $orders  = $this->order->filter($params);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'items' => $orders
            ]);
        }
    }



    public function status2()
    {


        $count_order  = json_decode($this->order->count_order());
        $number_display = 6;
        $total_page_number = ceil($count_order / $number_display);
        $process_url = new process_url();
        $is_page = json_decode($process_url->is_page($_GET['url']));
        // url chua page
        $page_index = 1;
        if ($is_page) {
            $page_index =  json_decode($process_url->index_page($_GET['url']));
            $start_in = ($page_index - 1) * $number_display;
            $list_order = json_decode($this->order->getListLimit_status2($start_in, $number_display), true);
        } else { //url khong chua page
            $start_in = 0;
            $list_order = json_decode($this->order->getListLimit_status2($start_in, $number_display), true);
        }

        foreach ($list_order as $key => $order) {
            $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order['id']), true);
            $list_order[$key]['order_detail'] = $list_order_detail;
        }

        $this->view('backend/layout/master', [
            'page'          => 'backend/Order/index',
            'list_order' => $list_order,
            'total_page_number' => $total_page_number,
            'page_index'    => $page_index
        ]);
    }


    public function change_status()
    {
        $order_id = $_GET['order_id'];
        $result = json_decode($this->order->update_status($order_id));
        $data['order_id'] = $order_id;
        $data['string_status'] = "Đã thêm vào danh sách";

        // send mail
        $order = json_decode($this->order->getId($order_id));
        $mail = new SendMail();
        $template = 'resources/template-mail/OrderConfirmation.html';
        $to = $order->email;
        $subject = 'Đăng ký tham gia của bạn đã được xác nhận';
        $templateData = [
            'name' => $order->full_name,
            'link' => 'http://' . $_SERVER['HTTP_HOST'] . '/index.php?url=Order/confirm&order_id=' . $order_id
        ];
        $mail->sendEmailWithTemplate($to, $subject, $template, $templateData);

        echo json_encode($data);
    }
    // User confirm order
    public function confirm()
    {
        $order_id = $_GET['order_id'];
        $result = json_decode($this->order->update_status_nhan_hang($order_id));

        // send mail
        $order = json_decode($this->order->getId($order_id));
        $mail = new SendMail();
        $template = 'resources/template-mail/ThankYou.html';
        $to = $order->email;
        $subject = 'Đăng ký tham gia của bạn đã được xác nhận';
        $templateData = [
            'name' => $order->full_name
        ];
        $mail->sendEmailWithTemplate($to, $subject, $template, $templateData);

        return $this->view('frontend/layout/master', [
            'page'          => 'frontend/Order/confirm',
            'order_id' => $order_id,
        ]);
    }

    public function change_status_nhan_hang()
    {
        $order_id = $_GET['order_id'];
        $result = json_decode($this->order->update_status_nhan_hang($order_id));
        $data['order_id'] = $order_id;
        $data['string_status'] = "SV đã xác nhận";
        echo json_encode($data);
    }

    //Thêm cái filter



    //**************** */
    public function print_order($order_id)
    {
        $order = json_decode($this->order->getId($order_id));
        $list_order_detail = json_decode($this->order_detail->getList_by_orderid($order_id));

        // $total = 0;
        //   foreach($list_order_detail as $order_detail){
        //     $total += (int)$order_detail->pro_quantity*(int)$order_detail->pro_price;
        //   }
        //   echo $total;
        //   die();

        // instantiate and use the dompdf class


        // $options = new Options();
        // $options->set('defaultFont', 'Courier');
        // $dompdf = new Dompdf($options);
        $dompdf = new Dompdf();
        $html = '<!DOCTYPE html>
        <html>
        <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
          body { font-family: DejaVu Sans, sans-serif; }
        </style>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                
                
        <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
        </head>
        <body>
        
        <h1 style="text-align: center">Order</h1>
        <p>Họ và tên: ' . $order->full_name . '</p>
        <p>Lớp: ' . $order->ma_lop . '</p>
        <p>Ngành học: ' . $order->nganh . '</p>
        <p>Ngày sinh: ' . $order->ngay_sinh . '</p>
        <p>Số điện thoại: ' . $order->phone . '</p>
        <p>Email: ' . $order->email . '</p>
        <p>Địa chỉ: ' . $order->address_detail . ', ' . $order->district . ', ' . $order->conscious . ', ' . $order->country . '</p>
        <p>Thời gian đăng ký: ' . $order->created_at . '</p>
        
        <table>
          <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>';
        $total = 0;
        foreach ($list_order_detail as $order_detail) {
            $total += (int)$order_detail->pro_quantity * (int)$order_detail->pro_price;
            $html .= '<tr>
                <td>' . $order_detail->pro_name . '</td>
                <td>' . $order_detail->pro_quantity . '</td>
                <td>' . number_format($order_detail->pro_price) . 'vnd</td>
              </tr>';
        }

        $html .= '</table>
          <h2 style="float: right">Total Price: ' . number_format($total) . 'vnd<h2>
          
          </body>
          </html>';

        // $dompdf->loadHtml($html,'UTF-8');
        $dompdf->load_html($html, 'UTF-8');
        $dompdf->set_paper('A4');
        $dompdf->render();

        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

        exit(0);
    }

    public function review_search()
    {
        $search_key = $_GET['search_key'];
        $list_order_need_find = json_decode($this->order->list_order_need_find($search_key)); // Thay đổi tên hàm và table ở đây
        $html = "";
        foreach ($list_order_need_find as $order) { // Thay đổi biến $product thành $order ở đây
            $html .= '<li style="display:block;" class="mt-3">
                <a style="color: #000 !important" href="index.php?url=Home/order_detail/' . $order->id . '">
                    <img height="50" width="50" class="float-left mr-3" src="./public/uploads/' . $order->image[0] . '" alt="">
                </a>
                <span>
                    <a style="color: #b19361; font-size: 14px;text-decoration: none" href="index.php?url=Home/order_detail/' . $order->id . '" class="">' . $order->name . '</a>
                    <br>
                    <span class="info_search_item">' . $order->created_at . '</span>
                </span>
            </li>';
        }
        echo $html;
    }


    public function search_order()
    {
        $search_key = $_POST['search_key'];
        $total_cart = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart) {
                $total_cart += $cart['quatity'];
            }
        }
        $list_order = json_decode($this->order->list_order_need_find($search_key));

        $this->view('frontend/layout/master', [
            'page'                  => 'backend/Order/index',
            'list_order'          => $list_order,
            'total_cart'            => $total_cart,
            'message_success'       => 'Kết quả tìm kiếm "' . $search_key . '"',
        ]);
    }
}

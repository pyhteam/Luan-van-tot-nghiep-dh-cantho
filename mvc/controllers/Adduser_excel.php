<?php
require_once('./mvc/helper/MailHelper.php');
require_once('./mvc/helper/ExcelHelper.php');

use Helper\ExcelHelper;

class Adduser_excel extends Controller
{
    public $user;
    public $slider;
    public $product;
    public $category;
    public $blog;
    public $categoryofblog;
    public $tags;
    public $blog_categoryofblog;
    public $blog_tags;
    public function __construct()
    {
        $this->user = $this->model('UserModel');
        $this->slider = $this->model('SliderModel');
        $this->product = $this->model('ProductModel');
        $this->category = $this->model('CategoryModel');
        $this->blog = $this->model('BlogModel');
        $this->categoryofblog = $this->model('CategoryBlogModel');
        $this->tags = $this->model('TagsModel');
        $this->blog_categoryofblog = $this->model('Blog_CategoryOfBlogModel');
        $this->blog_tags = $this->model('Blog_TagsModel');
    }

    public function index()
    {
        $this->view('backend/adduser_excel/index');
    }

    public function importExcel()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            echo  json_encode(['message' => 'Method not allowed']);
            die();
        }

        if (isset($_FILES['file'])) {
            $fileInfo = $_FILES['file'];
            // Check if there is no upload error
            if ($fileInfo['error'] === UPLOAD_ERR_OK) {
                // Create an SplFileInfo object from the uploaded file
                $uploadedFile = new SplFileInfo($fileInfo['tmp_name']);
                $excelHelper = new ExcelHelper($uploadedFile);
                $dataList = $excelHelper->readExcel();

                // Return the data as JSON
                if (count($dataList) > 0) {

                    $data = [];
                    $errors = [];
                    foreach ($dataList as $item) {
                        $username =  explode('@', $item->email)[0];
                        $userExist = $this->user->getByUsername($username);
                        if ($userExist != null) {
                            array_push($errors, $username);
                            continue;
                        }

                        $user = [
                            'user_name' => $username,
                            'email' => $item->email,
                            'phone' => $item->phone,
                            'created_at' => date('Y-m-d H:i:s'),
                            'ma_lop' => $item->ma_lop,
                            'nganh' => $item->nganh,
                            'ngay_sinh' => $item->ngay_sinh,
                            'khoa' => $item->khoa,
                            'password' => md5($item->password),
                        ];
                        array_push($data, $user);
                    }

                    if (count($errors) > 0) {
                        echo json_encode(
                            [
                                'success' => false,
                                'message' => 'File uploaded successfully',
                                'errors' => $errors
                            ]
                        );
                    } else {
                        $result = $this->user->addRange($data);
                        if ($result) {
                            echo json_encode(
                                [
                                    'success' => true,
                                    'message' => 'File uploaded successfully'
                                ]
                            );
                        }
                    }
                }
            }
        } else {
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'File uploaded failed'
                ]
            );
        }
    }
}

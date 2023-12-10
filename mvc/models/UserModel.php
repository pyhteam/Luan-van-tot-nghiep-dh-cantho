<?php
class UserModel extends DB{
    public function insert($user_name,$full_name,$email,$phone,$country,$conscious,$district,$commune,$address_detail,$password,$created_at,$updated_at,$ma_lop,$nganh,$ngay_sinh,$khoa){
        $query= "INSERT INTO user values ('','$user_name','$full_name','$email','$phone','$country','$conscious','$district','$commune','$address_detail','$password','$created_at','$updated_at',null,'$ma_lop','$nganh','$ngay_sinh','$khoa')";
       
        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return json_encode($result);
    }

    public function getByUsername($username){
        $query = "SELECT * FROM user WHERE user_name = '$username'";
        $result = $this->con->query($query);
        $row = null;
        if($result->rowCount() > 0){
            $row = $result->fetch();
        }
        return  $row;
    }

    public function addRange($data){
        $columns = implode(", ", array_keys((array)$data[0]));
        
        $values = [];
        foreach ($data as $row) {
            $values[] = "('" . implode("', '", array_values((array)$row)) . "')";
        }
        $values = implode(", ", $values);
        
        $query = "INSERT INTO user ($columns) VALUES $values";

        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return $result;
    }
    public function test_login($email,$password){
        $query = "SELECT * FROM user where email='$email' AND password = '$password'";
        $result = false;
        $kq = $this->con->query($query);
        if($kq->rowCount() > 0){
            $result = $kq->fetch();
        }
        return json_encode($result);
    }

    public function getList(){
        $query = "SELECT * FROM user";
        $result = $this->con->query($query);
        $arr = array();
        if($result->rowCount() >0){
            while($row = $result->fetch()){
                array_push($arr,$row);
            }
        }
        return json_encode($arr);
    }

    public function getId($id){
        $query = "SELECT * FROM user WHERE id = '$id'";
        $result = $this->con->query($query);
        if($result->rowCount() > 0){
            $row = $result->fetch();
        }
        return json_encode($row);
        
    }

    public function update($user_name,$full_name,$email,$phone,$country,$conscious,$district,$commune,$address_detail,$updated_at,$image,$ngay_sinh,$id){
        $query = "UPDATE user SET user_name='$user_name', full_name='$full_name',email='$email',phone='$phone',country='$country',conscious='$conscious', district='$district',commune='$commune',address_detail='$address_detail', updated_at='$updated_at',image = '$image', ngay_sinh = '$ngay_sinh' WHERE id = '$id'";
        // echo json_encode($query);
        // die();
        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return json_encode($result);
    }

    public function count_user(){
        $query = "SELECT * from user";
        $result = $this->con->query($query);
        return json_encode($result->rowCount());
    }

    public function getList_limit(){
        $query = 'SELECT * FROM user order by updated_at DESC LIMIT 8';
        $result = $this->con->query($query);
        $arr = array();
        if($result->rowCount()){
            while($row_user_item = $result->fetch()){
                $user_id = $row_user_item['id'];
                array_push($arr,$row_user_item);
            }
        }
        return json_encode($arr);
    }

    public function getListLimit($start_in,$number_display){
        $query = "SELECT * FROM user order by updated_at DESC limit $start_in,$number_display";
       
        $result = $this->con->query($query);
        $arr = array();
        if($result->rowCount() > 0){
            while($row_user_item = $result->fetch()){
                $user_id = $row_user_item['id'];
                array_push($arr,$row_user_item);
            }
        }
        return  json_encode($arr);
    }

}

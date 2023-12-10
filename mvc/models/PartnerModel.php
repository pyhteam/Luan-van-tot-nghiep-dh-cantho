<?php
class PartnerModel extends DB{
    public function insert($user_name,$name,$email,$password,$country,$created_at,$updated_at,$address_detail){
        $query= "INSERT INTO partner values ('','$user_name','$name','$email','$password','$country',null,'$created_at','$updated_at','$address_detail')";
    //    echo $query;
    //    die();
        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return json_encode($result);
    }

    public function test_login($email,$password){
        $query = "SELECT * FROM partner where email='$email' AND password = '$password'";
        $result = false;
        $kq = $this->con->query($query);
        if($kq->rowCount() > 0){
            $result = $kq->fetch();
        }
        return json_encode($result);
    }

    public function getList(){
        $query = "SELECT * FROM partner";
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
        $query = "SELECT * FROM partner WHERE id = '$id'";
        $result = $this->con->query($query);
        if($result->rowCount() > 0){
            $row = $result->fetch();
        }
        return json_encode($row);
        
    }

    public function update($user_name,$name,$email,$country,$image,$updated_at,$address_detail,$id){
        $query = "UPDATE partner SET user_name='$user_name', name='$name',email='$email',country='$country',image = '$image', updated_at='$updated_at', address_detail='$address_detail' WHERE id = '$id'";
        $result = false;
        if($this->con->query($query)){
            $result = true;
        }
        return json_encode($result);
    }

    public function count_partner(){
        $query = "SELECT * from partner";
        $result = $this->con->query($query);
        return json_encode($result->rowCount());
    }

    public function getList_limit(){
        $query = 'SELECT * FROM partner order by updated_at DESC LIMIT 8';
        $result = $this->con->query($query);
        $arr = array();
        if($result->rowCount()){
            while($row_partner_item = $result->fetch()){
                $partner_id = $row_partner_item['id'];
                array_push($arr,$row_partner_item);
            }
        }
        return json_encode($arr);
    }

    public function getListLimit($start_in,$number_display){
        $query = "SELECT * FROM partner order by updated_at DESC limit $start_in,$number_display";
       
        $result = $this->con->query($query);
        $arr = array();
        if($result->rowCount() > 0){
            while($row_partner_item = $result->fetch()){
                $partner_id = $row_partner_item['id'];
                array_push($arr,$row_partner_item);
            }
        }
        return  json_encode($arr);
    }
}

<?php
class SliderModel extends DB
{
    public function getList($isActive = null)
    {

        if ($isActive != null) {
            $query = "SELECT * FROM slider WHERE status = $isActive order by updated_at DESC";
        } else {

            $query = "SELECT * FROM slider order by updated_at DESC";
        }
        $result = $this->con->query($query);
        $arr = array();
        if ($result->rowCount() > 0) {
            while ($row_slider_item = $result->fetch()) {
                $slider_id = $row_slider_item['id'];
                array_push($arr, $row_slider_item);
            }
        }
        return json_encode($arr);
    }

    public function getList_limit()
    {
        $query = 'SELECT * FROM slider order by updated_at DESC LIMIT 8';
        $result = $this->con->query($query);
        $arr = array();
        if ($result->rowCount()) {
            while ($row_slider_item = $result->fetch()) {
                $slider_id = $row_slider_item['id'];
                array_push($arr, $row_slider_item);
            }
        }
        return json_encode($arr);
    }

    public function insert($name, $file, $status, $created_at, $updated_at)
    {
        $query = "INSERT INTO slider VALUES ('','$name','$file','$status','$created_at','$updated_at')";
        $result = false;
        if ($this->con->query($query)) {
            $result = true;
        }
        return $result;
        // $id_slider = $this->con->lastInsertId();
        // return json_encode($id_slider);

    }

    public function getId($id)
    {
        $query = "SELECT * FROM slider WHERE id = '$id'";
        $result = $this->con->query($query);
        $row = array();
        if ($result->rowCount()) {
            $row = $result->fetch();
        }
        return json_encode($row);
    }



    public function delete($id)
    {
        $query = "DELETE FROM slider WHERE id = '$id'";
        $result = false;
        if ($this->con->query($query)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function update_status($id, $status, $updated_at)
    {
        $query = "UPDATE slider SET status = '$status',updated_at = '$updated_at' WHERE id = '$id'";
        $this->con->query($query);
    }

    public function update($name, $file, $status, $updated_at, $id)
    {
        $query = "UPDATE slider SET name ='$name', file ='$file', status='$status',updated_at='$updated_at' WHERE id = '$id'";
        $result = $this->con->query($query);
        return json_encode($result);
    }

    public function count_slider()
    {
        $query = "SELECT * from slider";
        $result = $this->con->query($query);
        return json_encode($result->rowCount());
    }

    public function getListLimit($start_in, $number_display, $isActive = null)
    {
        if ($isActive != null) {
            $query = "SELECT * FROM slider WHERE status = $isActive order by updated_at DESC limit $start_in,$number_display";
        } else
            $query = "SELECT * FROM slider order by updated_at DESC limit $start_in,$number_display";
       

        $result = $this->con->query($query);
        $arr = array();
        if ($result->rowCount() > 0) {
            while ($row_slider_item = $result->fetch()) {
                $slider_id = $row_slider_item['id'];
                array_push($arr, $row_slider_item);
            }
        }
        return  json_encode($arr);
    }
}

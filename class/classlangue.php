<?php
    include __DIR__ . '/../connection/connect.php';

class langue {

    public function createLangue($name,$translate){
        global $conn;
        $request_insert = "INSERT INTO `langue` (`name`,`translate`) VALUES ('" . $name . "','" . $translate . "')";
        $conn->query($request_insert);
    }

    
    public function getAllLangue(){
        global $conn;

        // je récupère liste manga
        $request_all = "SELECT * FROM `langue`";
        $get_all_langue = $conn->query($request_all);

        return $get_all_langue;
    }

    public function deleteLangue($id){
        global $conn;

        $delete_langue_request = "DELETE FROM `langue` WHERE id=".$id;
        $conn->query($delete_langue_request);
    }

    public function updateLangue($id,$name,$translate){
        global $conn;
        $update = "UPDATE `langue` SET `name`='".$name."',`translate`='".$translate."' WHERE `id`=".$id;
        $conn->query($update);
    }

}
?>
<?php
require_once 'Koneksi.php';

function generateId($koneksi, $table, $column){
    try{
        $sql = "SELECT MAX($column) AS max_id FROM $table";
        $stmt = $koneksi->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $max_id = $result['max_id'];
        if($max_id === null){
            return 1;
        }else{
            return $max_id + 1;
        }
    }catch(PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

function getById($koneksi, $table, $column, $id){
    try{
        $sql = "SELECT * FROM $table WHERE $column = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

function insertData($koneksi, $table, $data){
    try{
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute(array_values($data));
        return true;
    }catch(PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

function updateData($koneksi, $table, $data, $id_column, $id_value){
    try{
        $columns = implode(" = ?, ", array_keys($data)) . " = ?";
        $sql = "UPDATE $table SET $columns WHERE $id_column = ?";
        $stmt = $koneksi->prepare($sql);
        $data_values = array_values($data);
        $data_values[] = $id_value;
        $stmt->execute($data_values);
        return true;
    }catch(PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

function deleteData($koneksi, $table, $column, $id){
    try{
        $sql = "DELETE FROM $table WHERE $column = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }catch(PDOException $e){
        return "Error: " . $e->getMessage();
    }
}

function getData($koneksi, $table){
    try{
        $sql = "SELECT * FROM $table";
        $stmt = $koneksi->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return "Error: " . $e->getMessage();
    }
}
?>
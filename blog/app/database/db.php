<?php

session_start();
//database connection functions  CRUD
// so here we are interacting with the databse we need conn object
require('connect.php');

//for printing
function dd($value){
    echo "<pre>",print_r($value,true),"</pre>";
    die();
}

//for executin  data is conditions here
function executeQuery($sql, $data)
{
     global $conn;
    $stnt = $conn->prepare($sql);
    $values=array_values($data);
    $types = str_repeat("s",count($values));
    // $stnt->bind_param( $types,$admin,$username);
    // $stnt->bind_param( $types,[$admin,$username]);
    $stnt->bind_param( $types, ...$values);
    $stnt->execute();
     return $stnt;
}

//select all
function selectAll($table ,$conditions=[])
{
global $conn;
$sql = "SELECT * FROM $table";

if(empty($conditions))
 {
        $stnt = $conn->prepare($sql);
        $stnt->execute();
        $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
}
else{
    //return records that matches the conditions
     // $sql= "SELECT * FROM $table WHERE username='sunshine' AND admin=1"; but to change dynamically
     $i=0;
    foreach($conditions as $key => $value){
        if($i==0){
            $sql=$sql . " WHERE $key=?";
        }
        else{
            $sql=$sql . " AND $key=?";
        }
        $i++;
    }
    // dd($sql);
         $stnt=executeQuery($sql,$conditions);
        $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
}

}

//select one
function selectOne($table ,$conditions)
{
global $conn;
$sql = "SELECT * FROM $table";

 
    //return records that matches the conditions
     // $sql= "SELECT * FROM $table WHERE username='sunshine' AND admin=1"; but to change dynamically
     $i=0;
    foreach($conditions as $key => $value){
        if($i==0){
            $sql=$sql . " WHERE $key=?";
        }
        else{
            $sql=$sql . " AND $key=?";
        }
        $i++;
    }

    // limit 1
    $sql=$sql ." LIMIT 1";
    // dd($sql);

    $stnt=executeQuery($sql,$conditions);
        $records = $stnt->get_result()->fetch_assoc();
        return $records;

}

// $conditions =[
//     'admin'=>0,
//     'username'=>"sam"
// ];

// $users =selectOne('users',$conditions);
// dd($users);


//create

function create($table, $data){
    global $conn;
     // $sql = "INSERT into users (username ,admin ,email ,password) VALUES (?,?,?,?) "
    // $sql = "INSERT into users SET username=?,admin=?,email=?,password=?"
    $sql = "INSERT INTO $table SET ";
    $i=0;
    foreach($data as $key => $value){
        if($i==0){
            $sql=$sql . " $key=?";
        }
        else{
            $sql=$sql . ", $key=?";
        }
        $i++;
    }
//    dd($sql);
   $stnt=executeQuery($sql, $data);
   $id = $stnt->insert_id;
   return $id;

}
 
// $data =[ 
//     'username'=>"chay",
//     'admin'=>0,
//     'email'=>"chay@gmail.com",
//     'password'=>"chay"
// ];

//  $id=create('users',$data);
//  dd($id);
 
//UPDATE
function update($table,$id, $data){
    global $conn;
     // $sql = "INSERT into users (username ,admin ,email ,password) VALUES (?,?,?,?) "
    // $sql = "INSERT into users SET username=?,admin=?,email=?,password=?"
    $sql = "UPDATE $table SET ";
    $i=0;
    foreach($data as $key => $value){
        if($i===0){
            $sql=$sql . " $key=?";
        }
        else{
            $sql=$sql . ", $key=?";
        }
        $i++;
    }
 $sql = $sql . " WHERE id=?";
 $data['id']=$id;
 $stnt =executeQuery($sql,$data);
 return $stnt->affected_rows;

}



function delete($table,$id ){
    global $conn;
    
    // $sql = "UPDATE users SET username=?,admin=?,email=?,password=?"
    $sql = "DELETE FROM $table WHERE id=?";
    
     
//    dd($sql);
 
   $stnt=executeQuery($sql,['id'=> $id]);
 
   return $stnt->affected_rows;

}



function getPublishedPosts(){
    global $conn;
    
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id =u.id WHERE p.published=? ORDER BY p.created_at DESC";

    $stnt=executeQuery($sql,['published'=> 1]);
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function get_posts_with_username(){
    global $conn;
    
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id =u.id  ORDER BY p.created_at DESC";

    $stnt = $conn->prepare($sql);
    $stnt->execute();
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}



function getPostsByTopicId($topic_id){
    global $conn;
    
    $sql = "SELECT P.*, u.username FROM posts AS p JOIN users AS u ON p.user_id =u.id WHERE p.published=? AND topic_id=? ORDER BY p.created_at DESC";

    $stnt=executeQuery($sql,['published'=> 1,'topic_id' => $topic_id]);
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function searchPosts($term){
    $match = '%' . $term . '%';
    global $conn;
$sql = "SELECT 
    p.*, u.username 
    FROM posts AS p 
    JOIN users AS u 
    ON p.user_id =u.id 
    WHERE p.published=?
    AND p.title LIKE ? OR p.body LIKE ?
    ORDER BY p.created_at DESC ";

    $stnt=executeQuery($sql,['published'=> 1,'title' =>$match ,'body' => $match]);
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
 





 
 

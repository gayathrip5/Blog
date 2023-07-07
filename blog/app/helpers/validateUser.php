<?php
function validateUser($user)
{
    
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, "username is required");
    }
    if(empty($user['email'])){
        array_push($errors, "email is required");
    }
    if(empty($user['password'])){
        array_push($errors, "password is required");
    }
    
    if( $user['passwordConf']!==$_POST['password']){
        array_push($errors, "password do not matchs");
    }

    // $existingUser = selectOne('users',['email'=>$user['email']]);
    // if($existingUser){
    //     array_push($errors, "email already exists"); 
    // }
    $existingUser = selectOne('users',['email'=>$user['email']]);
    if($existingUser){
    if(isset($user['update-user']) && $existingUser['id']!=$user['id']){
        array_push($errors, " email already exists"); 
    }
    if(isset($user['create-admin'])){
        array_push($errors, " email already exists");   
    }
    }
  

 return $errors;   
}

function validateLogin($user)
{
    
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, "username is required");
    }
     
    if(empty($user['password'])){
        array_push($errors, "password is required");
    }
    
     
 return $errors;   
}
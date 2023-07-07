<?php
function validateTopic($topic)
{
    
    $errors = array();

    if(empty($topic['name'])){
        array_push($errors, "name is required");
    }
//  $existingTopic = selectOne('topics',['name'=>$topic['name']]);
//     if($existingTopic){
//         array_push($errors, "name already exists"); 
//     }



$existingTopic = selectOne('topics',['name'=>$post['name']]);
if($existingTopic){
    if(isset($post['update-topic']) && $existingTopic['id']!=$post['id']){
        array_push($errors, " name already exists"); 
    }
    if(isset($post['add-topic'])){
        array_push($errors, " name already exists");   
    }
    }


 return $errors;   
}

?>
 
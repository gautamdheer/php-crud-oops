<?php
include 'Database.php';
$obj = new Database();

echo "Insert id:-";
print_r($obj->getResult());

if(isset($_POST['submit'])){
   
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    
    if(!empty($name) || !empty($age) || !empty($city)){
        $obj->insert('students',['student_name'=>$name,'age'=>$age,'city'=>$city]);
        echo "Data Inserted";
    }
    else{
        echo "Please fill the required fields";
    }


}
else{

}


?>

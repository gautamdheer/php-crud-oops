<?php
include "Database.php";

$obj = new Database();

// $obj->insert('students', ['student_name'=>'Vishal Dheer','age'=>'28','city'=>'USA']);
// echo "Insert id:-";
// print_r($obj->getResult());

// $obj->update('students', ['student_name'=>'Test User 2','age'=>'40','city'=>'London'],'city = "london"');
// echo "<br>Updated id:-";
// print_r($obj->getResult());

// $obj->delete('students','city = "London"');
// echo "<br>Deleted id:-";
// print_r($obj->getResult());

$obj->sql("Select * from students");
echo "show all data :-";
echo "<pre>";
print_r($obj->getResult());
echo "<pre>";
?>

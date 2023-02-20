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

// $obj->sql("Select * from students");
// echo "show all data :-";
// echo "<pre>";
// print_r($obj->getResult());
// echo "<pre>";

$obj->select('students','*',null,null,null,2);

echo "<br><br>";
echo "SQL result :-";
$result = $obj->getResult();
echo "<pre>";
print_r($result);
echo "</pre>";

echo $obj->pagination('students',null,null,2);

?>
<style>
ul{display:flex; list-style: none;}
ul li {width:30px;height:30px;background-color:#ccc;color:#000; display:flex;justify-content: center;align-items:center;margin:2px;}
ul li a{color:#000;text-decoration:none;font-size: 15px;}
</style>
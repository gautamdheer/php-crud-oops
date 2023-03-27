<?php
include "Database.php";

$obj = new Database();
$columName = "id, student_name, age, city";
$limit = 2;

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

$obj->select('students',$columName,null,null,null,$limit);

echo "<br><br>";
echo "SQL result :-";
$result = $obj->getResult();

// echo "<pre>";print_r($result); echo "</pre>";

echo $obj->pagination('students',null,null,$limit);

?>
<style>
  ul{display:flex; list-style: none;}
  ul li {width:30px;height:30px;background-color:#ccc;color:#000; display:flex;justify-content: center;align-items:center;margin:2px;}
  ul li a{color:#000;text-decoration:none;font-size: 15px;}

  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

</style>
<table>
      <h1>Student Information</h1>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
      </tr>
      <?php  
        foreach($result as list("id"=>$id,"student_name"=>$name,"age"=>$age,"city"=>$city)){  ?>  
      <tr>
        <td width="300"><?php echo $name; ?></td>
        <td width="300"><?php echo $age; ?></td>
        <td width="300"><?php echo $city; ?></td>
      </tr>
      <?php } ?> 
</table>
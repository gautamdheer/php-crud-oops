<?php 

include 'Database.php';
$obj = new Database();
 

$result = $obj->select('students','id, city',null,null,null,null);

$result = $obj->getResult();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form </title>
 <style>
    .container {
        max-width: 1000px;
        margin: auto;
    }

    .row {
        display: flex;
        justify-content: center;
        max-width: 100%;
    }

    form {
        width: 100%;
    }

    input,
    select {
        display: block;
        margin-bottom: 40px;
        line-height: 1.5;
    }
 </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="save.php" method="post">
                <label for="name">Name</label>
                <input type="text" name="name">

                <label for="age">Age</label>
                <input type="text" name="age">

                <label for="name">City</label>
                <select name="city" id="city">
                    <?php foreach($result as list('id'=>$id,'city'=>$city)){ ?>
                    <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="submit" value="Save">

            </form>
        </div>
    </div>
</body>

</html>
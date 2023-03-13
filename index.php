<?php
   include('connect.php');

   if(isset($_POST['submit'])){

         $name = $_POST['name'];
         $email = $_POST['email'];
         $mobile = $_POST['mobile'];
         $gender = $_POST['gender'];
         $state = $_POST['state'];
         $query = "INSERT INTO users (name, email, mobile, gender, state) values ('$name','$email','$mobile','$gender','$state')";
         $result = mysqli_query($conn,$query);
         if($result){
            echo "<script>
                    alert('Registration successfully done');
                    window.location.href = 'display.php';
                </script>";
         }else{
            echo "<script>alert('Registration failed');</script>";
         }
   }


   if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query2 = "SELECT * FROM users WHERE id = '$id'";
        $result2 = mysqli_query($conn,$query2);
        $data = mysqli_fetch_object($result2);
   }

   if(isset($_POST['update'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $state = $_POST['state'];
        $query = "UPDATE `users` SET `name`='$name',`email`='$email',`mobile`='$mobile',`gender`='$gender',`state`='$state' WHERE `id` = '$id'";
        $result = mysqli_query($conn,$query);
        if($result){
        echo "<script>
                alert('Registration updeted successfully done');
                window.location.href = 'display.php';
            </script>";
        }else{
        echo "<script>alert('Registration updated failed');</script>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3><u>USER</u> REGISTRATION <a href="display.php" class="btn btn-info pull-right">Records</a></h3>
        <form method="post" class="mt-3">
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Name</b></label>
                <input type="text" class="form-control" placeholder="ENTER YOUR NAME" name="name" value="<?php if(isset($data)) { echo $data->name; } ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Email</b></label>
                <input type="email" class="form-control" placeholder="ENTER YOUR EMAIL" name="email" value="<?php if(isset($data)) { echo $data->email; } ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Mobile</b></label>
                <input type="text" class="form-control" placeholder="ENTER YOUR MOBILE NUMBER" name="mobile" value="<?php if(isset($data)) { echo $data->mobile; } ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Gender</b></label>
                <input type="text" class="form-control" placeholder="ENTER YOUR GENDER" name="gender" value="<?php if(isset($data)) { echo $data->gender; } ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><b>State</b></label>
                <select name="state" id="state" class="form-control" required>
                    <option value="">SELECT STATE</option>
                    <option value="Chhattisgarh" <?php if(isset($data) && ($data->state == 'Chhattisgarh')){ echo "selected"; }?> >Chhattisgarh</option>
                    <option value="Madhya Pardesh" <?php if(isset($data) && ($data->state == 'Madhya Pardesh')){ echo "selected"; }?>>Madhya Pardesh</option>
                    <option value="Delhi" <?php if(isset($data) && ($data->state == 'Delhi')){ echo "selected"; }?>>Delhi</option>
                    <option value="Gujrat" <?php if(isset($data) && ($data->state == 'Gujrat')){ echo "selected"; }?>>Gujrat</option>
                    <option value="Odisha" <?php if(isset($data) && ($data->state == 'Odisha')){ echo "selected"; }?>>Odisha</option>
                </select>
            </div>
            <?php
                if(isset($data)){ ?>

                    <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php
                 }else{ ?>
                    <button type="submit" class="btn btn-info" name="submit">Submit</button>
                <?php
                }
            ?>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
<?php
    include('connect.php');

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query2 = "DELETE FROM `users` WHERE id = '$id'";
        $result2 = mysqli_query($conn,$query2);
        if($result2){
            echo "<script>
                    alert('Record Deleted');
                    window.location.href = 'display.php';
                </script>";
         }else{
            echo "<script>alert('Deletion failed');</script>";
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
        <h3><u>USER</u> LIST <a href="index.php" class="btn btn-info pull-right">Add Record</a></h3>
        
        <div class="table-responsive">
            <table class="table table-striped mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Gender</th>
                        <th scope="col">State</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($data = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?= $data['id'] ?></</td>
                                <td><?= $data['name'] ?></</td>
                                <td><?= $data['email'] ?></</td>
                                <td><?= $data['mobile'] ?></</td>
                                <td><?= $data['gender'] ?></</td>
                                <td><?= $data['state'] ?></</td>
                                <td>
                                <a href="index.php?id=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="display.php?id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure? You Want to Delete!');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>       
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
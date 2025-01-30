<?php
include("conn.php");
session_start();
if(isset($_POST["save"])) {

$asset_name= $_POST['asset_name'];
$category= $_POST['category'];
$purchased_date= $_POST['purchased_date'];
$location= $_POST['location'];
$condition = $_POST['condition'];
$assinged_to= $_POST['assinged_to'];
$notes= $_POST['notes'];

$sql ="INSERT INTO asset_registrationk(asset_name, category, purchased_date, location, `condition`, assinged_to, notes)
VALUES('$asset_name', '$category', '$purchased_date', '$location', '$condition', '$assinged_to', '$notes') ";

$result=mysqli_query($conn, $sql);
    if($result) {
        // echo "data saved";
        $_SESSION['status'] = "data insertd completd";
    }

else{
    // echo "error: " . mysqli_error($conn);
    $_SESSION['status'] = "data not completed" . mysqli_error($conn);
}


}


?>

 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
     
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .form-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}
.form-group {
    margin-bottom: 15px;
}
.center-input {
    display: flex;
    justify-content: center;
}
.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}
</style>
   
</head>
<body>

<?php

if(isset($_SESSION['status'])) {
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> <?php echo $_SESSION['status']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


<?php
  
    unset($_SESSION['status']);
}
?>

<div class="form-container">
    <h2>regisrtretion</h2>
    <form action="#" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input1"> asset_name</label>
                    <input type="text" class="form-control"  placeholder="Enter name " name="asset_name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input2">category</label>
                    <input type="text" class="form-control" id="input2" placeholder="Enter category " name="category">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input3"> purchased_date</label>
                    <input type="date" class="form-control"  placeholder="Enter purchased_date " name="purchased_date">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input4">location</label>
                    <select class="form-control" name="location">
                         <option value="nakhil compus">nakhil compus</option>
                        <option value="main compus">main compus </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input5">condition</label>
                    <select class="form-control" name="condition">
                <option value=" worked"> worked</option>
                <option value=" scrap"> scrap</option>
            </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="input6"> assinged_to</label>
                    <input type="text" class="form-control" id="input6" placeholder="Enter assinged_to" name="assinged_to">
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-4 center-input">
                <div class="form-group">
                    <label for="input7">Input 7</label>
                    <textarea class="form-control" name="notes" placeholder="enter notes" ></textarea>
                </div>
            </div>
        </div> 

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="save">save</button>
        </div>
    </form>
</div>


<!-- table -->

<div class="container">
<h1 class="fs-3 text-center">Table</h1>
<div class="container" id="container1">

<table class="table table-">
    <!-- table head -->
  <thead>
    <tr> <th scope="col">#</th>
        <th scope="col">Asset_name</th>
            <th scope="col">category</th>
            <th scope="col">Purchased_Date</th>
            <th scope="col">location</th>
            <th scope="col">condition</th>
            <th scope="col">Assigned_To</th>
            <th scope="col">Notes</th>
            <th scope="col">action</th>
    </tr>
  </thead>
    <!-- table body -->
  <tbody>
    <?php
  $sql = "SELECT * FROM asset_registrationk";
$result =mysqli_query($conn, $sql);
if ($result) {


while($row= mysqli_fetch_assoc($result)){
    $asset_ID=$row['asset_ID']; 
$asset_name=$row['asset_name'];
$category=$row['category'];
$purchased_date=$row['purchased_date'];
$location=$row['location'];
$condition = $row['condition'];
$assinged_to=$row['assinged_to'];
$notes=$row['notes'];


echo ' <tr>
            <td>'.$asset_ID.'</td>
            <td>'.$asset_name.'</td>
            <td>'.$category.'</td>
            <td>'.$purchased_date.'</td>
            <td>'.$location.'</td>
            <td>'.$condition.'</td>
            <td>'.$assinged_to.'</td>
            <td>'.$notes.'</td>
          <td>
            <button class="btn btn-success"> <a href="cupdate.php? asset_ID='.$asset_ID.'"class="text-light" >update</a></button>
            <button class="btn btn-danger "> <a href="delete.php? asset_ID='.$asset_ID.'" class="text-light">delete</a></button>
          </td>

          
          </tr>';
          
 }
}
?>

  </tbody>
</table>
</div>


















</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
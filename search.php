<?php
$con = mysqli_connect("localhost","root","","testing");

$query = "select * from tbl_sample";

if(isset($_GET['SearchBtn']))
{
    $query = "select * from tbl_sample where id = ".$_GET['Search'];

}
 
// if(isset($_GET['SearchBtn']))
// {
//     $searchBy = $_GET['SearchList'];
//     $search_text = $_GET['SearchTxt'];
    
//     // if($searchBy == "id")
//     // {
//     //  $query = "select * from tbl_sample where id = '$search_text'";   
//     // }
//     // else if($searchBy == "first_name")
//     // {
//     //  $query = "SELECT * from tbl_sample WHERE name LIKE '%$search_text%'";   
//     // }
//     // else if($searchBy == "last_name")
//     // {
//     //  $query = "select * from tbl_sample where last_name = '$search_text'";   
//     // }
//     // else
//     // {
//     //     echo "<script>alert('No Search Result Found.');</script>";
//     // }
    
    
// }

$rows = mysqli_query($con, $query);
$Total_Rows = mysqli_num_rows($rows);
//echo $Total_Rows;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    
  
    <div class="container">
    
        
        <div class="row mt-3">
        
            <div class="col-md-3">
            
            <a href="Home.php" class="btn btn-outline-dark">Add New Employee</a>
            
            </div>
            
            <div class="col-md-8">
                
                <form action="" method="get" class="form-inline">
                           
                    <!-- <select name="SearchList" id="" required class="form-control">
                        <option value="">Select Field</option>
                        <option value="Id">Id</option>
                        <option value="Name">First Name</option>
                        <option value="Designation">Last Name</option>
                    </select> -->
                    <input type="text" placeholder="Search By " name="Search" required class="form-control">
                    
                    <input type="submit" value="Search" name="SearchBtn" class="btn btn-primary">
                    <a href="search.php" class="btn btn-danger">Reset</a>
                        
                    
                </form>
            
            </div>
        
        </div>
        
        <div class="row mt-3">
        
            <div class="col-md-12">
    
    <?php
    
if($Total_Rows != 0)
{
    ?>
    
    <table class="table table-bordered table-striped table-hover table-dark">
        <thead>
        <tr>
            <th colspan="7" class="text-center">EMPLOYEE'S DATA</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <?php
    echo "<tbody>";
    while($data = mysqli_fetch_assoc($rows))
    {
        echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['first_name']."</td>
            <td>".$data['last_name']."</td>
            <td><a href='update.php?id=$data[id]' class='btn btn-info'>Edit</a></td>
            <td><a href='delete.php?id=$data[id]' class='btn btn-danger' onclick='return Confirmation()'>Delete</a></td>
        </tr>";
    }
    echo "</tbody>";
}
else
{
    echo "No Rows Found";
}

    
    ?>
    </table>
                </div>
        
        </div>
    
    </div>
    
    <script>
    
    function Confirmation()
        {
            return confirm("Are You Sure To Delete Data ??");
        }
    
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>
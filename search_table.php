<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Tablet</title>
</head>
<body>
    <?php
     $con = mysqli_connect("localhost","root","","search_db");
     $query = "select * from students";
     $res = mysqli_query($con, $query);
     $TotalRows = mysqli_num_rows($res);
     if(!$TotalRows !=0)
     {
      ?>
      <table>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course</th>
        </tr>
      <?php
        while($row = mysqli_fetch_assoc($res))
        {
         ?>
         <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['course'] ?></td>
         </tr>
       <?php
        }

       ?>
      
     <?php  
     }
    ?>
     </table>
    
    <!-- <form action="" method="get">
        <input type="text" name="search">
        <input type="submit" value="Search" name="searchBtn" />
    </form> -->
    
</body>
</html>
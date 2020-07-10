<!DOCTYPE html>
<html>
<head>
  <title> ADMIN OF MYMAID </title>
</head>

<body>

  <center>
    <h1>It show the detail of admin who are apply in MYMAID</h1>

    <div class="container">
      <form action="" method="POST" enctype="multipart/form-data>
        <table>
          <thead>

            <tr>
              <th>ID</th>
              <th>Profile Picture</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Gender</th>
              <th>Email</th>
            </tr>

          </thead>

          <?php
                $connection = msqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection,'mymaid');

                $query = "SELECT * FROM 'admin' ";
                $query_run = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($query_run))
                {
                  ?>
                  <tr>
                    <td> <?php echo $row['ID']; ?> </td>
                    <td> <?php echo'<img src="data:image;base64,' .base64_encode($row['Pic']). '" alt="Pic" style="width:100px; height: 100px;">';?> </td>
                    <td> <?php echo $row['Firstname']; ?> </td>
                    <td> <?php echo $row['Lastname']; ?> </td>
                    <td> <?php echo $row['Gender']; ?> </td>
                    <td> <?php echo $row['Email']; ?> </td>
                  </tr>

                  <?php
                }
            ?>

        </table>

      </form>
    </div>
  </center>

</body>
</html>

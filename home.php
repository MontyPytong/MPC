<!doctype html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mpc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>


<html lang="en">
  <head>
    <title>MPC - Modul Procesare comenzi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="stil.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <nav class="navbar navbar-light  justify-content-between mr-auto">
          <a class="navbar-brand">MPC - Modul Procesare comenzi</a>
          <form class="form-inline">
            <button type="button" class="btn btn-outline-primary  mr-sm-2 ">
                Comenzi neconfirmate <span class="badge badge-danger">
                <?php
                $result=mysqli_query($conn,"SELECT count(*) AS total FROM comenzi WHERE status = 'comanda neconfirmata'");
                
                if (!$result) echo mysql_error();
                
                $row=mysqli_fetch_assoc($result);
                
                echo $row['total'];
                ?>
            
                </span>
            </button>
            <input class="form-control form-primary mr-sm-2" type="search" placeholder="Cauta" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cauta ID</button>

          </form>

      </nav>

    </div>

    <div class="wrapper">
                            <table class="table table-bordered table-hover table-sm">
                              <thead class="table-primary">
                              <tr>
                              <th scope="col">ID</th>
                              <th scope="col">CLIENT</th>
                              <th scope="col">STATUS COMANDA</th>
                              <th scope="col">MAIL</th>
                              <th scope="col">VALOARE COMANDA</th>
                              <th scope="col">MODIFICARE COMANDA</th>
                            </tr>
                              </thead>
                              <tbody>
                <?php  
                  $sql = "SELECT id, client,status, mail, valoare, modificare FROM comenzi";
                  $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()) { 

                    echo '
                                  <tr>
                                  <th scope="row">'.$row["id"].'</th>
                                  <td>'.$row["client"].'</td>
                                  <td>'.$row["status"].'</td>
                                  <td>'.$row["mail"].'</td>
                                  <td>'.$row["valoare"].'</td>
                                  <td>'.$row["modificare"].'</td></tr>
                              ';
              
                  }
                $conn->close();
                ?>
              </tbody>
                </table>
    </div>

    <footer class="footer">
      <div class="container-fluid">
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
        </nav>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

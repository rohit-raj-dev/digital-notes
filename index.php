<?php


$insert = false;
$update = false;
$delete = false;
//connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

//Create a Connection
$connection = mysqli_connect($servername, $username, $password, $database);

//die if connection was not successful
if (!$connection) {
    die("sorry was failed to connect : " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `id` = $sno";
    $result = mysqli_query($connection, $sql);
}
if (isset($_POST['submit'])) {
    if (isset($_POST['snoEdit'])) {
        //Update the record
        $sno = $_POST["snoEdit"];
        $title = $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];

        //SQL query to be executed
        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`id` = $sno";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "we could not update the record successfully";
        }
    } else {
        $title = $_POST["title"];
        $description = $_POST["description"];

        //SQL query to be executed
        $sql = "INSERT INTO notes(title,description) VALUES('$title', '$description')";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            //echo "the record has been inserted successfully!<br>";
            $insert = true;
        } else {
            echo "the record was not inserted because of this error -----> " . mysqli_error($connection);
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css
/font-awesome.min.css" rel="stylesheet">
    <title>PHP CRUD</title>

</head>

<body>
    <!-- Edit modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
Edit modal
</button>--->

    <!--Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="title" class="form-label"> Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" placeholder="write title here" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label"> Description</label>
                            <textarea type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" placeholder="write about title"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Update Note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iNotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>



    <?php
    if ($insert) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your record has been inserted successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    ?>

    <?php
    if ($update) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your record has been updated successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    ?>

    <?php
    if ($delete) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your record has been deleted successfully
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    ?>
    <div class="container my-5">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label"> Title</label>
                <input required type="text" class="form-control" id="title" name="title" placeholder="write title here" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"> Description</label>
                <textarea required type="text" class="form-control" id="description" name="description" placeholder="write about title"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Add Note</button>
        </form>
    </div>

    <div class="container my-6">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM notes ";
                $result = mysqli_query($connection, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
              <th scope='row'>" . $sno . "</th>
              <td>" . $row['title'] . "</td>
              <td>" . $row['description'] . " </td>
              <td> <button class='edit btn btn-sm btn-primary' id=" . $row["id"] . " >Edit</button>   <button class='delete btn 
              btn-sm btn-primary' id=d" . $row["id"] . " >Delete</button>
              </tr>";
                }
                ?>

            </tbody>
        </table>
        <hr>
    </div>

    <!----contact details------>
    <section class="footer" id="contact">
        <h4>Contact Us</h4>

        <div class="icons">
            <a href="https://www.facebook.com/home.php"> <i class="fa fa-facebook" aria-hidden="true"></i></a>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <a href="https://www.linkedin.com/in/rohit-lodhi-php/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

        </div>
        <p>Made with <i class="fa fa-heart"></i> by Rohit Lodhi</p>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit", e.target.parentNode.parentNode);
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, description);
                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })


        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("delete", e.target.parentNode.parentNode);
                sno = e.target.id.substr(1, );
                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `?delete=${sno}`;
                    //create a form and use post request to submit a form
                } else {
                    console.log("no");
                }
            })
        })
    </script>

</body>

</html>
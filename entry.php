<?php 
session_start();
include "connection.php";
if(isset($_POST['submit'])) {
    $id = $_POST['meetid'];
    $sql = "select name from form where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0) {
        $_SESSION['id'] = $id;
        header("Location: dt2.php");
    } else {
        echo "<script>alert('Please check the meeting id')</script>";
    }   
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>AMPAY | Book appointment</title>
</head>

<body>
    <section id="form">
        <div class="container">
            <div class="form-box">
                <img src="img/logo.png" alt="logo" class="mb-4 img-responsive img-fit" width="200px">
                <h2>ENTER DETAILS</h2>
                <form method="post" action="entry.php">
                    <div class="form-group">
                        <label for="meetid">Enter Meeting ID</label>
                        <input type="text" class="form-control" name="meetid" id="meetid" placeholder="Enter ID">
                    </div>
                    <center>
                        <input class="button" type="submit" value="reschedule" name="submit">
                    </center>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
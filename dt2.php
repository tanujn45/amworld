<?php 
session_start();
$id = $_SESSION['id'];
include "connection.php";
if(isset($_POST['submit'])) {
    $datetime = $_POST['datetime'];
    $sql = "update form set datetime     = '$datetime' where id = '$id'";
    if(mysqli_query($conn, $sql)) {
        $_SESSION['id'] = $id;
        echo "rescheduled";
        //header("Location: reschedule.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
        //echo "<script>alert('Please check the meeting id')</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flat
    pickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_red.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="css/styles.css">

    <title>AMPAY | Book appointment</title>
</head>

<body>
    <section id="form">
        <div class="container">
            <div class="form-box">
                <img src="img/logo.png" alt="logo" class="mb-4 img-responsive img-fit" width="200px">
                <h2><i class="far fa-clock"></i> Choose date and time</h2>
                <form action="dt2.php" method="post">
                    <div class="form-group">
                        <input class="date form-control" placeholder="Date and Time(GMT + 5:30)" name="datetime" />
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
    <script>
        var fp = flatpickr('.date', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        })
    </script>
</body>

</html>
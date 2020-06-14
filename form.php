<?php
session_start();
$datetime = $_SESSION['datetime'];
include 'connnection.php';
if($datetime == '') {
    header('Location: dt.php');
}
if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ph = $_POST['ph'];
    $mnum = $_POST['mnum'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $id = $fname[0] . $lname[0] . substr($mnum, 0, 4) . substr($email, 0, 3);
    $name = $fname . " " . $lname;
    $phone = $ph . " " . $mnum;
    //$dt = strtotime($datetime);
    //$datetime = $datetime . ":00";
    $sql = "insert into form values('$id', '$name', '$phone', '$email', '$address', '$country', '$state', $zipcode, '$datetime');";
    if (mysqli_query($conn, $sql)) { 
        $_SESSION['id'] = $id;
        header('Location: thank.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                <form method="post" action="form.php">
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"
                                required>
                        </div>
                        <div class="col form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name"
                                required>
                        </div>
                    </div>
                    <label>Mobile Number</label>
                    <div class="form-row">
                        <div class="col-3 form-group">
                            <select id="ph" name="ph" class="form-control">
                                <option>+91</option>
                                <option>+92</option>
                                <option>+93</option>
                                <option>+94</option>
                                <option>+95</option>
                            </select>
                        </div>
                        <div class="col-9 form-group">
                            <input type="text" class="form-control" name="mnum" id="mnum"
                                placeholder="10 digit Phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Residential Address</label>
                        <input type="text" name="address" placeholder="Address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="country" id="country" required>
                            <option>Select Country</option>
                            <option>India</option>
                            <option>United States</option>
                            <option>United Kingdom</option>
                            <option>Japan</option>
                            <option>Nepal</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="col-7 form-group">
                            <label for="state">State</label>
                            <input type='text' id="state" class="form-control" name='state' placeholder="State"
                                required>
                        </div>
                        <div class="col-5 form-group">
                            <label for="zipcode">Zip Code</label>
                            <input type='number' id="zipcode" class="form-control" name='zipcode'
                                placeholder="Zip Code">
                        </div>
                    </div>
                    <!-- <center>
                        <a href="thank.php" class="button">SUBMIT</a>
                    </center> -->
                    <center>
                        <input type="submit" name="submit" class="button" value="submit">
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
<?php 
    include 'hfile.php';
    ?>
<html>

<head>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="image/Navy Blue Urban Modern Real Estate Logo (1).png" class="img-fluid">
    <title>
        Sigin In
    </title>
</head>

<body>
    <?php
        // session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["em"]) && isset($_POST["ps"])) {
                $e1 = $_POST["em"];
                $p1 = $_POST["ps"];
                // echo $e1.$p1;
                $c = mysqli_connect("localhost", "root", "");
    
                mysqli_select_db($c, "urban_estate");
                if ($c) 
                {
    
                    $query = "SELECT * FROM log_info WHERE EMAIL = '$e1'";
                    $result = mysqli_query($c, $query);
                    $data = mysqli_fetch_assoc($result);
                    if (!empty($e1) && !empty($p1)) 
                    {                 
                        if ($result && mysqli_num_rows($result) > 0) 
                        {
                            if ($data['PASSWORD'] == $p1) 
                            {
                                $name = $data['NAME'];

                                $_SESSION['NAME'] = $name; 
                                // echo $_SESSION['NAME'];
                                $_SESSION['status'] = "Login sucessful!!";
                                if(isset($_SESSION['status']))
                                {
                                    if (isset($_SESSION['status']))
                                    {
                                    ?>
<!-- --------------------------------SUCCESS MESSAGE-------------------------------------------------------------->
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $_SESSION['status'];?>
                                      </div>
<!-- ------------------------------------PHP STARTED----------------------------------------------------------------->
                                    <?php
                                        unset($_SESSION['status']);
                                    }
                                    // echo "<script>alert('Welcome " . $_SESSION['NAME'] . "')</script>";
                                    echo"<script>window.location.href = 'home.php';</script>";
                                    // header("Location : home.php");

                                }
                            } 
                            else
                            {
                            ?>
<!-- ------------------------------ERROR MESSAGE-------------------------------------------------------------->                           
                                <div class="alert alert-danger" role="alert">
                                <?php echo "Invalid Email or Password!!";?>
                                </div>
<!-- ------------------------------PHP STARTED--------------------------------------------------------------------------->
                            <?php
                            }
                        } 
                        else 
                        {
                        ?>
<!-- ------------------------------ERROR MESSAGE-------------------------------------------------------------->                           
                                <div class="alert alert-danger" role="alert">
                                <?php echo "User not found, please register your";?>
                                </div>
<!-- ------------------------------PHP STARTED--------------------------------------------------------------------------->
                        <?PHP
                        }
                    } 
                    else 
                    {
                        echo "Email and password are required";
                    }
                } 
                else 
                {
                    echo "Error: " . mysqli_connect_error();
                }
            }
        }
    ?>



    <div class="container-fluid">

        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <form method="POST">
                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="em" required>
                </div>

                <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="password" placeholder="Password" name="ps" required>
                </div>
                <p>Lost Password ?<a href="1.php">Click Here!</a></p>
                <p>Not Registered?<a href = "signup.php">Click Here!</a></p>
                <div class="btn-field">
                    <button type="submit" id="signupbtn" name="sb">Sign In</button>
                </div>
            </form>

        </div>
    </div>
    <!--<script>
        let signupbtn = document.getElementById("signupbtn");
        let signinbtn = document.getElementById("signinbtn");
        let namefield = document.getElementById("namefield");
        let title = document.getElementById("title");

        signinbtn.onclick = function () {
            namefield.style.maxHeight = "0";
            title.innerHTML = "Sign In";
            signupbtn.classList.add("disable");
            signinbtn.classList.remove("disable");

        }

        signupbtn.onclick = function () {
            namefield.style.maxHeight = "60px";
            title.innerHTML = "Sign Up";
            signupbtn.classList.remove("disable");
            signinbtn.classList.add("disable");

        }



    </script>-->



</body>

</html>

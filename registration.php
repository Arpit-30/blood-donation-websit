<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("submit").addEventListener("click", function(event) {
                const password = document.querySelector('input[name="password"]').value;

                // Password validation
                const firstLetterUppercase = /^[A-Z]/.test(password);
                const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                const hasNumber = /\d/.test(password);

                if (!firstLetterUppercase || !hasSpecialChar || !hasNumber) {
                    event.preventDefault(); // Prevent form submission
                    let errorMessage = "Password must:\n";
                    if (!firstLetterUppercase) errorMessage += "- Start with an uppercase letter\n";
                    if (!hasSpecialChar) errorMessage += "- Contain at least one special character\n";
                    if (!hasNumber) errorMessage += "- Contain at least one number\n";
                    alert(errorMessage);
                }
            });
        });
    </script>
</head>
<body>

    <form action="registration.php" method="post">

        <?php 
        include("header.php");
        ?>
        <h1>Registration</h1>
        <div>
            <label for="">First Name:</label><br><input class="tb1" type="text" name="fname" placeholder="First name" required><br><br>
            <label for="">Last Name:</label><br><input class="tb1" type="text" name="lname" placeholder="Last name" required><br><br>
            <label for="">Email:</label><br><input class="tb1" type="email" name="email" placeholder="Email" required><br><br>
            <label for="">Password:</label><br><input class="tb1" type="password" name="password" placeholder="Password" required><br><br>
            <label for="">Last Donation:</label><br><input class="tb1" type="date" name="ldonation" required><br><br>
            <label for="">Phone Number:</label><br><input class="tb1" type="tel" maxlength="10" name="phoneno" placeholder="Phone Number" required><br><br>
           
            <label for="">Blood Group:</label><br>
            <select name="bgroup" class="sel">
                <option value="A+ve">A+ve</option>
                <option value="B+ve">B+ve</option>
                <option value="O+ve">O+ve</option>
                <option value="AB+ve">AB+ve</option>
                <option value="A-ve">A-ve</option>
                <option value="B-ve">B-ve</option>
                <option value="O-ve">O-ve</option>
                <option value="AB-ve">AB-ve</option>
            </select><br><br><br>
            <input type="submit" class="btn" name="submit" id="submit" value="Submit">
        </div>
    </form>

    <?php
    $alert=false;
    $error=false;
    $notnull=false;
    if($_SERVER['REQUEST_METHOD']=='POST') {
        require 'dbcon.php';
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $phone=$_POST['phoneno'];
        $bgroup=$_POST['bgroup'];
        $ldonation=$_POST['ldonation'];

        $exists=false;
        $sql = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `passwords`, `phonenumber`, `bloodgroup`, `last_donation`) VALUES ('$fname', '$lname', '$email','$password', '$phone', '$bgroup', '$ldonation')";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $alert = true;
        } else {
            $notnull = "Please enter the values!";
        }
    }

    if ($alert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Account created!</strong> You can now log in to your account.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $_POST['email'];
        header("location:login.php");
    }
    
    if ($error) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Error:</strong> '.$error.'
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    
    if ($notnull) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error:</strong> '.$notnull.'
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>
    
    <?php 
    include("footer.php");
    ?>
</body>
</html>
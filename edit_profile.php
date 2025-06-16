<?php
    // $u_email = false;
            session_start();
            if(isset($_SESSION["id"])){
                $ses_id = $_SESSION["id"];
                include('./connect/connect.php');
                $checkSql = "SELECT * FROM donors WHERE id = '$ses_id'";
                $result = $conn->query($checkSql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $hashed_password = $row["password"]; // Assuming password is stored as hashed in the database
                    $name = $row["name"];
                    $age = $row["age"];
                    $weight = $row["weight"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $city = $row["city"];
                    $blood_group = $row["blood_group"];
                    $last_donation_date = $row["last_donation_date"];
                    $gender = $row["gender"];
                }
                     // Close the database connection
                    $conn->close();
            }


            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST["name"];
                $age = $_POST["age"];
                $weight = $_POST["weight"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $city = $_POST["city"];
                $blood_group = $_POST["blood_group"];
                $last_donation_date = $_POST["last_donation_date"];
                $gender = $_POST["gender"];
                $password = $_POST["password"];
                $_SESSION["email"] =$email;
                $_SESSION["user"] =$name;
                
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Database connection details
                include('./connect/connect.php');
                $update_Sql = "update donors set name='$name',age='$age',weight='$weight',email='$email',phone='$phone',city='$city',
                blood_group='$blood_group',last_donation_date='$last_donation_date',gender='$gender',password='$hashedPassword'
                WHERE id = '$ses_id'";
                $result = mysqli_query($conn,$update_Sql);
                if($result){
                    // echo "updated successfully";
                    header("Location: ./edit_profile.php?status=success");
                    exit();
                }
                else{
                    // echo "Problem while updating";
                    header("Location: ./edit_profile.php?status=error");
                    exit();

                }
            $conn->close();

            }
        
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="./css/form1.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </link>
        <title>Document</title>
    </head>
    <body>
        
        <?php
            require '././component/navbar.php';
        ?>
    
            
        <div class="Container" style="margin-top:70px;">
            <form action="" method="post">
                <h2 style="color: white;text-shadow: 1px 1px 5px black;">Edit Information</h2>
                <div class="content">
                    <div class="input-box">
                        <label for="name">Full Name</label>
                        <input type="text" placeholder="Enter full name" name="name" required value = "<?php echo $name; ?>">
                    </div>
    
                    <!-- <div class="input-box">
                        <label for="date">Date of Birth</label>
                        <input type="date" placeholder="Enter date of birth" name="date" required>
                    </div> -->
    
                    <div class="input-box">
                        <label for="Age">Enter Your Age</label>
                        <input type="number" placeholder="Enter Your Age" name="age" required value = <?php echo $age; ?>>
                    </div>

                    <div class="input-box">
                        <label for="weight">Enter Your weight</label>
                        <input type="number" placeholder="Enter Your Weight" name="weight" required value = <?php echo $weight; ?>>
                    </div>
    
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Enter your valid email address" name="email" required value = <?php echo $email; ?>>
                    </div>
    
                    <div class="input-box">
                        <label for="phone">Phone number</label>
                        <input type="tel" placeholder="Enter your phone number" name="phone" required value = <?php echo $phone; ?>>
                    </div>
                    
                    <div class="input-box">
                        <label for="city">City</label>
                        <input type="text" placeholder="" name="city" required value = <?php echo $city; ?>>
                    </div>
                    
                    <div class="input-box">
                        <label for="blood_group">Blood Group</label>
                        <input type="text" placeholder="" name="blood_group" required value = <?php echo $blood_group; ?>>
                    </div>
    
                    <div class="input-box">
                        <label for="last_donation_date">Last Donation Date</label>
                        <input type="date" placeholder="Last Donation Date" name="last_donation_date" required value = <?php echo $last_donation_date; ?>>
                    </div>

                    
                    
                    <!-- <div class="input-box">
                            <label for="last_donation_date">Last Donation Date</label>
                            <input type="date" placeholder="Last Donation Date" name="last_donation_date" required>
                    </div> -->
                        
                    <div class="input-box">
                         <label for="gender-category">Select Your Gender</label>
                         <!-- <label class="gender-title" style="margin-top: 50px;">Gender</label> -->
                        <div class="gender-category" style="display:flex; align-items:center;">
                            <input type="radio" name="gender" id="male" value="Male" required <?php if($gender == "Male"){ echo "checked"; }?>>
                            <label for="male">Male</label>
                            
                            <input type="radio" name="gender" id="female" value="Female" required <?php if($gender == "Female"){ echo "checked"; }?>>
                            <label for="female">Female</label>
        
                            <input type="radio" name="gender" id="other" value="Other" required <?php if($gender == "Other"){ echo "checked"; }?>>
                            <label for="other">Other</label>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Set a New Password" name="password"  autocomplete="off" required />
                    </div>



                    
                    
                </div>
    
                <div class="button-container">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>





        <script>
            function myfunction()
             { var x=document.getElementById("menu");
               if(x.style.display=="block") 
                {
                    x.style.display="none";
                }
            else{
                x.style.display="block";
              }
            }
             // Check URL parameters and display alert message
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');

            if (status === 'success') {
                alert("Profile updated successfully");
            } else if (status === 'error') {
                alert("Error updating Profile");
            }
            </script>
            <div class="preloader"></div>
  
            <!-- Your page content goes here -->
            
            <script src="./js/script.js"></script>
            
            <script>
                let set_title = document.getElementById("nav_title");
                set_title.style.display = "none";
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </body>
    
</html>
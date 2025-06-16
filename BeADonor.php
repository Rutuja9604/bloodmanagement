<?php
    session_start();
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="./css/form1.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></link>
        <style>
            .hover_ele2 a:hover{
                background-color:#c52c2c;
                transition:uppercase;
                color:white;
            }
        </style>
    
        <title>Document</title>
    </head>
    <body>
        
        <?php
            require '././component/navbar.php';
        ?>
    
            
        <div class="Container" style="margin-top:70px;">
            <form action="" method="post">
                <h2 style="color: white;text-shadow: 1px 1px 5px black;">Donor Information</h2>
                <div class="content">
                    <div class="input-box">
                        <label for="name">Full Name</label>
                        <input type="text" placeholder="Enter full name" name="name" required>
                    </div>
    
                    <!-- <div class="input-box">
                        <label for="date">Date of Birth</label>
                        <input type="date" placeholder="Enter date of birth" name="date" required>
                    </div> -->
    
                    <div class="input-box">
                        <label for="Age">Enter Your Age</label>
                        <input type="number" placeholder="Enter Your Age" name="age" required>
                    </div>

                    <div class="input-box">
                        <label for="weight">Enter Your weight</label>
                        <input type="number" placeholder="Enter Your Weight" name="weight" required>
                    </div>
    
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Enter your valid email address" name="email" required>
                    </div>
    
                    <div class="input-box">
                        <label for="phone">Phone number</label>
                        <input type="tel" placeholder="Enter your phone number" name="phone" required>
                    </div>
    
                    <div class="input-box">
                        <label for="city">City</label>
                        <select id="city" name="city">
                            <option selected disabled>Select City</option>
                            <!-- Add your city options here -->   
                            <option selected disabled>Select City</option>
                            <option value="Ahmednagar">Ahmednagar</option>
                            <option value="Akola">Akola</option>
                            <option value="Amravati">Amravati</option>
                            <option value="Beed">Beed</option>
                            <option value="	Bhandara">	Bhandara</option>
                            <option value="Chandrapur">Chandrapur</option>
                            <option value="Dhule">Dhule</option>
                            <option value="Gadchiroli">Gadchiroli</option>
                            <option value="Gondia">Gondia</option>
                            <option value="Hingoli">Hingoli</option>
                            <option value="Jalgaon">Jalgaon</option>
                            <option value="Jalna">Jalna</option>
                            <option value="Kolhapur">Kolhapur</option>
                            <option value="Latur">Latur</option>
                            <option value="Mumbai City">Mumbai City</option>
                            <option value="Mumbai Suburban">Mumbai Suburban</option>
                            <option value="Nagpur">Nagpur</option>
                            <option value="Nanded">Nanded</option>
                            <option value="	Nandurbar">Nandurbar</option>
                            <option value="Nashik">Nashik</option>
                            <option value="Osmanabad">Osmanabad</option>
                            <option value="Palghar">Palghar</option>
                            <option value="Parbhani">Parbhani</option>
                            <option value="	Pune">	Pune</option>
                            <option value="Raigad">Raigad</option>
                            <option value="Ratnagiri">Ratnagiri</option>
                            <option value="Sangli">Sangli</option>
                            <option value="Satara">Satara</option>
                            <option value="Sambhajinagar">Sambhajinagar</option>
                            <option value="Sindhudurg">Sindhudurg</option>
                            <option value="Solapur">Solapur</option>
                            <option value="Thane">Thane</option>
                            <option value="	Wardha">Wardha</option>
                            <option value="	Washim">Washim</option>
                            <option value="	Yavatmal">Yavatmal</option>
        
                        </select>
                    </div>
    
                    <div class="input-box">
                        <label for="blood_group">Blood Group</label>
                        <select id="blood_group" name="blood_group">
                            <option selected disabled>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="O+">O+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="A-">A-</option>
                            <option value="O-">O-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
    
                    <div class="input-box">
                        <label for="last_donation_date">Last Donation Date</label>
                        <input type="date" placeholder="Last Donation Date" name="last_donation_date" required>
                    </div>

                    
                    
                    <!-- <div class="input-box">
                            <label for="last_donation_date">Last Donation Date</label>
                            <input type="date" placeholder="Last Donation Date" name="last_donation_date" required>
                    </div> -->
                        
                    <div class="input-box">
                         <label for="gender-category">Select Your Gender</label>
                         <!-- <label class="gender-title" style="margin-top: 50px;">Gender</label> -->
                        <div class="gender-category" style="display:flex; align-items:center;">
                            <input type="radio" name="gender" id="male" value="Male" required>
                            <label for="male">Male</label>
                            
                            <input type="radio" name="gender" id="female" value="Female" required>
                            <label for="female">Female</label>
        
                            <input type="radio" name="gender" id="other" value="Other" required>
                            <label for="other">Other</label>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Set A Password" name="password"  autocomplete="off" required />
                    </div>



                    
                    
                </div>
    
                <div class="button-container">
                    <button type="submit">Submit</button>
                </div>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        include('./component/try.php');
                    }
                ?>
            </form>
        </div>





        <script>
            window.onload = myfunction();
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
            </script>
            <div class="preloader"></div>
  
            <!-- Your page content goes here -->
            
            <script src="./js/script.js"></script>
            <script>
                // Check URL parameters and display prompt accordingly
                const urlParams = new URLSearchParams(window.location.search);
                const status = urlParams.get('status');
        
                if (status === 'success') {
                    alert("Record inserted successfully");
                } else if (status === 'error') {
                    alert("Error inserting record");
                }
            </script>
            <script>
                let set_title = document.getElementById("nav_title");
                set_title.style.display = "none";
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </body>
    
</html>
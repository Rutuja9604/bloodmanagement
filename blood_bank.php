<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="./css/form1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </link>
    <title>Document</title>
    <style>
        .container_unit {
            display: grid;
            gap: 10px 10px;
            grid-template-columns: auto auto auto auto;
            padding: 10px 0px; 
        }

        .input_box2 {
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    require '././component/navbar.php';
    ?>


    <div class="Container" style="margin-top:70px;">
        <form action="" method="post">
            <h2 style="color: white;text-shadow: 1px 1px 5px black;">Blood bank Information</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">Blood Bank Name</label>
                    <input type="text" placeholder="Enter Blood Bank Name" name="name" required>
                </div>

                <div class="input-box">
                    <label for="phone">Contact number</label>
                    <input type="tel" placeholder="Enter Bank's contact number" name="phone" required>
                </div>

                <div class="input-box">
                    <label for="alternate_phone">Alternate number</label>
                    <input type="tel" placeholder="Enter alternate contact number" name="alternate_phone">
                </div>

                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter valid email address" name="email" required>
                </div>

                <div class="container_unit">
                    <div class="input-box input-box2">
                        <label for="A+">A+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="A+" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="A-">A- Units</label>
                        <input type="number" placeholder="Available Unit's" name="A-" required>
                    </div>

                    <div class="input-box input-box2">
                        <label for="B+">B+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="B+" required>
                    </div>

                    <div class="input-box input-box2">
                        <label for="B-">B- Units</label>
                        <input type="number" placeholder="Available Unit's" name="B-" required>
                    </div>
                    <div class="input-box input-box2">
                        <label for="AB+">AB+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="AB+" required>
                    </div>

                    <div class="input-box input-box2">
                        <label for="AB-">AB- Units</label>
                        <input type="number" placeholder="Available Unit's" name="AB-" required>
                    </div>

                    <div class="input-box input-box2">
                        <label for="O+">O+ Units</label>
                        <input type="number" placeholder="Available Unit's" name="O+" required>
                    </div>

                    <div class="input-box input-box2">
                        <label for="O-">O- Units</label>
                        <input type="number" placeholder="Available Unit's" name="O-" required>
                    </div>
                </div>

                <div class="input-box" style="justify-content: flex-start;">
                        <label for="city">Blood bank City</label>
                        <select id="city" name="city">
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

                <div class="input-box" style="justify-content: flex-end;">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Set A Password" name="password" autocomplete="off" required />
                </div>





            </div>

            <div class="button-container">
                <button type="submit">Submit</button>
            </div>
        </form>
        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                            include('./component/bank_register.php');
                        
                        }
        ?>
    </div>





    <script>
        window.onload = myfunction();

        function myfunction() {
            var x = document.getElementById("menu");
            if (x.style.display == "block") {

                x.style.display = "none";
            } else {
                x.style.display = "block";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>
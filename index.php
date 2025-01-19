<?php
session_start();

// if (!isset($_SESSION['loggedin'])) {
//     header("location: login.php");
// }
?>


<!doctype html>

<html>

<head>
    <title>Raktarpan </title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/indexstyle.css">
    </link>
    <style>
            .hover_ele2 a:hover{
                background-color:#c52c2c;
                transition:uppercase;
                color:white;
            }
    </style>

</head>

<body>

    <section id="banner">
        <img src="image/image9.png" class="logo">
        <?php
        echo '<nav>
        <div class="menu-right">
            <label class="logo">
                <h6 class="my-3 fs-1" id="nav_title"  style="text-shadow: 2px 1px 5px white;">Raktarpan</h6>
            </label>
            <span onClick="myfunction()">&#9776;</span>
            <ul id="menu">
                <li><a class="hover_ele" id="Home" href="./index.php">Home</a></li>
                <li><a class="hover_ele" id="contact" href="contact.php">Contact Us</a></li>

                <li><a class="hover_ele" id="about" href="AboutuUs.php" target="_parent">About us</a></li>

                <li><a class="hover_ele" id="feedback" href="feedback.php" target="_parent">Feedback</a></li>';
        if (isset($_SESSION['user'])) {
            // echo '<li><a href="logout.php" target="_parent">' .$_SESSION['user']. '</a></li>';
            // echo '<li><a href="logout.php" target="_parent">Logout</a></li>';
            echo '<li>
                        <div class="dropdown-center">
                            <button class="btn btn-secondary btn-sm dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Wel-Come ' . $_SESSION['user'] . '
                            </button>
                            <ul class="dropdown-menu">';
            if (isset($_SESSION["type_ac"])) {
                echo '<li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="edit_bank.php">Edit Profile</a></li>';
            } else {
                echo '<li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>';
            }



            echo '<li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>';
        } else {
            echo '<li class="nav-item dropdown drop_class hover_ele2">
                <a class="nav-link dropdown-toggle login_hov" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;text-decoration:underline; onhover=toggleDropdown();">
                    Login
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="./login.php">Donor</a></li>
                    <li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="./bank_login.php">Bank</a></li>
                </ul>
            </li>';
        }
        echo '</ul>
        </div>
    </nav>';
        ?>
        <div class="banner-text">
            <h1> RAKTARPAN</h1>
            <h3>Be the reason for someone's heartbeat.</h3>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {

            echo '<center>
                <div class="banner-button">
                    <a class="hover_ele" href="BeADonor.php" target="_parent"><span></span>Be A Donor</a>
                    <a class="hover_ele" href="request.php"><span></span>Request</a>
                    <a class="hover_ele" href="blood_bank.php"><span></span>Blood Bank</a>
                    <a class="hover_ele" href="admin_login.php"><span></span>Admin</a>
    
                </div>
    
                </center>';
        }
        ?>
    </section>
    <script>
        function myfunction() {
            var x = document.getElementById("menu");
            if (x.style.display == "block") {

                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>


    <section class="sec-01">
        <div class="container">
            <h2 class="main-title">Learn about Blood Donation</h2>
            <div class="content">
                <div class="image">
                    <img src="image/blood12.jpg ">
                </div>
                <div class="text-box">
                    <h3>TYPES OF DONATION</h3>
                    <p>The average human body contains about five liters of blood, which is made of several cellular and non-cellular components such as Red blood cell, Platelet, and Plasma. Each type of component has its unique properties and can be
                        used for different indications. The donated blood is separated into these components by the blood centre and one donated unit can save upto four lives depending on the number of components separated from your blood.

                    </p>
                </div>
            </div>
        </div>

    </section>
    <section class="sec-02">
        <div class="container">
            <h3 class="section-title">Why Donate Blood</h3>
            <div class="content">
                <div class="image">
                    <img src="image/blood11.jpg" alt="">
                </div>
                <div class="info">
                    <h4 class="info-title">Donate Blood</h4>
                    <p>-The most precious gift that one can give to another person is the gift of life i.e. blood. It is the essence of life.
                        <br> -Your blood saves more than one life when it is separated into its components (red blood cells, plasma etc.).
                        <br> -Blood is needed regularly for patients with diseases such as thalassemia and hemophilia, and also for the treatment of injuries after an accident, major surgeries, anemia, etc.
                        <br> -It improves your health
                    </p>
                </div>
            </div>
        </div>

    </section>

    <section class="sec-03">
        <div class="container">
            <h3 class="section-title">
                Benifits Of Donating
            </h3>
            <div class="content">
                <div class="image">
                    <img src="image/blood14.jpg" alt="">
                </div>
                <div class="info">
                    <h4 class="info-title">Less likely to suffer diseases</h4>
                    <p>

                        <br> # Did you know that people who donate blood are 88% less likely to suffer a heart attack and 33% less likely to acquire any type of cardiovascular disease.
                        <br> # When you donate blood, it removes 225 to 250 milligrams of iron from your body, hence reducing the risk of heart disease.
                        <br> # Blood Center performs numerous tests on the donated blood. Therefore regular blood donation helps in sheilding you from serious diseases.
                    </p>
                </div>

            </div>
        </div>

    </section>
    <script>
        //common reveal option to create reaval animation
        ScrollReveal({
            //reset: true,
            distance: '60px',
            duration: 2500,
            delay: 400
        });

        //target elements, and specify options to create reaval animations
        ScrollReveal().reveal('.main-title ,.section-title', {
            delay: 500,
            origin: 'left'
        });
        ScrollReveal().reveal('.sec-01 .image, .info', {
            delay: 600,
            origin: 'bottom'
        });
        ScrollReveal().reveal('.text-box', {
            delay: 700,
            origin: 'right'
        });
        ScrollReveal().reveal('.sec-02 .image ,.sec-03 .image', {
            delay: 500,
            origin: 'top'
        });
    </script>
    <div class="preloader"></div>

    <!-- Your page content goes here -->

    <script src="./js/script.js"></script>
    <script>
        let set_active = document.getElementById("Home");
        set_active.className = "active";
    </script>
    <script>
        function toggleDropdown(event) {
            event.preventDefault(); // Prevent the default link behavior

            var dropdownMenu = document.getElementById("dropdown-menu");
            if (dropdownMenu.style.display === "block") {
                dropdownMenu.style.display = "none";
            } else {
                dropdownMenu.style.display = "block";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>


</html>
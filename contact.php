<?php
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title> Contact Form </title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/contactStyle.css">
    <style>
        .hover_ele2 a:hover{
            background-color:#c52c2c;
            transition:uppercase;
            color:white;
        }
    </style>
</head>

</link>

    <?php
            require './component/navbar.php';
        ?>


    <div class="contact-continer">
        <form style="margin: 20px;" action="https://api.web3forms.com/submit" method="POST" class="contact-left">
            <div class="contact-left-title">
                <h2> Get in touch </h2>
                <hr>
            </div>
            <input type="hidden" name="access_key" value="b3049847-9b6c-4407-ac13-227f8ee56496">
            <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
            <input type="email" name="email" placeholder="Your Email" class="contact-inputs" required>
            <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
            <button type="submit">submit 
                <i class='bx bx-right-arrow-alt'></i></button>
        </form>
        <div class="contact-right">
            <div class="video-right">
                <video id="Vautoplay" width="500" muted oncanplaythrough="vplay()">
                     <source src="./image/145651 (540p).mp4" type="video/mp4">
                     <source src="./image/145651 (540p).mp4" type="video/mp4">
                 </video>
            </div>
            <div class="contact-info">
                <h2>Contact Info </h2>
                <h3><i class='bx bxs-user'></i> Raktarpan Blood Management</h3>
                <h3><i class='bx bxs-phone-call'></i> 7888176366</h3>
                <h3><i class='bx bxs-envelope'></i> rakatarpan7@gmail.com</h3>
                <h3><i class='bx bxs-location-plus'></i> Kolhapur,Maharashtra</h3>
            </div>
        </div>

    </div>


    <div class="preloader"></div>

    <!-- Your page content goes here -->

    <script src="./js/script.js">
    </script>
    <script>
        let set_active = document.getElementById("contact");
        set_active.className = "active";
        let set_title = document.getElementById("nav_title");
        set_title.style.display = "none";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function vplay(){
            var a =    document.getElementById("Vautoplay");
            a.play();
            a.loop = true;
        }
    </script>
</body>


</html>
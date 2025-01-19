<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Feedback form Design</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/feedback.css" />
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
    <section></section>
    <?php
    require '././component/navbar.php';
    ?>
    <div class="container">
        <form action="process_feedback.php" method="post">
            <h1>GIVE YOUR FEEDBACK</h1>
            <div class="id">
                <input type="text" placeholder="Full Name" name="full_name" required />
            </div>
            <div class="id1">
                <input type="email" placeholder="Email Address" name="email" required />
            </div>
            <textarea cols="15" rows="5" placeholder="Enter your opinion here..." name="opinion" required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>

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

    <div class="preloader"></div>

    <!-- Your page content goes here -->

    <script src="./js/script.js"></script>
    <script>
        // Check URL parameters and display prompt accordingly
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get("status");

        if (status === "success") {
            alert("Thanks for your valuable feedback!");
        } else if (status === "error") {
            alert("Sorry your feedback not submitted please try again.");
        }
    </script>
    <script>
        let set_active = document.getElementById("feedback");
        set_active.className = "active";
        let set_title = document.getElementById("nav_title");
        set_title.style.display = "none";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
<?php
    echo '<nav>
        <div class="menu-right">
            <label class="logo">
                <h6 class="my-3 fs-1" id="nav_title">Raktarpan</h6>
            </label>
            <span onClick="myfunction()">&#9776;</span>
            <ul id="menu">
                <li><a id="Home" href="./index.php">Home</a></li>
                <li><a id="contact" href="contact.php">Contact Us</a></li>

                <li><a id="about" href="AboutuUs.php" target="_parent">About us</a></li>

                <li><a id="feedback" href="feedback.php" target="_parent">Feedback</a></li>';
                    if(isset($_SESSION['user'])){
                    // echo '<li><a href="logout.php" target="_parent">' .$_SESSION['user']. '</a></li>';
                    // echo '<li><a href="logout.php" target="_parent">Logout</a></li>';
                    echo'<li>
                        <div class="dropdown-center">
                            <button class="btn btn-secondary btn-sm dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Wel-Come '.$_SESSION['user'].'
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                                <li style="width:100%"><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                        </div>
                    </li>';
                    } 
                    else{
                        echo '<li><a href="login.php" target="_parent">Login</a></li>';

                    }
        echo '</ul>
        </div>
    </nav>';
?>
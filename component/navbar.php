<?php
    echo '<nav>
        <div class="menu-right">
            <span onClick="myfunction()">&#9776;</span>
            <ul id="menu">';
            if (isset($_SESSION["type_ac"])) {
               echo '<li><a class="hover_ele" id="Home" href="./bank_index.php">Home</a></li>';
            }
            else{
                echo '<li><a class="hover_ele" id="Home" href="./index.php">Home</a></li>
                            
                <li><a class="hover_ele" id="contact" href="contact.php">Contact Us</a></li>

                <li><a class="hover_ele" id="about" href="AboutuUs.php" target="_parent">About us</a></li>

                <li><a class="hover_ele" id="feedback" href="feedback.php" target="_parent">Feedback</a></li>';
            }
                
            if(isset($_SESSION['user'])){
            // echo '<li><a href="logout.php" target="_parent">' .$_SESSION['user']. '</a></li>';
            // echo '<li><a href="logout.php" target="_parent">Logout</a></li>';
            echo'<li>
                <div class="dropdown-center">
                    <button class="btn btn-secondary btn-sm dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Wel-Come '.$_SESSION['user'].'
                    </button>
                    <ul class="dropdown-menu">
                        <li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                        <li class="hover_ele2" style="display:block;width:100%;margin:0px;"><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                </div>
            </li>';
            } 
            else{
                echo '<li class="nav-item dropdown drop_class">
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
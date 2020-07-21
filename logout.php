<?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                        $_SESSION['fnameses']="";
                        $_SESSION['prnses']="";
                        $_SESSION['userType']="";
                        $_SESSION['authentication'] = 0;   
                        session_destroy();
                	
            }
            header("location: /index.php");
        ?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Manage Account</title>
	 
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css"  href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/admin-page.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
   </head>
   <body>
       <?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                	header("location: index.php");
            }
        ?>
       <?PHP
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {     
                try 
                {
                    
                    $conn = new MongoClient();		                   
                    $db = $conn->selectDB("studentSystem");
                    $collection = $db->admin;
                    
                    $oldusernmae = $_POST['oldname'];
                    $oldpassword = $_POST['oldpass'];
                    $newname = $_POST['newname'];
                    $newnpass= $_POST['newpass'];
                    $cpass = $_POST['cpass'];
                    $found=0;
                    
                    $result = $collection->findOne(array('username' => $oldusernmae, 'password' => $oldpassword));
                    
                    if (is_array($result) || is_object($result))
                    {
                        foreach ($result as $value)
                        {
			    $found=1;			                         
                        }
                    }
                    
                    if($found == 1)
                    {
                        if($newnpass == $cpass)
                        {
                            $collection->update(
                                                    array('username' => $oldusernmae),
                                                    array('$set' => array(       						                                                
                                                                            "username" => $newname,
                                                                            "password" => $newnpass,                                                                       		
                                                                           )),
                                                                            array("upsert" => true)
                                                    );
                            // disconnect from server
                            $conn->close();
                            echo'<script type="text/javascript"> alert("Account Information Updated");</script>';  
                        } 
                        else 
                        {
                            echo'<script type="text/javascript"> alert("Paswords Do Not Match");</script>';
                        }
                    }
                    else 
                    {
                        echo'<script type="text/javascript"> alert("Incorrect Credentials");</script>';                      
                    }
                }
                catch (MongoConnectionException $e) 
                {
                    die('Error connecting to MongoDB server');
                }
                catch (MongoException $e)
                {
                    die('Error: ' . $e->getMessage());
                }
                
            }
       ?>
       <!-- Navigation
    ==========================================-->
        <nav id="tf-menu" class="navbar navbar-default"  style="background-color: #000">
            <div class="container-fluid overlay">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>               
                    </button>
                <b>
                    <a class="navbar-brand" href="index.php">Student Management System</a>
                </b>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <b>
                    <ul class="nav navbar-nav navbar-right navbar-fixed">
                        
                        <li><a href="admin-page.php" class=" btn btn-success">Home</a></li>
                        
                        <li><a href="perinfo.php">Registration</a></li>
                        
                        <li><a href="manage.php" class="page-scroll">Manage</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Search
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="searchStudents.php">Students</a></li>
                                <li><a href="searchAlumini.php">Alumini</a></li>          
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Statistics
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="DeptAnalysis.php">Department Strength</a></li>
                                <li><a href="ClassAnalysis.php">Class Strength</a></li>          
                                <li><a href="GenderAnalysis.php">Gender Ratio</a></li> 
                                <li><a href="AdmissionAnalysis.php">Admission Type</a></li> 
                                <li><a href="ScholarsipAnalysis.php">Scholarship</a></li> 
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Placement
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="aluByDept.php">Add Student</a></li>
                                <li><a href="aluByDeptFind.php">View Database</a></li>          
                            </ul>
                        </li>                    
                        <li><a href="index.php" class=" btn btn-danger">Log Out</a></li>
                    </ul>
                </b>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
	
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
       <b>
       <div class="container">
  
                <h1> Manage Account</h1>
                <br><br>
                
                <hr>
                <form method="post">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                    <Label style="font-size: medium " >Old Username : </label>                                  
                                    <input type="text" class="form-control" name="oldname" placeholder="Enter Old Username" required="true">
                            </div>
                            <div class="col-lg-6">                                   
                                    <Label style="font-size: medium ">Old password : </label>
                                    <input type="password" class="form-control" name="oldpass" placeholder="Enter Old Password" required="true">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-4">                                   
                                    <Label style="font-size: medium " >New Username :</label>
                                    <input type="text" class="form-control" name="newname" placeholder="Enter New Username" required="true">
                            </div>
                            <div class="col-lg-4">                                     
                                    <Label style="font-size: medium " >New Password:</label>
                                    <input type="password" class="form-control" name="newpass" placeholder="Enter New Password" required="true">
                            </div> 
                            <div class="col-lg-4">                                     
                                    <Label style="font-size: medium " >Confirm Password:</label>
                                    <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="true">
                            </div>
                        </div>
                        <hr>     
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                </form>      
            </div>
        </b>
       
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
        
        <br><br><br>
       <footer class="footer">
           <div class="container-fluid">
               <center><h3>Project  BY</h3>
                   <p class="text-muted">Satvashila Bagal || Priyanka Karad || Mohit Kunjir || Sayyed Arfat</p></center>
      </div>
    </footer>
     
        
   </body>  
 </html>
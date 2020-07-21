<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Placements</title>
 
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
             if($_SERVER["REQUEST_METHOD"] == "POST"){ 
                    try 
                    {                       
                        $conn = new MongoClient();		                        
                        $db = $conn->selectDB("studentSystem");                          
                        $collection = $db->analysis;
                        $prn=$_POST['prn'];
                        $result = $collection->findOne(array('_id' => $prn, 'classYear' => "BE"));
                        if (is_array($result) || is_object($result))
                        {
                                foreach ($result as $value)
                                {			    
                                    $_SESSION['alprnses'] = $prn; 
                                    header("location: addAlumini.php");
                                }
                        }
                        else
                        {
                            echo'<script type="text/javascript"> alert("No Such PRN in database");</script>';
                        }
                        
                        $conn->close();
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
   <b>
        <div class="container" id="tf-search">  
            <form id="contact" action="" method="post">
                <h2>Enter Student PRN</h2>
                <br><br><br>
            
                <fieldset>
                    <input placeholder="Enter PRN" type="text" tabindex="3" name="prn" required="true">
                </fieldset>
                <br>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                </fieldset>
            </form>
        </div>
   </b>   
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
   </body>
   
 </html>

       <?php
            session_start();
            
            if($_SESSION['register']!=1)
            {
                	header("location: index.php");
            }
        ?>
       <?PHP
                if($_SERVER["REQUEST_METHOD"] == "POST"){ 
                    try 
                    {
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        
                        $collection = $db->acdInfo;
                        $collection2 = $db->analysis;
			
                        $prn = $_SESSION['prnses'];
                        $password=$_SESSION['studPass'];
                        $_SESSION['studPass']="";
                        $yearAd = (int)$_POST['yearAd'];
                        $isScholarship = $_POST['isScholarship'];
                        $rollNo = (int)$_POST['rollNo'];
                        $dept = $_POST['dept'];
                        $bankAC = (int)$_POST['bankAC'];
                        $classYear = $_POST['classYear'];
                        $yearPass = (int)0;
                        $sem1 = (int)0;
                        $sem2 = (int)0;
                        $sem3 = (int)0;
                        $sem4 = (int)0;
                        $sem5 = (int)0;
                        $sem6 = (int)0;
                        $sem7 = (int)0;
                        $sem8 = (int)0;
                                               

                        $document = array( 
                                            "_id" => $prn,
                                             "password" => $password,
                                            "yearAd" => $yearAd,
                                            "isScholarship" => $isScholarship,
                                            "rollNo" => $rollNo,
                                            "dept" => $dept,
                                            "bankAC" => $bankAC,
                                            "classYear" => $classYear,
                                            "yearPass" => $yearPass,
                                            "sem1" => $sem1,
                                            "sem2" => $sem2,
                                            "sem3" => $sem3,
                                            "sem4" => $sem4,
                                            "sem5" => $sem5,
                                            "sem6" => $sem6,
                                            "sem7" => $sem7,
                                            "sem8" => $sem8                                                                     
                             );
                            $collection->insert($document);
                            
                            $collection2->update(
						array('_id' => $prn),
						array('$set' =>array(                                                                             
                                                                            "yearAd" => $yearAd, 
                                                                            "isScholarship" => $isScholarship,
                                                                            "dept" => $dept,                                                                           
                                                                            "classYear" => $classYear,
                                                                            
                                                                            )),
                                                                        array("upsert" => true)
						);
                            
                            echo '<script type="text/javascript">alert("Academic Infomation of Student Registered");</script>';                                                                                       
			    $conn->close();
                    }
                    catch (MongoConnectionException $e) 
                    {
                        die('Error connecting to MongoDB server');
                    }
                    catch (MongoException $e)
                    {
                        if($e->getCode() === 11000)
                        {   
                            echo "PRN value is duplicated";
                        }
                    } 
                }
       ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Academic Information</title>
	 
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
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
      
        <br><br>
        
            <div class="container"> 
                <h1> Academic Information Fill Up Form</h1>
                <br><br>
                
                <hr>
                <form method="post"> 
                    <div class="form-group row">      
                        <div class="col-lg-4">  
                            <Label style="font-size: medium " >Class : </label>
                            <select name="classYear" style="width: 70px; height: 20px" required >
                                    <option value="FE" selected="true">F.E.</option>
                                    <option value="SE">S.E.</option>
                                                                
                                         
                            </select>        
                        </div>
                        <div class="col-lg-4">     
                            <Label style="font-size: medium " >Admission Year : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="yearAd" style="width: 70px; height: 20px" required>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016" selected="true">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>                           
                            </select>   
                        </div> 
                        <div class="col-lg-4">
                                
                                <Label style="font-size: medium " >Scholarship :  </label>
                                &nbsp;&nbsp;
                                <input type="radio" name="isScholarship" value="yes" required>Yes
                                &nbsp;&nbsp;
                                <input type="radio" name="isScholarship" value="no" required>No
                            </div>
                    </div>                           
                    <hr>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Roll no: : </label>
                            &nbsp;&nbsp;
                            <input type="number" class="form-control" name="rollNo" placeholder="Roll No" required>
                        </div>
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Branch : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="dept" style="width: 200px; height: 20px" required>
                                    <option value="IT">Information Technology</option>
                                    <option value="Computer">Computer Science</option>
                                    <option value="EnTC">E & TC</option>
                                    <option value="Mechanical">Mechanical</option>
                                    <option value="Electrical">Electrical</option>
                            </select>
                        </div>  
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Bank A/C No : </label>
                            <input type="text" class="form-control" name="bankAC" placeholder="Bank A/C No" required="true">
                        </div>         
                    </div>
                    <hr>              
                                                                        
                    <br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                </form>         
            </div>
        </b>
      
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>

   </body>  
 </html>
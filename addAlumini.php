       <?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                	header("location: index.php");
            }
        ?>
       <?PHP
                    try 
                    {
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        
                        $collection = $db->acdInfo;
			$result = $collection->findOne(array('_id' => $_SESSION['alprnses'],'classYear' => "BE")); 
                        
                        $collection2 = $db->perInfo;
			$result2 = $collection2->findOne(array('_id' => $_SESSION['alprnses'])); 
                        
                        $prn = $_SESSION['alprnses'];
                        
                        $fname = $result2['fname'];
                        $lname = $result2['lname'];
                        $dept = $result['dept'];
                        $address = $result2['address'];
                        $emailId = $result2['emailId'];
                        $contactNo = $result2['contact'];
                        
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
       ?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Edit Alumini Information</title>
	 
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
     
	
	
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
      
        <br><br>
        
        <b>
            <div class="container">
  
                <h1> Alumini Information Fill Up Form</h1>
                <br><br>
                
                <hr>
                <form method="post">
                    <div class="form-group row"> 
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >PRN : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="aprn" class="form-control" value="<?PHP echo $prn;?>" disabled="true"> 
                        </div>
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Password :</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="password" name="password" class="form-control" placeholder="Enter Pasword" required > 
                        </div>  
                        <div class="col-lg-4">      
                            <Label style="font-size: medium " >Confirm Password : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Passowrd" required >  
                        </div>
                    </div> 
                    <div class="form-group row">               
                        <div class="col-lg-6">
                            <Label style="font-size: medium " >First Name : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="afname" class="form-control" value="<?PHP echo $fname;?>" disabled="true">  
                        </div>  
                        <div class="col-lg-6">      
                            <Label style="font-size: medium " >Last Name : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="alname" class="form-control" value="<?PHP echo $lname;?>" disabled="true">  
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Branch : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="adept" class="form-control" value="<?PHP echo $dept;?>" disabled="true"> 
                        </div>                              
                        
                        <div class="col-lg-4">   
                            <Label style="font-size: medium" >College Placed Company : </label>
                            <input type="text" name="colCompany" class="form-control" required="true" placeholder="Enter Company Placed" >  
                        </div>
                    </div>
                             
                    <hr>
        
                    <hr>
  
                    <br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                   
                </form>        
                
            </div>
        </b>
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>

   </body>  
 </html>
 
 <?PHP               
                if($_SERVER["REQUEST_METHOD"] == "POST")
                    { 
                    try 
                    
                       {
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];
                        if($password == $cpassword)
                        {
                            // open connection to MongoDB server
                            $conn = new MongoClient();

                            //select Database
                            $db = $conn->selectDB("studentSystem");

                            $collection = $db->aluInfo;	
                            
                            $password = $_POST['password'];                                                    
                            $colCompany = $_POST['colCompany'];
                            $company = "";
                            $designation = "";
                            $experience = (int)0;
                            $yearPass=(int)0;
                            $linkedin="";
                            $facebook="";
                            $twitter="";
                            $website="";
                            
                            $document = array(
                                              "_id" => $prn,
                                              "password" => $password,
                                              "afname" => $fname,
                                              "alname" => $lname,
                                              "adept" => $dept,     
                                              "yearPass" => $yearPass,
                                              "colCompany" => $colCompany,   
                                              "company" => $company, 
                                              "designation" => $designation,
                                              "experience" => $experience,
                                              "linkedin" => $linkedin,
                                              "facebook" => $facebook,
                                              "twitter" => $twitter,
                                              "website" => $website,
                                              "address" => $address,
                                              "emailId" => $emailId,
                                              "contactNo" => $contactNo
                                             );


                            $collection->insert($document);
                            echo'<script type="text/javascript"> alert("Student Record added");</script>';
                            $conn->close();
                        }
                        else 
                        {
                           echo'<script type="text/javascript"> alert("Passwords do not match");</script>';;
                        }
                    }
                    catch (MongoConnectionException $e) 
                    {
                        die('Error connecting to MongoDB server');
                    }
                    catch (MongoException $e)
                    {
                        if($e->getCode() === 11000)
                        {   
                            echo '<script type="text/javascript"> alert("PRN value is duplicated");</script>';                           
                        }
                    }            
                }         
?>
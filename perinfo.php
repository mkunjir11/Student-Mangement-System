<?PHP
            session_start();
            
            if($_SERVER["REQUEST_METHOD"] == "POST")
            { 
                    try 
                    {
                        $_SESSION['register'] = 1;
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        
                        $collection = $db->perInfo;
			$collection2 = $db->analysis;
                        
                        $prn = $_POST['prn'];
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];
                        $_SESSION['prnses']=$prn;
                        $_SESSION['studPass']=$password;
                        $fname = $_POST['fname'];                       
                        $mname = $_POST['mname'];
                        $lname = $_POST['lname'];                       
                        $mother = $_POST['mother'];
                        $state = $_POST['state'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];                        
                        $caste = $_POST['caste'];                        
                        $nationality = $_POST['nationality'];
                        $bloodGroup = $_POST['bloodGroup'];
                        $emailId = $_POST['emailId'];
                        $contact=$_POST['contact'];
                        $dob = $_POST['dob'];                       
                        $handicap = $_POST['handicap'];
                        $admcat = $_POST['admcat'];
                        
                        
                        if($password == $cpassword)
                        {
                            $document = array( 
                                                "_id" => $prn,
                                                "password" => $password,
                                                "fname" => $fname,
                                                "mname" => $mname,
                                                "lname" => $lname,
                                                "mother" => $mother,
                                                "state" => $state,
                                                "address" => $address,
                                                "gender" => $gender,
                                                "caste" => $caste,
                                                "nationality" => $nationality,
                                                "bloodGroup" => $bloodGroup,
                                                "emailId" => $emailId,
                                                "contact" =>$contact,
                                                "dob" => $dob,                                               
                                                "handicap" => $handicap,
                                                "admcat" => $admcat
                                              );
                            $collection->insert($document);
                            
                            $document2 = array( 
                                                "_id" => $prn,                                               
                                                "fname" => $fname,                                                
                                                "lname" => $lname,                                                                                                                                                
                                                "gender" => $gender,
                                                "caste" => $caste,                                                                                                                                                                                            
                                                "admcat" => $admcat
                                              );
                            $collection2->insert($document2);
                            echo '<script type="text/javascript">alert("Personal Infomation of Student Registered");</script>';   
                            
                            
                            $conn->close();
                        }
                        else
                        {
                            echo "Passwords do not Match!!!!!!!";
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
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Personal Information</title>
	 
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
    <link rel="stylesheet" type="text/css" href="js/codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" type="text/css" href="js/codebase/dhtmlxcalendar.css"/>
	<script src="js/codebase/dhtmlxcalendar.js"></script>
	<style>
		#calendar
		{
			border: 1px solid #dfdfdf;
			font-family: Roboto, Arial, Helvetica;
			font-size: 14px;
			color: #404040;
		}
	</style>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["cal_1"]);
		}
	</script>
  
   </head>
   <body onload="doOnLoad();">
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
  
                <h1> Personal Information Fill Up Form</h1>
                <br><br>
                
                <hr>
                <form method="post">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                    <Label style="font-size: medium " >First Name : </label>                                  
                                    <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-lg-4">                                   
                                    <Label style="font-size: medium ">Middle Name : </label>
                                    <input type="text" class="form-control" name="mname" placeholder="Enter Middle Name" required>
                            </div>
                            <div class="col-lg-4">                                   
                                    <Label style="font-size: medium " >Last Name : </label>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                    
                                    <Label style="font-size: medium " >Mother's Name :</label>
                                    <input type="text" class="form-control" name="mother" placeholder="Enter Mothers Name" required>
                            </div>
                            <div class="col-lg-6">
                                     
                                    <Label style="font-size: medium " >PRN :</label>
                                    <input type="text" class="form-control" name="prn" placeholder="Enter PRN" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                     
                                    <Label style="font-size: medium " >Password : </label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="col-lg-6">
                                    
                                    <Label style="font-size: medium " >Confirm Password :</label>
                                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
                            </div>
                        </div>               
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                    
                                    <Label style="font-size: medium " >State :  </label>
                                    <input type="text" class="form-control" name="state" placeholder="Enter State" size="10" required>
                            </div>
                            <div class="col-lg-4">
                                     
                                    <Label style="font-size: medium " >Gender :  </label>
                                    &nbsp;&nbsp;
                                    <input type="radio" name="gender" value="male" required>Male
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="gender" value="female" required>Female
                            </div>
                            <div class="col-lg-4">
                                    
                                    <Label style="font-size: medium " >Fee Category :  </label>
                                    &nbsp;&nbsp;
                                    <input type="radio" name="caste" value="Open" required>Open
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="caste" value="OBC" required>OBC
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="caste" value="SC" required>SC
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="caste" value="NT" required>NT
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                    
                                    <Label style="font-size: medium " >Address :  </label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                            </div>
                            <div class="col-lg-4">
                                   
                                    <Label style="font-size: medium " > Admission Type : </label>
                                    &nbsp;&nbsp;
                                    <input type="radio" name="admcat" value="Cap" required>CAP
                                    &nbsp;&nbsp;
                                    <input type="radio" name="admcat" value="Management" required>Management
                            </div>
                        </div>           
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                    <Label style="font-size: medium " >Nationality : </label>
                                    &nbsp;&nbsp;
                                    <select name="nationality" style="width: 70px; height: 20px" required >
                                         <option value="Indian">Indian</option>
                                         <option value="Other">Other</option>
                                     </select>
                            </div>

                            <div class="col-lg-4">
                                    <Label style="font-size: medium" >Blood Group : </label>
                                    &nbsp;&nbsp;
                                        <select name="bloodGroup" style="width:70px;height:20px" required>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+" selected>B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                            </div>
                            <div class="col-lg-4">
                                    
                                    <Label style="font-size: medium " >Physical Handicap :</label>
                                    &nbsp;&nbsp;
                                    <input type="radio" name="handicap" value="yes" required>Yes
                                    &nbsp;&nbsp;
                                    <input type="radio" name="handicap" value="no" required>No
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-group row">
                            <div class="col-lg-4">
                                
                                <Label style="font-size: medium " >Email Id : </label>
                                <input type="email" class="form-control" name="emailId" placeholder="Enter Email Id" required>
                            </div>
                            <div class="col-lg-4">
                                
                                <Label style="font-size: medium " >Contact No : </label>
                                <input type="text" class="form-control" name="contact" placeholder="Enter your Contact Number" required>
                            </div>
                            <div class="col-lg-4">
                                
                                <Label style="font-size: medium " >Date Of Birth :  </label>
                                <input type="text" class="form-control" id="cal_1" name="dob" placeholder="YYYY/MM/DD" required>
                            </div>
                        </div>
                        
                        <hr>

                        <br><br>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="acainfo.php">
                            
                            <button type="button" class="btn btn-danger" style="float : right">Next</button>
                            
                        </a>
                </form>      
            </div>
        </b>
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>

   </body>  
 </html>
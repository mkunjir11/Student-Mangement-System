       <?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                	header("location: index.php");
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
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="editAlumini.php">Alumini Account</a></li>
                                <li><a href="manage.php">Admin Account</a></li>          
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
                            <input type="text" name="aprn" class="form-control" required="true" placeholder="Enter PRN" > 
                        </div>
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Password :</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="password" name="password" class="form-control" placeholder="Enter Pasword" required > 
                        </div>  
                        <div class="col-lg-4">      
                            <Label style="font-size: medium " >Confirm Password : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="password" name="cpasword" class="form-control" placeholder="Confirm Passowrd" required >  
                        </div>
                    </div> 
                    <div class="form-group row">               
                        <div class="col-lg-6">
                            <Label style="font-size: medium " > First Name : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="afname" class="form-control" placeholder="Enter Name"required="true"> 
                        </div>  
                        <div class="col-lg-6">      
                            <Label style="font-size: medium " >Last Name :</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="alname" class="form-control" placeholder="Enter Surname" required="true">  
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <Label style="font-size: medium " >Branch : </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;                           
                            <select name="adept" required style="width: 200px; height: 20px" >
                                    <option value="IT" selected="true">Information Technology</option>
                                    <option value="Computer">Computer Science</option>
                                    <option value="EnTC">E & TC</option>
                                    <option value="Mechanical">Mechanical</option>
                                    <option value="Electrical">Electrical</option>
                            </select>                 
                        </div>                              
                        <div class="col-lg-4">      
                            <Label style="font-size: medium" >Passing Year : </label>
                            &nbsp;&nbsp;                               
                            <select name="yearPass" style="width: 70px; height: 20px" required>
                                    <option value="2012" selected="true">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                           </select>                                
                        </div>
                        <div class="col-lg-4">   
                            <Label style="font-size: medium" >College Placed Company : </label>
                            <input type="text" name="colCompany" class="form-control" required="true" placeholder="Enter Company Placed" >  
                        </div>
                    </div>
                             
                    <hr>
               
                    <div class="form-group row">
                        <div class="col-lg-4">
                                <Label style="font-size: medium" >New Company: </label> 
                                <input type="text" class="form-control" name="company" placeholder="Any New Company" >
                        </div>
                        <div class="col-lg-4">
                                <Label style="font-size: medium" >Designation: </label>
                                <input type="text" class="form-control" name="designation" placeholder="Enter Designation">
                        </div>
                        <div class="col-lg-4">
                                <Label style="font-size: medium" >Experience: </label>
                                <input type="number" class="form-control" name="experience" placeholder="Enter Number of Years">
                        </div>  
                    </div>
              
                    <hr>
  
                    <br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="editAlumini.php">Refresh</a>
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
                        if($password == $cpassword)
                        {
                            // open connection to MongoDB server
                            $conn = new MongoClient();

                            //select Database
                            $db = $conn->selectDB("studentSystem");

                            $collection = $db->aluInfo;			

                            $prn = $_SESSION['prnses'];

                            $afname = $_POST['afname'];
                            $alname = $_POST['alname'];
                            $adept = $_POST['adept'];
                            $yearPass = (int)$_POST['yearPass'];
                            $colCompany = $_POST['colCompany'];
                            $company = $_POST['company'];
                            $designation = $_POST['designation'];
                            $experience = (int)$_POST['experience'];

                            $document = array(
                                              "_id" => $prn,  
                                              "afname" =>$afname,
                                              "alname" => $alname,
                                              "adept" => $adept,
                                              "yearPaas" => $yearPass,
                                              "colCompany" => $colCompany,   
                                              "company" => $company, 
                                              "designation" => $designation,
                                              "experience" => $experience                         
                                             );


                            $collection->insert($document);

                            $conn->close();
                        }
                        else 
                        {
                            echo "Password do not match";
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
                            echo "PRN value is duplicated";
                        }
                    }            
                }         
?>
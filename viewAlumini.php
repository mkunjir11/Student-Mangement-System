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
                        
                        $collection1 = $db->perInfo;
                        $collection2 = $db->acdInfo;
                        $collection3 = $db->aluInfo;                       
                                                
                        $prn = $_GET['cid'];
                                                
                        $result1 = $collection1->findOne(array('_id' => $prn));
                        $result2 = $collection2->findOne(array('_id' => $prn));
                        $result3 = $collection3->findOne(array('_id' => $prn));                        
                                                                        
                        $afname = $result3['afname'];
                        $alname = $result3['alname'];
                        $adept = $result3['adept'];
                        $yearPass = $result3['yearPass'];
                        $colCompany = $result3['colCompany'];
                        $company = $result3['company'];
                        $designation = $result3['designation'];
                        $experience = $result3['experience'];
                        $facebook =  $result3['facebook'];
                        $twitter = $result3['twitter'];
                        $linkedin = $result3['linkedin'];
                        $website = $result3['website'];
                        $address = $result3['address'];
                        $emailId = $result3['emailId'];   
                        $contact = $result3['contactNo'];
                        
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
    <title>Welcome Alumini</title>
	 
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
   
	 <div style="height: 10px">
        </div>
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
      
        <br><br>
        <b>
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1> Personal Information </h1>
                </div>
                <br><br>
            </div>
            <hr>
            <div class="form-group row">
                 <div class="col-md-2">
                    <Label style="font-size: large" for="_id" ><b>PRN:</b></label>
                 </div>
                 <div class="col-md-2">
                    <Label style="font-size: medium" for="_id"><?php echo $prn; ?> </label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="fname"><b>First Name:</b></label>
                 </div>
                 <div class="col-md-2">
                    <Label style="font-size: medium" for="fname"><?php echo $afname; ?></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="mname"><b>Middle Name:</b></label>
                 </div>
                 <div class="col-md-2">    
                    <Label style="font-size: medium" for="mname"><?php echo $result1["mname"]; ?></label> 
                 </div>   
            </div>
            <hr>
            <div class="form-group row">   
                <div class="col-md-2">
                    <Label style="font-size: large" for="lname"><b>Last Name:</b></label> 
                </div>
                <div class="col-md-2">
                    <Label style="font-size: medium" for="lname"><?php echo $alname; ?></label> 
                </div>
                <div class="col-md-2">
                    <Label style="font-size: large" for="mother"><b>Mother's Name:</b></label> 
                </div>
                <div class="col-md-2">
                     <Label style="font-size: medium" for="mother"><?php echo $result1["mother"]; ?></label> 
                </div>
                <div class="col-md-2">
                     <Label style="font-size: large" for="dob"><b>Date of Birth:</b></label>
                 </div>                
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="dob"><?php echo $result1["dob"]; ?></label> 
                 </div>
                
                
            </div>
             <hr>
             <div class="form-group row">   
                 <div class="col-md-2">
                     <Label style="font-size: large" for="address"><b>Address:</b></label>    
                 </div>
                 <div class="col-md-10">
                     <Label style="font-size: medium" for="address"><?php echo $address; ?></label> 
                 </div>
             </div>                         
             <hr>
             <div class="form-group row">                 
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="emailId"><b>Email Id:</b></label>
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="emailId"><?php echo $emailId; ?></label>    
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="emailId"><b>Contact No:</b></label>
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="emailId"><?php echo $contact; ?></label>    
                 </div>
                 
             </div>
             <hr>
             <div class="row">
                <div class="col-md-12" >
                    <h1> Academic Information </h1>
                </div>
            </div>
             <br><br>
            <div class="form-group row">
                 <div class="col-md-2">
                     <Label style="font-size: large" for="yearAd"><b>Addmission Year</b> </label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="yearAd"><?php echo $result2["yearAd"]; ?></label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="yearPassed"><b>Graduation Year:</b> </label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="rollNo"> <?php echo $yearPass; ?> </label>  
                 </div>   
                 
            </div>     
             <hr>  
             <div class="form-group row">
                 <div class="col-md-2">
                     <Label style="font-size: large" for="rollNo"><b>Roll No:</b> </label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="rollNo"><?php echo $result2["rollNo"]; ?></label>  
                 </div>  
                 <div class="col-md-2">
                     <Label style="font-size: large" for="classYear"><b>Department:</b></label>    
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="classYear"><?php echo $adept; ?></label> 
                 </div> 
             </div>
             <hr>
             <div class="form-group row">   
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem1"><b>Sem 1:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="classYear"><?php echo $result2["sem1"]; ?></label> 
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem2"><b>Sem 2:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem2"><?php echo $result2["sem2"]; ?></label> 
                 </div>
             </div>
              <div class="form-group row">   
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem3"><b>Sem 3:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem3"><?php echo $result2["sem3"]; ?></label> 
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem4"><b>Sem 4:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem4"><?php echo $result2["sem4"]; ?></label> 
                 </div>
             </div>
             <div class="form-group row">   
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem5"><b>Sem 5:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem5"><?php echo $result2["sem5"]; ?></label> 
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem6"><b>Sem 6:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem6"><?php echo $result2["sem6"]; ?></label> 
                 </div>
             </div>
             <div class="form-group row">   
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem7"><b>Sem 7:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem7"><?php echo $result2["sem7"]; ?></label> 
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: large" for="Sem8"><b>Sem 8:</b></label>    
                 </div>
                 <div class="col-md-3">
                     <Label style="font-size: medium" for="sem8"><?php echo $result2["sem8"]; ?></label> 
                 </div>
             </div>
             
             <hr>                                       
             </div>
             
    </div>
            <div class="container">
                    <div class="form-grouprow">
                        <div class="col-md-12" >
                            <h1> Career & Social Information </h1>
                            <br><br>
                        </div>                                     
                    </div>  
                    <hr>
                    <div class="form-group row">                                                                                                                                       
                        <div class="col-lg-4">      
                            <Label style="font-size: large" >Company Placed in : </label>                        
                        </div>
                         <div class="col-lg-8">  
                             <Label style="font-size: medium" ><?PHP echo $colCompany;?></label>
                         </div>  
                    </div>    
                        <hr>
                    <div class="form-group row">
                        <div class="col-lg-2">      
                            <Label style="font-size: large" >New Company : </label>                        
                        </div>
                         <div class="col-lg-2">  
                             <Label style="font-size: medium" ><?PHP echo $company;?></label>
                         </div>                              
                        <div class="col-lg-2">      
                            <Label style="font-size: large" >Designation : </label>                        
                        </div>
                         <div class="col-lg-2">  
                             <Label style="font-size: medium" ><?PHP echo $designation;?></label>
                         </div>                         
                        <div class="col-lg-2">      
                            <Label style="font-size: large" >Experience  : </label>                        
                        </div>                         
                        <div class="col-lg-2">
                            <Label style="font-size: medium" ><?PHP echo $experience;?> </label>                          
                        </div>                       
                    </div>
                    <hr>
                    <div class="form-group row">                                                                                                                                       
                        <div class="col-lg-4">      
                            <Label style="font-size: large" >LinkedIn Profile : </label>                        
                        </div>
                         <div class="col-lg-12">  
                             
                             <Label style="font-size: medium" ><a href="<?PHP echo $linkedin;?>" target="_blank"><img src="imgs/logo1.png" alt="LinkedIn" style="width:50px;height:50px;"></a></label>
                         </div>  
                    </div>    
                        <hr>
                    <div class="form-group row">                                                                                                                                       
                        <div class="col-lg-4">      
                            <Label style="font-size: large" >Facebook Profile : </label>                        
                        </div>
                         <div class="col-lg-12">  
                             
                             <Label style="font-size: medium" ><a href="<?PHP echo $facebook;?>" target="_blank"><img src="imgs/logo2.png" alt="facebook" style="width:50px;height:50px;"></a></label>
                         </div>  
                    </div>    
                        <hr>
                    <div class="form-group row">                                                                                                                                       
                        <div class="col-lg-4">      
                            <Label style="font-size: large" >Twitter Handle : </label>                        
                        </div>
                         <div class="col-lg-12">  
                             
                             <Label style="font-size: medium" ><a href="<?PHP echo $twitter;?>" target="_blank"><img src="imgs/logo3.jpg" alt="Twitter" style="width:50px;height:50px;"></a></label>
                         </div>  
                    </div>  
                    <div class="form-group row">                                                                                                                                       
                        <div class="col-lg-4">      
                            <Label style="font-size: large" >Website or Blog : </label>                        
                        </div>
                         <div class="col-lg-12">  
                             
                             <Label style="font-size: medium" ><a href="<?PHP echo $website;?>" target="_blank"><img src="imgs/logo4.png" alt="Website" style="width:50px;height:50px;"></a></label>
                         </div>  
                    </div>    
                        <hr>
                   
                                           
            </div>
        </b>
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>

   </body>  
 </html>
 

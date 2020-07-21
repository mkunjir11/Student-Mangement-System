<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Welcome Student</title>
	 
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css">
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
                   
                    try 
                    {
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        
                        $collection1 = $db->perInfo;
                        $collection2 = $db->acdInfo;
                        $collection3 = $db->aluInfo;                       
                        
                        $testid = $_SESSION['prnses'];
                                                
                        $result1 = $collection1->findOne(array('_id' => $testid));
                        $result2 = $collection2->findOne(array('_id' => $testid));
                        $result3 = $collection3->findOne(array('_id' => $testid));
                        
                        // disconnect from server
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
                            <li><a href="manageStudent.php" class="page-scroll">Change Password</a></li>
                        <li><a href="index.php" class=" btn btn-danger">Log Out</a></li>
                        </ul>                   
                </b>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav> 
   <b>
	<Label style="font-size: medium" >Hello <?PHP echo $result1['fname']; ?> </label>  
        
        <div style="height: 10px">
        </div>
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
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
                    <Label style="font-size: medium" for="_id"><?php echo $result1["_id"]; ?> </label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="fname"><b>First Name:</b></label>
                 </div>
                 <div class="col-md-2">
                    <Label style="font-size: medium" for="fname"><?php echo $result1["fname"]; ?></label> 
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
                    <Label style="font-size: medium" for="lname"><?php echo $result1["lname"]; ?></label> 
                </div>
                <div class="col-md-2">
                    <Label style="font-size: large" for="mother"><b>Mother's Name:</b></label> 
                </div>
                <div class="col-md-2">
                     <Label style="font-size: medium" for="mother"><?php echo $result1["mother"]; ?></label> 
                </div>
                <div class="col-md-2">
                    <Label style="font-size: large" for="contactNo"><b>State:</b></label>    
                </div>
                <div class="col-md-2">
                    <Label style="font-size: medium" for="contactNo"><?php echo $result1["state"]; ?></label> 
                </div>
                
            </div>
             <hr>
             <div class="form-group row">   
                 <div class="col-md-6">
                     <Label style="font-size: large" for="address"><b>Address:</b></label>    
                 </div>
                 <div class="col-md-6">
                     <Label style="font-size: medium" for="address"><?php echo $result1["address"]; ?></label> 
                 </div>
             </div>
             <hr>
             <div class="form-group row">
                 <div class="col-md-2">
                     <Label style="font-size: large" for="nationality"><b>Nationality:</b></label>    
                 </div>
                 <div class="col-md-2">
                      <Label style="font-size: medium" for="gender"><?php echo $result1["nationality"]; ?></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="gender"><b>Gender:</b></label>
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="gender"><?php echo $result1["gender"]; ?></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="caste"><b>Caste:</b></label>    
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="caste"><?php echo $result1["caste"]; ?></label> 
                 </div>                 
             </div>
             <hr>
             <div class="form-group row">
                 <div class="col-md-2">
                     <Label style="font-size:large" for="bloodGroup"><b>Blood Group:</b></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="bloodGroup"><?php echo $result1["bloodGroup"]; ?></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="emailId"><b>Email Id:</b></label>
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="emailId"><?php echo $result1["emailId"]; ?></label>    
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
                      <Label style="font-size: large" for="handicap"><b>Handicap:</b></label>   
                 </div>
                  <div class="col-md-2">
                     <Label style="font-size: medium" for="handicap"><?php echo $result1["handicap"]; ?></label>
                 </div>
                  <div class="col-md-2">
                      <Label style="font-size: large" for="admcat"><b>Contact No:</b> </label>    
                 </div>
                  <div class="col-md-2">
                     <Label style="font-size: medium" for="admcat"><?php echo $result1["contact"]; ?></label> 
                 </div>
                 <div class="col-md-2">
                      <Label style="font-size: large" for="admcat"><b>Admission Category:</b> </label>    
                 </div>
                  <div class="col-md-2">
                     <Label style="font-size: medium" for="admcat"><?php echo $result1["admcat"]; ?></label> 
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
                     <Label style="font-size: large" for="rollNo"><b>Roll No:</b> </label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="rollNo"><?php echo $result2["rollNo"]; ?></label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="bankAC"><b>Bank A/C No:</b> </label>  
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="bankAC"><?php echo $result2["bankAC"]; ?></label>  
                 </div>
            </div>     
             <hr>
             <div class="form-group row"> 
                 <div class="col-md-2">
                     <Label style="font-size: large" for="classYear"><b>Department:</b></label>    
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="classYear"><?php echo $result2["dept"]; ?></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="classYear"><b>Current Academic Year:</b></label>    
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="classYear"><?php echo $result2["classYear"]; ?></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: large" for="isScholarship"><b>Scholarship:</b></label> 
                 </div>
                 <div class="col-md-2">
                     <Label style="font-size: medium" for="isScholarship"><?php echo $result2["isScholarship"]; ?></label>
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
   </b>  
    </div>
    <?php   
  //echo $result2["sem1"];
    try {	
			?>
			 <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Dept', 'Students'],
                    ['Sem1', <?php echo (int)$result2["sem1"]; ?> ],
                    ['Sem2', <?php echo (int)$result2["sem2"]; ?> ],
                    ['Sem3', <?php echo (int)$result2["sem3"]; ?> ],
                    ['Sem4', <?php echo (int)$result2["sem4"]; ?> ],
                    ['Sem5', <?php echo (int)$result2["sem5"]; ?> ],
                    ['Sem6', <?php echo (int)$result2["sem6"]; ?> ],
                    ['Sem7', <?php echo (int)$result2["sem7"]; ?> ],
                    ['Sem8', <?php echo (int)$result2["sem8"]; ?> ]
                    
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Total Performance of candidate in semesters"});
            }
 
            google.setOnLoadCallback(drawVisualization);
			
        </script>
		<?php 
		
		        // disconnect from server
        $conn->close();
		
    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }
?>
    <br>
    <br>
    <section>
		<center><div id="visualization" style="width: 600px; height:400px;"></div></center>
	</section>
       <br><br><br><br><br>
       <br><br><br><br><br>
       <footer class="footer">
           <div class="container-fluid">
               <center><h3>Project  BY</h3>
                   <p class="text-muted">Satvashila Bagal || Priyanka Karad || Mohit Kunjir || Sayyed Arfat</p></center>
      </div>
    </footer>
     
    
    
   </body>
</html>
   
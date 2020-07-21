<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Welcome Admin</title>
	 
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
       
       
       
<?php

    //Your Database Connection include file here.
    //This Entire PHP part can be placed in a seperate action file
    if(isset($_POST['submit']))
    {
        try
        {
            //Upload Directory path.
            $uploadDir = 'database/';
            
            //FilePath with File name.        
            $uploadFilePersonal = $uploadDir . basename($_FILES["personal"]["name"]);                       
            $uploadFileAcademic = $uploadDir . basename($_FILES["academic"]["name"]);                      
            $uploadFileAlumini = $uploadDir . basename($_FILES["alumini"]["name"]); 
            $uploadFileAnalysis = $uploadDir . basename($_FILES["analysis"]["name"]);            
            
            //Check if uploaded file is CSV and not any other format.
            
            // Import uploaded file to Database. $collection is defined in the connection file or can be defined here too
             $commandPersonal = "mongoimport --db studentSystem --collection perInfo --file " . $uploadFilePersonal ." --type csv --headerline" ;
             $commandAcademic = "mongoimport --db studentSystem --collection acdInfo --file " . $uploadFileAcademic ." --type csv --headerline" ; 
             $commandAlumini  = "mongoimport --db studentSystem --collection aluInfo --file " . $uploadFileAlumini ." --type csv --headerline" ;
             $commandAnalysis  = "mongoimport --db studentSystem --collection analysis --file " . $uploadFileAnalysis ." --type csv --headerline" ; 
             
             
             $outputPersonal = shell_exec($commandPersonal);
             $outputAcademic = shell_exec($commandAcademic);
             $outputAlumini  = shell_exec($commandAlumini);
             $outputAnalysis = shell_exec($commandAnalysis);
             
             echo '<script type="text/javascript">alert("Data Imported");</script>';
            
            
           
                    
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
      
        <br><br>
        <b>
            <div class="container">
  
                <h2 class="center">Select Operation</h2>
                <br><br>
                <button type="button" class="btn btn-danger btn-lg btn-block " data-toggle="collapse" data-target="#importfile">Import</button>
                <div id="importfile" class="collapse out">
                    <form method="post" enctype='multipart/form-data'>
                        <center><h4>Files Available In Database Named Folder</h4></center>
                        <br>
                        <h3>Personal &nbsp;<input type="file" name="personal" id="personal"></h3>                         
                        
                        <h3>Academic &nbsp;<input type="file" name="academic" id="academic"></h3>                        
                        
                        <h3>Alumini &nbsp;<input type="file" name="alumini" id="alumini"></h3>                        
                        
                        <h3>Analysis &nbsp;<input type="file" name="analysis" id="analysis"></h3>                        
                        <br>
                        <center><input type="submit" class="btn btn-lg btn-success" name='submit' value="Import Data"></center>
                    </form>
                </div>
                <br>
                <button type="button" class="btn btn-danger btn-lg btn-block"  data-toggle="collapse" data-target="#exportfile">Export</button>

                <div id="exportfile" class="collapse out">
                    <h3>Select Format To Download</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 btn btn-default disabled">Excel</div>
                        <div class="col-md-4 btn btn-default">CSV</div>
                        <div class="col-md-4 btn btn-default disabled">PDF</div>
                    </div>
                </div>
            </div>
        </b>
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>

         
       <br><br><br><br><br>
       <footer class="footer">
           <div class="container-fluid">
               <center><h3>Project  BY</h3>
                   <p class="text-muted">Satvashila Bagal || Priyanka Karad || Mohit Kunjir || Sayyed Arfat</p></center>
      </div>
    </footer>
     
        
   </body>  
 </html>
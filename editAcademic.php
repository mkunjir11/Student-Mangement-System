<?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                	header("location: index.php");
            }
            $found2=0;
?>
 <?PHP
                
                    try 
                    {
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        
                        $collection = $db->acdInfo;
                        $result = $collection->findOne(array('_id' => $_SESSION['prnses']));
                        
                        $prn = $_SESSION['prnses'];
                        $password = $result['password'];
                        $yearAd = $result['yearAd'];
                        $rollNo = $result['rollNo'];
                        $dept = $result['dept'];
                        $bankAC = $result['bankAC'];
                        $classYear = $result['classYear'];
                        $yearPass = $result['yearPass'];
                        $isScholarship = $result['isScholarship'];
                        $sem1 = $result['sem1'];
                        $sem2 = $result['sem2'];
                        $sem3 = $result['sem3'];
                        $sem4 = $result['sem4'];
                        $sem5 = $result['sem5'];
                        $sem6 = $result['sem6'];
                        $sem7 = $result['sem7'];
                        $sem8 = $result['sem8'];
                                                           
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
    <title>Edit Academic Information</title>
	 
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
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Edit
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="editPersonal.php">Edit Personal</a></li>
                                <li><a href="editAcademic.php">Edit Academic</a></li>          
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
             <h1> Academic Information Fill Up Form</h1>
             <br><br>
                
            <hr>
            <form method="post">
                  <div class="form-group row">      
                    <div class="col-lg-3">       
                        <Label style="font-size: medium " >Class : </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?PHP if($classYear=="FE")
                            { ?>                  
                                <select name="classYear" required >
                                                      <option value="FE" selected="true">F.E.</option>
                                                      <option value="SE">S.E.</option>
                                                      <option value="TE">T.E.</option>
                                                      <option value="BE">B.E.</option>                                                      
                                                      <option value="Alumini">Alumini</option>         
                              </select>   
                        <?PHP } ?>
          
                        <?PHP if($classYear=="SE")
                            { ?>
                  
                                <select name="classYear" required >
                                                      <option value="FE" >F.E.</option>
                                                      <option value="SE" selected="true">S.E.</option>
                                                      <option value="TE">T.E.</option>
                                                      <option value="BE">B.E.</option>  
                                                      <option value="Alumini">Alumini</option> 
                                </select>   
                        <?PHP } ?>
          
                        <?PHP if($classYear=="TE")
                            { ?>                  
                                <select name="classYear" required >
                                                      <option value="FE" >F.E.</option>
                                                      <option value="SE" >S.E.</option>
                                                      <option value="TE" selected="true">T.E.</option>
                                                      <option value="BE">B.E.</option>  
                                                      <option value="Alumini">Alumini</option> 
                                </select>   
                        <?PHP } ?>
          
                        <?PHP if($classYear=="BE")
                            { ?>
                  
                                <select name="classYear" required  >
                                                      <option value="FE" >F.E.</option>
                                                      <option value="SE" >S.E.</option>
                                                      <option value="TE" >T.E.</option>
                                                      <option value="BE" selected="true">B.E.</option> 
                                                      <option value="Alumini">Alumini</option> 
                                </select>   
                        <?PHP } ?>
                        
                        <?PHP if($classYear=="Alumini")
                            { ?>
                  
                                <select name="classYear" required >
                                                      <option value="FE" >F.E.</option>
                                                      <option value="SE" >S.E.</option>
                                                      <option value="TE" >T.E.</option>
                                                      <option value="BE" >B.E.</option> 
                                                      <option value="Alumini " selected="true">Alumini</option> 
                                </select>   
                        <?PHP } ?>
      
                    </div>
                    <div class="col-lg-3">     
                        <Label style="font-size: medium " >Admission Year : </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                         <?PHP if($yearAd=="2011") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011" selected="true">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>
                        <?PHP if($yearAd=="2012") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" selected="true">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearAd=="2013") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" selected="true">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearAd=="2014") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" selected="true">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearAd=="2015") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" selected="true">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearAd=="2016") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016" selected="true">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>


                        <?PHP if($yearAd=="2017") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017"  selected="true">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearAd=="2018") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017" >2017</option>
                                                    <option value="2018"  selected="true">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>


                        <?PHP if($yearAd=="2019") { ?>
                        <select name="yearAd" required style="width: 70px; height: 20px" >
                                                    <option value="2011">2011</option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017" >2017</option>
                                                    <option value="2018" >2018</option>
                                                    <option value="2019"  selected="true">2019</option>

                        </select>   
                        <?PHP } ?>

                    </div>
                    <div class="col-lg-3">
                        <Label style="font-size: medium " >Graduation Year : </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?PHP if($yearPass=="" || $yearPass == 0) { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value="" selected="true"> </option>                                                   
                                                    <option value="2012" >2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>
                        <?PHP if($yearPass=="2012") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" selected="true">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearPass=="2013") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" selected="true">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearPass=="2014") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" selected="true">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearPass=="2015") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" selected="true">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearPass=="2016") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016" selected="true">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>


                        <?PHP if($yearPass=="2017") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017"  selected="true">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>

                        <?PHP if($yearPass=="2018") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017" >2017</option>
                                                    <option value="2018"  selected="true">2018</option>
                                                    <option value="2019">2019</option>

                        </select>   
                        <?PHP } ?>


                        <?PHP if($yearPass=="2019") { ?>
                        <select name="yearPass"  style="width: 70px; height: 20px" >
                                                    <option value=""> </option>
                                                    <option value="2012" >2012</option>
                                                    <option value="2013" >2013</option>
                                                    <option value="2014" >2014</option>
                                                    <option value="2015" >2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017" >2017</option>
                                                    <option value="2018" >2018</option>
                                                    <option value="2019"  selected="true">2019</option>

                        </select>   
                        <?PHP } ?>
                       
                    </div>   
                    <div class="col-lg-3">
                                <Label style="font-size: medium"> Scholarship: </label>
                                &nbsp;&nbsp;
                                <?PHP
                                    if($isScholarship == "yes") { ?>                 
                                        <input type="radio" required name="isScholarship" value="yes" checked="true">Yes
                                        &nbsp;&nbsp;
                                        <input type="radio" required name="isScholarship" value="no">No
              
                                <?PHP  } ?>
                                <?PHP
                                    if($isScholarship == "no") {
                                ?>
                                        <input type="radio" required name="isScholarship" value="yes" >Yes
                                    &nbsp;&nbsp;
                                    <input type="radio" required name="isScholarship" value="no" checked="true">No            
                                     <?PHP  } ?>
                            </div>
                </div>
                              
               <hr>
               
               <div class="form-group row">
                    <div class="col-lg-4">
                        <Label style="font-size: medium " >Roll no: </label>
                        <input type="number" required class="form-control" name="rollNo" placeholder="Roll No" value="<?php echo $rollNo; ?>">
                    </div>
                    <div class="col-lg-4">
                        <Label style="font-size: medium " >Branch : </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <?PHP if($dept=="IT") { ?>
                        <select name="dept" required style="width: 200px; height: 20px" >
                                                    <option value="IT" selected="true">Information Technology</option>
                                                    <option value="Computer">Computer Science</option>
                                                    <option value="EnTC">E & TC</option>
                                                    <option value="Mechanical">Mechanical</option>
                                                    <option value="Electrical">Electrical</option>
                        </select>
                        <?PHP } ?>

                        <?PHP if($dept=="Computer") { ?>
                        <select name="dept" required style="width: 200px; height: 20px" >
                                                    <option value="IT" >Information Technology</option>
                                                    <option value="Computer" selected="true">Computer Science</option>
                                                    <option value="EnTC">E & TC</option>
                                                    <option value="Mechanical">Mechanical</option>
                                                    <option value="Electrical">Electrical</option>
                        </select>
                        <?PHP } ?>


                        <?PHP if($dept=="EnTC") { ?>
                        <select name="dept" required style="width: 200px; height: 20px" >
                                                    <option value="IT" >Information Technology</option>
                                                    <option value="Computer" >Computer Science</option>
                                                    <option value="EnTC" selected="true">E & TC</option>
                                                    <option value="Mechanical">Mechanical</option>
                                                    <option value="Electrical">Electrical</option>
                        </select>
                        <?PHP } ?>

                        <?PHP if($dept=="Mechanical") { ?>
                        <select name="dept" required style="width: 200px; height: 20px" >
                                                    <option value="IT" >Information Technology</option>
                                                    <option value="Computer" >Computer Science</option>
                                                    <option value="EnTC">E & TC</option>
                                                    <option value="Mechanical"  selected="true">Mechanical</option>
                                                    <option value="Electrical">Electrical</option>
                        </select>
                        <?PHP } ?>

                        <?PHP if($dept=="Electrical") { ?>
                        <select name="dept" required style="width: 200px; height: 20px">
                                                    <option value="IT" >Information Technology</option>
                                                    <option value="Computer" >Computer Science</option>
                                                    <option value="EnTC">E & TC</option>
                                                    <option value="Mechanical">Mechanical</option>
                                                    <option value="Electrical" selected="true">Electrical</option>
                        </select>
                        <?PHP } ?>
                    </div>  
                    <div class="col-lg-4">
                        <Label style="font-size: medium " >Bank A/C No : </label>
                        <input type="number" required class="form-control" name="bankAC" placeholder="Bank A/C No" value="<?php echo $bankAC; ?>">
                    </div>         
                </div>
               <hr>               
               <div class="form-group row">     
                    <div class="col-lg-6">        
                        <Label style="font-size: medium " >Sem 1: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem1" placeholder="Enter Percentage" value="<?php echo $sem1; ?>">      
                    </div>
                    <div class="col-lg-6">     
                        <Label style="font-size: medium " >Sem 2: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem2" placeholder="Enter Percentage" value="<?php echo $sem2; ?>">
                    </div>
               </div>               
               <div class="form-group row">     
                    <div class="col-lg-6">   
                        <Label style="font-size: medium " >Sem 3: </label> 
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem3" placeholder="Enter Percentage" value="<?php echo $sem3; ?>">      
                    </div>
                    <div class="col-lg-6">     
                        <Label style="font-size: medium " >Sem 4: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem4" placeholder="Enter Percentage" value="<?php echo $sem4; ?>">
                    </div>
                </div>              
                <div class="form-group row">      
                    <div class="col-lg-6">   
                        <Label style="font-size: medium " >Sem 5: </label> 
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem5" placeholder="Enter Percentage" value="<?php echo $sem5; ?>">     
                    </div>
                    <div class="col-lg-6">     
                        <Label style="font-size: medium " >Sem 6: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem6" placeholder="Enter Percentage" value="<?php echo $sem6; ?>">
                    </div>
                </div>               
                <div class="form-group row">      
                    <div class="col-lg-6">       
                        <Label style="font-size: medium " >Sem 7: </label> 
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem7" placeholder="Enter Percentage" value="<?php echo $sem7; ?>">        
                    </div>
                   <div class="col-lg-6">
                        <Label style="font-size: medium " >Sem 8: </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="number" class="form-control" name="sem8" placeholder="Enter Percentage" value="<?php echo $sem8; ?>">
                    </div>
                </div>              
                <hr>
                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="editAcademic.php">Refresh</a>
            </form>                       
        </div>
        </b>       
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
   </body>  
 </html>
 
 <?PHP
  if($_SERVER["REQUEST_METHOD"] == "POST"){ 
                    try 
                    {
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        
                        
                        
                        $prn = $_SESSION['prnses'];
                        
                        $yearAd = (int)$_POST['yearAd'];
                        $scholarship = $_POST['isScholarship'];
                        $rollNo = (int)$_POST['rollNo'];
                        $dept = $_POST['dept'];
                        $bankAC = (int)$_POST['bankAC'];
                        $classYear = $_POST['classYear'];
                        $yearPass = (int)$_POST['yearPass'];
                        
                        $sem1 = (int)$_POST['sem1'];
                        $sem2 = (int)$_POST['sem2'];
                        $sem3 = (int)(int)$_POST['sem3'];
                        $sem4 = (int)$_POST['sem4'];
                        $sem5 = (int)(int)$_POST['sem5'];
                        $sem6 = (int)$_POST['sem6'];
                        $sem7 = (int)$_POST['sem7'];
                        $sem8 = (int)$_POST['sem8'];
                      
                        
                            $collection = $db->acdInfo;
                            
                            $collection->update(
						array('_id' => $prn),
						array('$set' =>array(    
                                                                            "password" => $password,
                                                                            "yearAd" => $yearAd,
                                                                            "isScholarship" => $scholarship,   
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
                                                                            "sem8" => $sem8,                   
                                                                            )),
                                                                        array("upsert" => true)
						);
                        if($classYear !="Alumini")
                        {    
                            $collection2 = $db->analysis;
                            $collection2->update(
						array('_id' => $prn),
						array('$set' =>array(                                                                             
                                                                            "yearAd" => $yearAd, 
                                                                            "isScholarship" => $scholarship,   
                                                                            "dept" => $dept,                                                                           
                                                                            "classYear" => $classYear,                                                                                             
                                                                            )),
                                                                        array("upsert" => true)
						);
                        }
                        else
                        {
                            if($yearPass!="")
                            {            
                                    
                                    $collection4 = $db->analysis;		
                                    $collection4->remove(array('_id' => $prn));
                                    
                                    $collection5 = $db->aluInfo;
                                    $result5 = $collection5->findOne(array('_id' => $prn));
                                    
                                    if (is_array($result5) || is_object($result5))
                                    {
                                        foreach ($result5 as $value)
                                        {
                                                $found2=1;                                                                     
                                        }
                                    }

                                    if($found2==1)
                                    { 
                                        
                                         $collection5->update(
						array('_id' => $prn),
						array('$set' =>array(                                                                             
                                                                        "yearPass" => $yearPass                                                                                                                                                                        
                                                                    )),
                                                                        array("upsert" => true)
						);
                                    }
                                    else
                            {
                                echo'<script type="text/javascript"> alert("No Placement Entry");</script>';
                            }
                                    
                            }
                            else
                            {
                                echo'<script type="text/javascript"> alert("Select Graduationt Year");</script>';
                            }
                        }
                            // disconnect from server
			    $conn->close();
                           echo'<script type="text/javascript"> alert("Data Updated");</script>';
                            
                        
                    
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
 ?>`
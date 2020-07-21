<!DOCTYPE html>
<?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                    header("location: index.php");
            }
            $flag1=0;
            $flag2=0;
            $flag3=0;
            $flag4=0;
?>
 
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
                                <li><a href="ByPRN.php">By PRN</a></li>
                                <li><a href="ByDepart.php">By Deparment</a></li>          
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
                <h2>Select Year & Department</h2>
    
                <fieldset>
                    <br><br>
                    <div> 
                        <Label style="color: red; font-size: medium" >Select Year</label>
                        &nbsp;&nbsp;&nbsp;
                        <select name="year" required="true">
                            <option value=2011>2011</option>
                            <option value=2012>2012</option>
                            <option value=2013>2013</option>
                            <option value=2014>2014</option>
                            <option value=2015 selected="true">2015</option>
                            <option value=2016>2016</option>
                            <option value=2017>2017</option>
                            <option value=2018>2018</option>
                            <option value=2019>2019</option>
                        </select>
                        
                        <div style="float: right">
                            <Label style="color: red; font-size: medium" >Scholarship</label>
                            &nbsp;&nbsp;&nbsp;
                            <select name="scholarship">
                                <option value=""> </option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>                               
                            </select>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <div>
                        <Label style="color: red; font-size: medium" >Select Department</label>
                        &nbsp;&nbsp;&nbsp;
                        <select name="department">
                            <option value=""> </option>
                            <option value="IT">Information Technology</option>
                            <option value="Computer">Computer Science</option>
                            <option value="EnTC">E & TC</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Electrical">Electrical</option>
                        </select>
                        
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <div>
                        <Label style="color: red; font-size: medium" >Select Academic Year</label>
                        &nbsp;&nbsp;&nbsp;
                        <select name="ay">
                            <option value=""> </option>
                            <option value="FE">FE</option>
                            <option value="SE">SE</option>
                            <option value="TE">TE</option>
                            <option value="BE">BE</option>
                            <option value="alumini">Alumini</option>         
                        </select>
                    </div>
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
    
        <b>
            <div class="container">
                <h2>Department Wise Data</h2>

                <hr>
                
                <Label style="color: red;font-size: medium" ><br><?PHP if($_SERVER["REQUEST_METHOD"]=="POST"){echo "Filters set :: Year: ".$year=$_POST['year'].";  Department: ".$dept=$_POST['department'].";  Academic Year: ".$ay=$_POST['ay'].";  Scholarship: ".$scholarship=$_POST['scholarship'];} ?></label>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PRN</th>
                            <th>First Name </th>
                            <th>Last Name </th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                   
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")  
            {
                $year =(int) $_POST['year'];
                $dept = $_POST['department'];           
                $acdYear = $_POST['ay'];
                
                $scholarship = $_POST['scholarship'];
                
                try 
                {
                    // open connection to MongoDB server
                    $conn = new MongoClient();
                    $db = $conn->selectDB("studentSystem");
                    // access collection
                    $collection = $db->analysis;
                    /*$cursor = $collection->find(array('yearAd' => $year, 'dept' => $dept, 'classYear' => $acdYear)); */
                    if($dept == "")   
                    {
                        
                        if($acdYear == "" && $scholarship != "")
                        {
                            $cursor = $collection->find(array('yearAd' => $year,  'isScholarship' => $scholarship));
                            
                        }
                        else if($scholarship == "" && $acdYear != "")
                        {
                            $cursor = $collection->find(array('yearAd' => $year,  'classYear' => $acdYear));
                           
                        }
                        else if($scholarship != "" && $acdYear != "" )
                        {
                            $cursor = $collection->find(array('yearAd' => $year, 'classYear' => $acdYear, 'isScholarship' => $scholarship));
                           
                            /*academic year wise strength of scholarship taking or not taking students*/                         
                        }
                        else
                        {
                            $cursor = $collection->find(array('yearAd' => $year));
                           
                            $flag1=1;
                        }
                    }
                    else if($acdYear == "")
                    {
                        
                        if($scholarship == "" && $dept != "")  //academic yearwise strength
                        {
                            $cursor = $collection->find(array('yearAd' => $year, 'dept' => $dept));
                            $flag2=1;
                            
                        }
                        else if($dept != "" && $scholarship != "")
                        {
                            $cursor = $collection->find(array('yearAd' => $year, 'dept' => $dept, 'isScholarship' => $scholarship));   
                            
                        }
                    }
                    else if($scholarship == "")
                    {               
                         
                        if($dept != "" && $acdYear != "")
                        {
                            
                            $cursor = $collection->find(array('yearAd' => $year, 'dept' => $dept, 'classYear' => $acdYear));
                            
                            $flag3=1;
                            // genderwise strength of particular class
                            
                        }
                    }
                    else if($dept != "" && $acdYear != "" && $scholarship != "")
                    {
                        $cursor = $collection->find(array('yearAd' => $year, 'dept' => $dept, 'classYear' => $acdYear, 'isScholarship' => $scholarship));
                       
                        $flag4=1;
                        /*strength of scholarship taking or not taking student in a class*/                          
                    }
                    
        ?>
        <?PHP
                    // iterate cursor to display title of documents                   
                      
                    foreach ($cursor as $document) 
                    {    
                         
        ?>
                            <tr>
                                <td><a href="student-page-get.php?cid=<?php echo $document["_id"]; ?>"> <?php echo $document["_id"]."\n"; ?></a></td>
                                <td><?php echo $document["fname"] . "\n"; ?></td>
                                <td><?php echo $document["lname"] . "\n"; ?></td>
                                <td> 
                                    <a href="delstudent.php?cid=<?php echo $document["_id"]; ?>"><strong>delete</strong></a>&nbsp;
                                </td>   <br>
                            </tr>
                        
        <?php 
                    }
									
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
                }
        ?>                     
                      </tbody>
                </table>
            </div>
        </b>
    
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
    
   </body>         
</html>
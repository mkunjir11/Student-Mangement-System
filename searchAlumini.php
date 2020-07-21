<!DOCTYPE html>
<?php
            session_start();
            if($_SESSION['authentication']!=1)
            {
                    header("location: index.php");
            }
            $found=0;
            
?>
 
<html>
  <head>
    <meta charset="UTF-8">
    <title>Search Alumini</title>
  
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
        <div class="container" id="tf-search">  
            
            <form id="contact" action="" method="post">
                <h2>Select Year & Department</h2>
                 <br><br>
                <fieldset>
                    <div>
                        <Label style="color: red; font-size: medium" >PRN:</label>   
                        &nbsp;&nbsp;&nbsp;
                        <input placeholder="Enter PRN" type="text" tabindex="3" name="prn">
                    </div>
                </fieldset>
                  <br><br>
                <fieldset>
               
                    <div> 
                        <Label style="color: red; font-size: medium" >Select Graduation Year</label>
                        &nbsp;&nbsp;&nbsp;
                        <select name="year" >
                            <option value=""></option> 
                            <option value=2011>2011</option>
                            <option value=2012>2012</option>
                            <option value=2013>2013</option>
                            <option value=2014>2014</option>
                            <option value=2015>2015</option>
                            
                        </select>
                        
                        <div style="float: right" >
                            <Label style="color: red; font-size: medium" >Select Department</label>
                            &nbsp;&nbsp;&nbsp;
                            <select name="department">           
                             <option value=""></option>   
                            <option value="IT">Information Technology</option>
                            <option value="Computer">Computer Science</option>
                            <option value="EnTC">E & TC</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Electrical">Electrical</option>
                        </select>
                        </div>
                    </div>
                </fieldset>
                <br>             
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
    
        
                   
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")  
            {
                $prn=$_POST['prn'];
                
                $year =(int) $_POST['year'];
                $dept = $_POST['department'];           
                
                
                
                
                try 
                {
                    // open connection to MongoDB server
                    $conn = new MongoClient();
                    $db = $conn->selectDB("studentSystem");
                    // access collection
                    $collection = $db->acdInfo;
                    
                    if($prn != "")
                    {          
                        
                        $cursor = $collection->find(array('_id' => $prn, 'classYear' => "Alumini"));  
                        if (is_array($cursor) || is_object($cursor))
                        {
                            foreach ($cursor as $value)
                            {
                                    $found=1;                                                        
                            }
                        }
                        if($found!=1)
                        {
                            echo'<script type="text/javascript"> alert("No Such PRN in database");</script>';
                            
                        }
                    }
                    else 
                    {
                        $cursor = $collection->find(array('yearPass' => $year, 'dept' => $dept, 'classYear' => "alumini")); 
                        if (is_array($cursor) || is_object($cursor))
                        {
                            foreach ($cursor as $value)
                            {
                                    $found=1;                                                        
                            }
                        }
                        if($found!=1)
                        {
                            echo'<script type="text/javascript"> alert("No Data Found");</script>';
                            
                        }
                    }
                    
                    
        ?>
       
                                      
                    <b>
            <div class="container">
                <h2>Search Results</h2>

                <hr>
                
                <Label style="color: red;font-size: medium" ><br><?PHP echo 'Filters set :: Year: '.$year.'; Department: '.$dept; ?></label>
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
        <?PHP         
                    
                    $collection4=$db->perInfo;
                    
                    foreach ($cursor as $document) 
                    {    
                        $cursor2=$collection4->findOne(array('_id' => $prn));
                         
        ?>
                            <tr>
                                <td><a href="student-page-get.php?cid=<?php echo $document["_id"]; ?>"> <?php echo $document["_id"]."\n"; ?></a></td>
                                <td><?php echo $cursor2["fname"] . "\n"; ?></td>
                                <td><?php echo $cursor2["lname"] . "\n"; ?></td>
                                <td> 
                                    <a href="delstudent.php?cid=<?php echo $document["_id"]; ?>"><strong>delete</strong></a>&nbsp;
                                </td>   <br>
                            </tr>
                            
                        
        <?php 
                    }
                   
        ?>            
			 </tbody>
                </table>
            </div>
        </b>
    
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>	
                    <?PHP
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
    
           
        
   </body>         
</html>
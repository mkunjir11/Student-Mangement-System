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
    
                <fieldset>
                    <br><br>
                    <div> 
                        <Label style="color: red; font-size: medium" >Passed-Out Year</label>
                        &nbsp;&nbsp;&nbsp;
                        <select name="year" required="true">
                            <option value=2011>2011</option>
                            <option value=2012>2012</option>
                            <option value=2013 >2013</option>
                            <option value=2014 selected="true">2014</option>
                            <option value=2015 >2015</option>
                            <option value=2016>2016</option>
                            <option value=2017>2017</option>
                            <option value=2018>2018</option>
                            <option value=2019>2019</option>
                        </select>
                         
                        <div style="float: right">
                            <Label style="color: red; font-size: medium" >Department</label>
                            &nbsp;&nbsp;&nbsp;
                            <select name="dept">      
                                <option value=""></option>
                                <option value="IT">Information Technology</option>
                                <option value="Computer">Computer Science</option>
                                <option value="EnTC">E&TC</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Electrical">Electrical</option>                            
                            </select>
                        </div>
                    </div>
                </fieldset>
                
                <fieldset>
                    <br><br>
                    <div>
                        <Label style="color: red; font-size: medium" >Company</label>
                        &nbsp;&nbsp;&nbsp;
                        <select name="colCompany">
                            <option value="" ></option>
                            <option value="GS Lab" >GS Lab</option>
                            <option value="TCS" >TCS</option>
                            <option value="KPIT Cummins">KPIT Cummins</option>
                            <option value="Tata Tech">Tata Tech</option>
                            <option value="Atlas Copco">Atlas Copco</option>
                            <option value="Persistent">Persistent</option>
                            <option value="Tech Mahindra">Tech Mahindra</option>     
                             <option value="Kirloskar">Kirloskar</option>   
                             <option value="Mahindra Conveyors">Mahindra Conveyors</option> 
                             <option value="Bosch">Bosch</option> 
                             <option value="Faurecia">Faurecia</option> 
                             <option value="3dPLM">3dPLM</option> 
                             <option value="Sanmar">Sanmar</option> 
                             <option value="Flextronicx">Flextronicx</option> 
                             <option value="Suzlon">Suzlon</option> 
                             <option value="Efficienergy">Efficienergy</option> 
                             <option value="Whirlpool">Whirlpool</option> 
                             <option value="ZTE">ZTE</option> 
                              <option value="L&T Info">L&T Info</option> 
                              <option value="Nvidia">Nvidia</option> 
                              <option value="Bosch">Bosch</option> 
                               
                                 
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
    
        
                   
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")  
            {
                $year =(int) $_POST['year'];
                $dept = $_POST['dept'];           
                $colCompany=$_POST['colCompany'];   
                
                
                try 
                {
                    // open connection to MongoDB server
                    $conn = new MongoClient();
                    $db = $conn->selectDB("studentSystem");
                    // access collection
                    $collection = $db->aluInfo;
                    /*$cursor = $collection->find(array('yearPass' => $year, 'adept' => $dept, 'colCompany' => $colCompany));*/
                    
                    if($year != "")
                    {
                       
                        if($dept != "" && $colCompany == "")
                        {
                            
                            $cursor = $collection->find(array('yearPass' => $year, 'adept' => $dept));
                            $flag1=1;
                        }
                        else if($colCompany != "" && $dept == "")
                        {
                            
                            $cursor = $collection->find(array('yearPass' => $year, 'colCompany' => $colCompany));
                            $flag2=1;
                        }                      
                        else if($colCompany != "" && $dept != "")
                        {
                           
                            $cursor = $collection->find(array('yearPass' => $year, 'adept' => $dept, 'colCompany' => $colCompany));
                        }
                        else if($colCompany == "" && $dept == "")
                        {
                             
                            echo '<script type="text/javascript"> alert("Either Select Company or Department");</script>'; 
                            $flag4=1;
                        }
                    }
                    
        
                // construct map and reduce functions
                if($flag1==1) 
                {
                        $map = new MongoCode("function() { emit(this.colCompany,1); }");
                        $reduce = new MongoCode("function(k, vals) { ".
			"var i=0, sum = 0;".
			"for (i in vals) {".
			"sum += vals[i];}".
			"return sum ;".
			"}");
                        $result = $db->command(array(
			"mapreduce" => "aluInfo", 
			"map" => $map,
			"reduce" => $reduce,
                         "query" => array("yearPass" => $year,"adept" => $dept),
			"out" => 'test_mapreduce_company'));
			
                        $users = $db->selectCollection('test_mapreduce_company')->find();
		
	?>
			 <!-- load api -->
                        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
                        <script type="text/javascript">
                            //load package
                            google.load('visualization', '1', {packages: ['corechart']});
                        </script>

                        <script type="text/javascript">
                                function drawVisualization() 
                                {
                                    // Create and populate the data table.
                                    var data = google.visualization.arrayToDataTable([
                                        ['Dept', 'Students'],
                                        <?php
                                        foreach ($users as $document){
                                            extract($document);
                                            echo "['{$_id}', {$value}],";
                                        }
                                        ?>
                                    ]);

                                    // Create and draw the visualization.
                                    new google.visualization.PieChart(document.getElementById('visualization')).
                                    draw(data, {title:"Placements of <?PHP echo $dept; ?> Departmet for year <?PHP echo $year;?>"});
                                }
                                google.setOnLoadCallback(drawVisualization);
                           </script>
        
            <?PHP
                }
                if($flag2==1)
                {
                        $map = new MongoCode("function() { emit(this.adept,1); }");
                        $reduce = new MongoCode("function(k, vals) { ".
			"var i=0, sum = 0;".
			"for (i in vals) {".
			"sum += vals[i];}".
			"return sum ;".
			"}");
                    
                        $result = $db->command(array(
			"mapreduce" => "aluInfo", 
			"map" => $map,
			"reduce" => $reduce,
                         "query" => array("yearPass" => $year,"colCompany" => $colCompany),
			"out" => 'test_mapreduce_department'));
			
                        $users = $db->selectCollection('test_mapreduce_department')->find();
		
                ?>
			 <!-- load api -->
                        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
                        <script type="text/javascript">
                            //load package
                            google.load('visualization', '1', {packages: ['corechart']});
                        </script>
 
                        <script type="text/javascript">
                            function drawVisualization() 
                            {
                                // Create and populate the data table.
                                var data = google.visualization.arrayToDataTable([
                                ['Dept', 'Students'],
                                <?php
                                foreach ($users as $document){
                                    extract($document);
                                    echo "['{$_id}', {$value}],";
                                }
                                ?>
                                ]);
 
                                // Create and draw the visualization.
                                new google.visualization.PieChart(document.getElementById('visualization')).
                                draw(data, {title:"Placements of <?PHP echo $colCompany; ?> Company for year <?PHP echo $year;?>"});
                            }
 
                            google.setOnLoadCallback(drawVisualization);
			
                        </script>
            <?PHP
                        }
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
                 <b>
                    <div class="container" id="analysis">
                        <center><h2>Analysis</h2></center>				
                        <hr>
				<section>
                                    <center><div id="visualization" style="width: 600px; height: 400px;"></div></center>
				</section>
                                
                    </div>
                     <div class="container-fluid">
                            <hr style="border: 1px solid #000">
                    </div> 
                
                    <div class="container">
                        <center><h2>Grid View</h2></center>   
                         <hr>
                        <Label style="color: red;font-size: medium" ><br><?PHP echo "Filters Set ::  Year: ".$year."; Department: ".$dept. "; Company: ".$colCompany; ?></label>
                            
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>PRN</th>
                                    <th>First Name </th>
                                    <th>Last Name </th>
                                    <th>Department </th>
                                    <th>Company</th>
                                </tr>
                            </thead>
                            <tbody>
        <?PHP
                    // iterate cursor to display title of documents                   
                     if($flag4!=1)
                     {
                            foreach ($cursor as $document) 
                            {    

                ?>
                                    <tr>
                                        <td><a href="viewAlumini.php?cid=<?php echo $document["_id"]; ?>"> <?php echo $document["_id"]."\n"; ?></a></td>
                                        <td><?php echo $document["afname"] . "\n"; ?></td>
                                        <td><?php echo $document["alname"] . "\n"; ?></td>
                                        <td><?php echo $document["adept"] . "\n"; ?></td>
                                        <td> <?php echo $document["colCompany"] . "\n";?></td>
                                        <br>   

                                    </tr>

                <?php 
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
        <?PHP       
        
                }
        ?>                                                     
        
   </body>         
</html>

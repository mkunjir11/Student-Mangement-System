<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PVGCOET Student Management System</title>
    
	 <link rel="stylesheet" href="css/login.css">
		
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css"  href="css/image1.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Slider
        ================================================== -->
        <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
        <link href="css/owl.theme.css" rel="stylesheet" media="screen">

        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script type="text/javascript" src="js/modernizr.custom.js"></script>
       
  </head>

  <body>
  
  
  <?PHP
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
	session_start();
	$_SESSION['authentication'] = 0;
	
	try 
	{
                // open connection to MongoDB server
                $conn = new MongoClient();
		
		//select Database
		$db = $conn->selectDB("studentSystem");
		
		//retrive username, password and user type from login form
                $storedUsername = $_POST['username'];
                $storedPassword = $_POST['password'];
                $storedLoginType= $_POST['usertype'];
                
                
		$_SESSION['userType'] = $_POST['usertype'];
                

		$found = 0;
		
		if ($storedLoginType=="admin")
		{			
			$collection = $db->admin;
                        $result = $collection->findOne(array('username' => $storedUsername, 'password' => $storedPassword));
		}
		else if($storedLoginType=="students")
                {			
			$collection = $db->acdInfo;                       
                        $result = $collection->findOne(array('_id' => $storedUsername, 'password' => $storedPassword));
                        $status=$result['classYear'];
                }	
		else if($storedLoginType=="alumini")
                {
                    $collection = $db->acdInfo;                   
                    $result = $collection->findOne(array('_id' => $storedUsername, 'password' => $storedPassword, 'classYear' => "Alumini" ));
                }
		
		//Iterates through the found results
				
		if (is_array($result) || is_object($result))
		{
                    foreach ($result as $value)
                    {
			    $found=1;
                            
			    $_SESSION['authentication'] = 1;                        
                    }
		}
				
		if($found==1)
		{ 
                    
                    if ($storedLoginType=="admin")
                    {	
			header("location: admin-page.php");
                    }
                    else if ($storedLoginType=="students")
                    {
                        if($status != "Alumini")
                        {
                            $_SESSION['fnameses']=$result['fname'];
                            $_SESSION['prnses']=$result['_id'];                        
                            header("location: student-page.php");
                        }
                        else
                        {
                            echo'<script type="text/javascript"> alert("No Such PRN in Student database");</script>';
                        }
                    }
                    else if($storedLoginType=="alumini")
                    {
                        
                        $_SESSION['prnses']=$result['_id'];
                       
			header("location: aluinfo.php");
                    }
		}
		else
		{
                    if ($storedLoginType=="admin")
                    {			
			echo'<script type="text/javascript"> alert("Incorrect Administrator credentials");</script>';
                    }
                    else if($storedLoginType=="students")
                    {			
                        echo'<script type="text/javascript"> alert("No Such PRN in Student database");</script>';
                    }	
                    else if($storedLoginType=="alumini")
                    {
                        echo'<script type="text/javascript"> alert("We could not locate your PRN");</script>';
                    }
                   
                    $wrongflag = 1;
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
        <div id="tf-contact" class="text-center">
           <div class="container">
               <h1  style="font-size: 50px"><strong>Student Management System</strong></h1>
               <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                       <div class="section-title center">
                           
                           <br>
                           <h2>Please Login</h2>
                           <div class="line">
                               <hr>
                           </div>
                           <div class="clearfix">	                    
                           </div>
                       </div>
                       <form method="post">
                           <div class="row">
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label style="font-size: large" for="username" >Username</label>
                                       <input type="text" class="form-control" name="username" placeholder="Enter Username" required="true">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label style="font-size: large" for="password">Password</label>
                                       <input type="password" class="form-control" name="password" placeholder="Enter Password" required="true">
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <label style="font-size: large" for="usertype">Select User Type</label>
                               <input type="radio" name="usertype" value="admin" checked required="true"> Administrator 
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="radio" name="usertype" value="students" required="true"> Students
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="radio" name="usertype" value="alumini" required="true"> Alumini
                           </div>
                           <button type="submit" formmethod="post" class="btn tf-btn btn-default">Log In</button>
                           
                       </form>
                        </div>
                   
                        <br><br>
                           
                   
               </div>
           </div>
       </div>
      
       
       <footer class="footer">
           <div class="container-fluid">
               <center><h3>Project  BY</h3>
                   <p class="text-muted">Satvashila Bagal || Priyanka Karad || Mohit Kunjir || Sayyed Arfat</p></center>
      </div>
    </footer>
      
  </body>
</html>
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
                        $conn = new MongoClient();
                       
                        $db = $conn->selectDB("studentSystem");
                                                                
                        $collection = $db->aluInfo;                                               
                        
                        $prn = $_SESSION['prnses'];                                                                       
                        $result = $collection->findOne(array('_id' => $prn));
                        
                        $address=$result['address'];
                        $emailId=$result['emailId'];
                        $contact=$result['contactNo'];                        
                        $company = $result['company'];
                        $designation = $result['designation'];
                        $experience = $result['experience'];
                        $facebook = $result['facebook'];
                        $twitter = $result['twitter'];
                        $linkedin = $result['linkedin'];
                        $website=$result['website'];                       
                                              
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
    <title>Edit Career Information</title>
	 
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
                        <li><a href="aluinfo.php" class=" btn btn-success">Home</a></li>
                        <li><a href="manageAlumini.php" class="page-scroll">Change Password</a></li> 
                        <li><a href="UpdateAlumini.php" class="page-scroll">Update Information</a></li>
                        <li><a href="index.php" class=" btn btn-danger">Log Out</a></li>
                    </ul>
                </b>
                </div><!-- 
            </div><!-- /.container-fluid -->
        </nav>
      <b>
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
         <div class="container">
                             
                <form method="post">                                         
                        <div class="form-group row">
                            <div class="col-md-12" >
                                <h3> Update Personal Information </h3>
                                <br>
                            </div> 
                        </div>  
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Address :  </label>
                                <input type="text" class="form-control"  name="address" placeholder="Enter Address" value="<?php echo $address; ?>">
                            </div>
                            <div class="col-lg-4">
                                 <Label style="font-size: medium" >Email :  </label>
                                <input type="text" class="form-control" name="emailId" placeholder="Enter Email" value="<?php echo $emailId; ?>">
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Contact : </label>
                                 <input type="text" class="form-control"  name="contact" placeholder="Enter Contact" value="<?php echo $contact; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-12" >
                                <h3> Update Career Information </h3>
                                <br>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Company :  </label>
                                <input type="text" class="form-control"  name="company" placeholder="Enter Current Company" value="<?php echo $company; ?>">
                            </div>
                            <div class="col-lg-4">
                                 <Label style="font-size: medium" >Designation :  </label>
                                <input type="text" class="form-control"  name="designation" placeholder="Enter Designation" value="<?php echo $designation; ?>">
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Experience : </label>
                                 <input type="text" class="form-control"  name="experience" placeholder="Experience in years at the new Company" value="<?php echo $experience; ?>">
                            </div>
                        </div>
                        <hr>                       
                        <div class="form-group row">
                            <div class="col-md-12" >
                                <h3> Update Social Information </h3>
                                <br>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <Label style="font-size: medium" >LinkedIn :  </label>
                                <input type="text" class="form-control"  name="linkedin" placeholder="Link of LinkedIN Profile" value="<?php echo $linkedin; ?>">
                            </div>
                            <div class="col-lg-3">
                                 <Label style="font-size: medium" >Facebook :  </label>
                                <input type="text" class="form-control"  name="facebook" placeholder="Link of Facebook Profile" value="<?php echo $facebook; ?>">
                            </div>
                            <div class="col-lg-3">
                                <Label style="font-size: medium" >Twitter Handle : </label>
                                 <input type="text" class="form-control"  name="twitter" placeholder="Link of Twitter Handle" value="<?php echo $twitter; ?>">
                            </div>
                            <div class="col-lg-3">
                                <Label style="font-size: medium" >Website or Blog : </label>
                                 <input type="text" class="form-control"  name="website" placeholder="Link of any Website or Blog" value="<?php echo $website; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-1 col-lg-offset-5">
                                 <button type="submit" class="btn btn-primary">Submit</button>    
                           </div>
                            <div class="col-lg-1 ">
                                 <a href="UpdateAlumini.php">Refresh</a> 
                            </div>
                        </div>
                            
                          
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
                        
                        $collection = $db->aluInfo;
			$collection1 = $db->perInfo;
                        
                        $prn = $_SESSION['prnses'];
                        
                        $address=$_POST['address'];
                        $emailId=$_POST['emailId'];
                        $contact=$_POST['contact'];
                        $website=$_POST['website'];
                        $company = $_POST['company'];
                        $designation = $_POST['designation'];
                        $experience = $_POST['experience'];
                        $facebook = $_POST['facebook'];
                        $twitter = $_POST['twitter'];
                        $linkedin = $_POST['linkedin'];
                        
                        $collection->update(
						array('_id' => $prn),
						array('$set' => array(       						                                                
                                                                        "address" => $address,
                                                                         "emailId" => $emailId,
                                                                         "contactNo" => $contact,
                                                                         "website" => $website,
                                                                         "company" => $company,
                                                                         "designation" => $designation,
                                                                         "experience" => $experience,
                                                                         "facebook" => $facebook,
                                                                         "twitter" => $twitter,
                                                                         "linkedin" => $linkedin
                                                    )),
                                                                        array("upsert" => true)
						);
                        $collection1->update(
						array('_id' => $prn),
						array('$set' => array(       						                                                
                                                                        "address" => $address,                                                                      
                                                                        "contact" => $contact,                                                                                                                                                                                                                   
                                                                        "emailId" => $emailId                                                                   	
                                                                       )),
                                                                        array("upsert" => true)
						);
                         // disconnect from server
			$conn->close();
                        echo'<script type="text/javascript"> alert("Information Updated");</script>';     
                        
                        
                    } catch (Exception $ex) 
                    {

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
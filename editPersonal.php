<?PHP
            session_start();
            if($_SESSION['authentication'] != 1) 
            {
                    header("location:index.php");
            }
?>

<?PHP
                    try 
                    {                       
                        // open connection to MongoDB server
                        $conn = new MongoClient();
		
                        //select Database
                        $db = $conn->selectDB("studentSystem");
                        $collection = $db->perInfo;
                        
                        $result = $collection->findOne(array('_id' => $_SESSION['prnses']));
                        			
                        $prn = $result['_id'];
                        $fname = $result['fname'];            
                        $mname = $result['mname'];
                        $lname = $result['lname'];
                        $mother = $result['mother'];
                        $state = $result['state'];
                        $address = $result['address'];
                        $gender = $result['gender'];           
                        $caste = $result['caste'];
                        $nationality = $result['nationality'];
                        $bloodGroup = $result['bloodGroup'];
                        $emailId = $result['emailId'];
                        $contact = $result['contact'];
                        $dob = $result['dob'];                       
                        $handicap = $result['handicap'];
                        $admcat = $result['admcat'];
                        
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
    <title>Edit Personal Information</title>
	 
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
    
        <link rel="stylesheet" type="text/css" href="js/codebase/fonts/font_roboto/roboto.css"/>
	<link rel="stylesheet" type="text/css" href="js/codebase/dhtmlxcalendar.css"/>
	<script src="js/codebase/dhtmlxcalendar.js"></script>
	<style>
		#calendar
		{
			border: 1px solid #dfdfdf;
			font-family: Roboto, Arial, Helvetica;
			font-size: 14px;
			color: #404040;
		}
	</style>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["cal_1"]);
		}
	</script>
    
   </head>
   <body onload="doOnLoad();">
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
   
	 <?PHP 
        if($_SESSION['userType'] == "students") {
        ?>
	<Label style="font-size: medium" >Hello <?PHP echo $_SESSION['fnameses']; ?> </label> 
        <?PHP } ?>
        
        <div style="height: 10px">
            
        </div>
        
        <div class="container-fluid">
            <hr style="border: 1px solid #000">
        </div>
        
        <br><br>
        <b>
            
            <div class="container">
                <h1> Personal Information Fill Up Form</h1>
                <br><br>
                
                <hr>
                <form method="post">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >First Name :  </label>
                                <input type="text" class="form-control" required name="fname" placeholder="Enter First Name" value="<?php echo $fname; ?>">
                            </div>
                            <div class="col-lg-4">
                                 <Label style="font-size: medium" >Middle Name :  </label>
                                <input type="text" class="form-control" required name="mname" placeholder="Enter Middle Name" value="<?php echo $mname; ?>">
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Last Name : </label>
                                 <input type="text" class="form-control" required name="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                  
                                  <Label style="font-size: medium" >Mother's Name : </label>
                                  <input type="text" class="form-control" required name="mother" placeholder="Enter Mothers Name" value="<?php echo $mother; ?>">
                            </div>
                            <div class="col-lg-6 disabled">
                                <Label style="font-size: medium" >PRN : </label>
                                <input type="text" class="form-control" required name="prn" placeholder="Enter PRN" value="<?php echo $prn; ?> " readonly="true">
                            </div>
                           
                        </div>               
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >State : </label>
                                <input type="text" class="form-control" required name="state" placeholder="Enter State" size="10" value="<?php  echo $state; ?>">                                 
                             </div>
                             <div class="col-lg-4">
                                <Label style="font-size: medium" >Caste : </label>                                    
                                     &nbsp;&nbsp;
                                <?PHP
                                        if($caste=="Open")
                                        {  ?>                                   
                                            &nbsp;&nbsp;<input type="radio" required name="caste" value="Open" checked="true">Open
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="OBC">OBC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" required name="caste" value="SC">SC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" required name="caste" value="NT">NT
                                <?php   } ?>
                                <?PHP
                                       if($caste=="OBC")
                                        {  ?>
                                            &nbsp;&nbsp;<input type="radio" required name="caste" value="open" >Open
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="OBC" checked="true">OBC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="SC">SC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="NT">NT
                                <?php   } ?>
                                <?PHP
                                        if($caste=="SC")
                                        {   ?>
                                            &nbsp;&nbsp;<input type="radio" required name="caste" value="open" >Open
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="OBC">OBC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="SC" checked="true">SC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="NT">NT
                                <?php   } ?>
                                            
                                <?PHP
                                        if($caste=="NT")
                                        {    ?>
                                            &nbsp;&nbsp;<input type="radio" required name="caste" value="open">Open
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="OBC">OBC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="SC">SC
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="caste" required value="NT"  checked="true">NT
                                <?php   } ?>
                                            
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Gender : </label>                                    
                                     &nbsp;&nbsp;
                                <?PHP
                                        if($gender=="male")
                                        {    ?>  
                                            &nbsp;&nbsp;<input type="radio" name="gender" value="male" checked="true" required>Male
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="gender" required value="female">Female
                                <?php   } ?>
                                <?PHP
                                        if($gender=="female")
                                        {    ?>  
                                            &nbsp;&nbsp;<input type="radio" required name="gender" value="male">Male
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="gender" required value="female" checked="true">Female
                                 <?php   } ?>            
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <Label style="font-size: medium" >Address : </label>
                                <input type="text" class="form-control" required name="address" placeholder="Enter Address"  value="<?php echo $address; ?>">
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium" >Admission Type :  </label>                                    
                                &nbsp;&nbsp;
                                <?PHP
                                       if($admcat=="Cap")
                                       {    ?>
                                            <input type="radio" required name="admcat" value="Cap" checked="true">CAP
                                            &nbsp;&nbsp;
                                            <input type="radio" required name="admcat" value="Management">Management
                                <?php  }        ?>                                   
                                <?PHP
                                        if($admcat=="Management")
                                        {?>
                                            <input type="radio" required name="admcat" value="CAP" >CAP
                                            &nbsp;&nbsp;
                                            <input type="radio" required name="admcat" value="Management" checked="true">Management
                                <?php    }        ?>
                            </div>
                        </div>           
                        <hr>
                        <div class="form-group row">
                               <div class="col-lg-4">
                               <Label style="font-size: medium " >Nationality : </label>
                               &nbsp;&nbsp;&nbsp;&nbsp;
                               <?PHP if($nationality=="Indian") {
                                   ?>
                               <select name="nationality" required style="width: 70px; height: 20px" >
                                   <option value="Indian" selected="=true">Indian</option>
                                    <option value="Other">Other</option>
                                </select>
                               
                               <?PHP } ?>
                               
                                <?PHP if($nationality=="Other") {
                                   ?>
                               <select name="nationality" required style="width: 70px; height: 20px" >
                                   <option value="Indian" >Indian</option>
                                    <option value="Other" selected="=true">Other</option>
                                </select>
                               
                               <?PHP } ?>
                                </div>


                           <div class="col-lg-4">
                               
                                    <Label style="font-size: medium" >Blood Group : </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <?PHP 
                                    if($bloodGroup=="A+") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" selected="true">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+" selected>B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    <?PHP 
                                    if($bloodGroup=="AB+") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+" selected="true">AB+</option>
                                        <option value="AB-" >AB-</option>
                                        <option value="B+" >B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    <?PHP 
                                    if($bloodGroup=="AB-") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-" selected="true">AB-</option>
                                        <option value="B+" >B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    
                                    <?PHP 
                                    if($bloodGroup=="A-") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-" selected="true">A-</option>
                                        <option value="AB+" >AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+" >B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    
                                    
                                    
                                    <?PHP 
                                    if($bloodGroup=="B+") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+" selected="true">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    
                                    <?PHP 
                                    if($bloodGroup=="B-") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+" >B+</option>
                                        <option value="B-" selected="true">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    
                                    <?PHP 
                                    if($bloodGroup=="O+") {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+" >B+</option>
                                        <option value="B-" >B-</option>
                                        <option value="O+" selected="true">O+</option>
                                        <option value="O-">O-</option>

                                    </select>
                                    <?PHP } ?>
                                    
                                    <?PHP 
                                    if($bloodGroup=="O-") 
                                        {
                                    ?>
                                    <select name="bloodGroup" required style="width:70px;height:20px">

                                        <option value="A+" >A+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B+" >B+</option>
                                        <option value="B-" >B-</option>
                                        <option value="O+" >O+</option>
                                        <option value="O-" selected="true">O-</option>

                                    </select>
                                    <?PHP } ?>                                                                                                          
                           </div>
                           <div class="col-lg-4">
                                <Label style="font-size: medium"> Physical Handicap : </label>
                                &nbsp;&nbsp;
                                <?PHP
                                    if($handicap=="yes") 
                                    {   ?>                                   
                                        <input type="radio" required name="handicap" value="yes" checked="true">Yes
                                        &nbsp;&nbsp;
                                        <input type="radio" required name="handicap" value="no">No
               
                                <?PHP } ?>
                                <?PHP
                                    if($handicap=="no")
                                     { ?>                                   
                                        <input type="radio" required name="handicap" value="yes" >Yes
                                        &nbsp;&nbsp;
                                        <input type="radio" required name="handicap" value="no" checked="true">No
                                 <?PHP }?>
              
                           </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <Label style="font-size: medium">Email Id : </label>                   
                                <input type="email" required class="form-control" name="emailId" placeholder="Enter Email Id" value="<?php echo $emailId; ?>">
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium">Contact : </label>                   
                                <input type="text" required class="form-control" name="contact" placeholder="Enter Contact Number" value="<?php echo $contact; ?>">
                            </div>
                            <div class="col-lg-4">
                                <Label style="font-size: medium"> Date Of Birth : </label>
                                <input type="text" name="dob" id="cal_1" class="form-control" placeholder="YYYY/MM/DD" required="true" value="<?PHP echo$dob; ?>">
                            </div>                           
                        </div>
                        <hr>

                    <br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="editPersonal.php">Refresh</a>  
          
        
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
                        
                        $collection = $db->perInfo;
			$collection1 = $db->analysis;
                        
                        $prn = $_SESSION['prnses'];
                        
                        $fname = $_POST['fname'];
                        $mname = $_POST['mname'];
                        $lname = $_POST['lname'];
                        $mother = $_POST['mother'];
                        $state = $_POST['state'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];   
                        $caste = $_POST['caste'];
                        $nationality = $_POST['nationality'];
                        $bloodGroup = $_POST['bloodGroup'];
                        $emailId = $_POST['emailId'];
                        $dob = $_POST['dob'];                      
                        $handicap = $_POST['handicap'];
                        $admcat = $_POST['admcat'];
                        $contact = $_POST['contact'];
                        
                        $collection->update(
						array('_id' => $prn),
						array('$set' => array(       						                                                
                                                                        "fname" => $fname,
                                                                        "mname" => $mname,
                                                                        "lname" => $lname,
                                                                        "mother" => $mother,
                                                                        "state" => $state,
                                                                        "address" => $address,
                                                                        "gender" => $gender,
                                                                        "caste" => $caste,
                                                                        "nationality" => $nationality,
                                                                        "bloodGroup" => $bloodGroup,
                                                                        "emailId" => $emailId,
                                                                        "dob" => $dob,                                                                        
                                                                        "handicap" => $handicap,
                                                                        "admcat" => $admcat,
                                                                        "contact" => $contact
                                                                       )),
                                                                        array("upsert" => true)
						);
                        $collection1->update(
						array('_id' => $prn),
						array('$set' => array(       						                                                
                                                                        "fname" => $fname,                                                                      
                                                                        "lname" => $lname,                                                                                                                                                                                                                   
                                                                        "caste" => $caste,                                                                        
                                                                        "admcat" => $admcat		
                                                                       )),
                                                                        array("upsert" => true)
						);
                         // disconnect from server
			$conn->close();
                        echo'<script type="text/javascript"> alert("Data Updated");</script>';    
                        
                        
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
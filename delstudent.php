<?php
	session_start();
	if($_SESSION['authentication']!=1)
	{
		header("location: index.php");
	}
 ?>

<?php

	$id=$_GET['cid'];
	
	try 
        {
            // open connection to MongoDB server
            $conn = new MongoClient();
		
            $db = $conn->selectDB("studentSystem");
            // access collection
            $collection1 = $db->perInfo;
		
            $collection1->remove(array('_id' => $id));
            
            $collection2 = $db->acdInfo;
		
            $collection2->remove(array('_id' => $id));
            
            $collection3 = $db->aluInfo;
		
            $collection3->remove(array('_id' => $id));
            
            $collection4 = $db->analysis;
		
            $collection4->remove(array('_id' => $id));
		
            // disconnect from server
            $conn->close();
		
            header("location: searchStudents.php");

    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }

?>
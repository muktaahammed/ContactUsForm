<?php 

    require_once 'connect.php';
    
    $errors = '';
    /*Here you must use your webmial address don't use gmail or others mail address. 
    You will forward this message to any gmail or others from your cpnael mail setting
    Just follow me. See in the picture attached this file and follow the process */
    $myemail = 'admin@rbfgroupbd.com'; 
    if(empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['message'])){    
        $errors .= "\n Error: all fields are required";
    }

    $name = $_POST['name']; 
    $email_address = $_POST['email']; 
    $message = $_POST['message']; 

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
        $email_address)){
	
        $errors .= "\n Error: Invalid email address";
    }

    if(empty($errors)){
	    $to = $myemail; 
	    $email_subject = "Contact form submission: $name";
	    $email_body = "You have received a new message. ".
	    " Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	    $headers = "From: $myemail\n"; 
	    $headers .= "Reply-To: $email_address";
	
	    mail($to,$email_subject,$email_body,$headers);
	        //redirect to the 'thank you' page
	    header('Location: ../thank-you.html');
    } 
    
    //(MyUserMessage) This will be replace with your created table name 
    $sql = "INSERT INTO MyUserMessage (name, email, message) VALUES ('$name', '$email_address', '$message')";

    if ($conn->query($sql) === TRUE) {
    echo "Thank you for your feedback.";
    } 
    else {
        
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
    
?>

<?php

include 'connection.php';
include 'test.php';

$first_name = $last_name = $username = $email ='';
$errors = array('first_name' => '', 'last_name' => '', 'username' => '', 'email' => '');

if(isset($_POST['submit'])){

        // check name
		if(empty($_POST['first_name'])){
			$errors['first_name'] = 'First name is required';
		} else{
			$first_name = $_POST['first_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $first_name)){
				$errors['first_name'] = 'Name must be letters and spaces only';
			}
        }
        
        //check last name
        if(empty($_POST['last_name'])){
			$errors['last_name'] = 'Last name is required';
		} else{
			$last_name = $_POST['last_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $last_name)){
				$errors['last_name'] = 'Last name must be letters and spaces only';
			}
        }
        
        //check username
        if(empty($_POST['username'])){
			$errors['username'] = 'Username is required';
		} else{
			$username = $_POST['username'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
				$errors['username'] = 'Username must be letters and spaces only';
			}
		}
		
		// check username
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid';
			}
        }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>DataBasePHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
    
  	h4{
          text-align: center;
      }
      
    form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
   
    </style>
</head>

<body>
    <?php 
    //print_r(PDO::getAvailableDrivers());
    $object1=new Test();
    $object1->getStudents();

    $object2=new Test();
    $object2->getStudentsStmt("Nathalie","Pillen");

    //$object3=new Test();
    //$object3->setStudentsStmt("Stijn", "Peeters", "STIPEE", "stijn.peeters.it@gmail.com");

    ?>
	<section>
        <h4>Add a Student</h4>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
			<label>Name</label>
			<input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name) ?>">
            <div class="text-danger"><?php echo $errors['first_name']; ?></div>
            <label>Last Name</label>
			<input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($last_name) ?>">
            <div class="text-danger"><?php echo $errors['last_name']; ?></div>
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username) ?>">
            <div class="text-danger"><?php echo $errors['username']; ?></div>
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($email) ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <div class="text-danger"><?php echo $errors['email']; ?></div>
            <div>
				<input type="submit" name="submit" class="btn btn-primary" value="Add Student">
			</div>
		</form>
    </section>
    
</body>

</html>
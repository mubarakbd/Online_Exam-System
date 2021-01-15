<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classes/Admin.php');
	$ad  = new Admin();
?>
<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$adminData = $ad->getadminData($_POST);
 }

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
 <link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>
	<body>
	<div class="jumbotron text-center" style="margin-bottom:0; padding: 1rem 1rem;">
	   	<img src="logo.png" class="img-fluid" width="300" alt="Online Examination System in PHP" />
	</div>
	<div class ="container">
		<div class="row">
		<div class="col-md-3">
			
		</div>
		        <div class="col-md-6" style="margin-top: 20px">
		         <div class="card">
		         	<div class="card-header">
		       <h1 style="text-align: center; font-size: 24px">Admin Login</h1>
		         	</div>
		         	<div class="card-body">
		         		<form method="post">
						<div class="form-group">
                        <label>Enter Email</label>
                        <input type="text" name="email" class="form-control">
							</div>
							<div class="form-group">
                           <label>Enter password</label>
                             <input type="password" name="password" class="form-control">
							</div>
								<div class="form-group">
                              
                             <input type="submit" name="submit" value="Login" class="btn btn-success">
							</div>
							<div class="form-group">
                              
				      			<?php
				             if(isset($adminData)){
					       	echo $adminData;
					      }
				       ?>
							</div>
							</div>
						 </form>
						 
		         	</div>
		         </div>
		        </div>
		</div>
	</div>
	</body>
</html>


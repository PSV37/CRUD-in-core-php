<?php include('server.php'); 

    //Get Id For User Update
	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db , "SELECT * FROM tbl_crude WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$email = $record['email'];
		$address = $record['address'];
		$id = $record['id'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		simple php CRUD
	</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<style type="text/css">
		.alert-success
		 {
			color: #3c763d;
			background-color: #dff0d8;
			border-color: #d6e9c6;
			width: 47%;
			margin-left: 27%;
			text-align: center;
		 }

		 .parsley-errors-list
		 {
			color: red;
			margin-left: -34px;
			list-style-type: none;
		 }

		 .btn-primary
		  {
			color: #fff;
			background-color: #337ab7;
			border-color: #2e6da4;
			margin-top: 19px;
		 }
	</style>
</head>
<body>
	<h1 class="text-center">simple php CRUD</h1>
   
    <!-- Display Success Message -->
	<?php if(isset($_SESSION['msg'])): ?>
		<div class="alert alert-success alert-dismissable">
		   <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		     <?php echo $_SESSION['msg'];
		       unset($_SESSION['msg']);
		      ?>
		</div>
	<?php endif ?>
	<table class="table"v style="width: 45%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_array($resuls)) {?>
		<tr>
			<td ><?php echo $row['name'] ?></td>
			<td><?php echo $row['email'] ?></td>
			<td><?php echo $row['address'] ?></td>
			<td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
			<td><a href="server.php?del=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
		</tr>
		<?php } ?>
	</tbody>
	</table>


	<div class="col-md-3 col-lg-3">
	  <!-- For Left Space -->
	</div>

	<div class="col-md-6 col-lg-6 col-sm-12">
	 <div class="panel panel-info">
	   <div class="panel-heading">
	   	<?php if($edit_state == false): ?>
			Add New User Address
		<?php else: ?>
           Update Existing User Address
		<?php endif ?>
	   
	   </div>
	   <div class="panel-body">    		
			<form action="server.php" method="post" data-parsley-validate>
				 <input type="hidden" name="id" value="<?php echo $id; ?>">
				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control col-md-8 col-lg-8 col-sm-12" value="<?php echo $name ?>" placeholder="Name" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control col-md-8 col-lg-8 col-sm-12" value="<?php echo $email ?>" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control col-md-8 col-lg-8 col-sm-12" value="<?php echo $address ?>" placeholder="Address" required>
				</div>
				<div class="form-group">
					<?php if($edit_state == false): ?>
					<button class="btn btn-primary" type="submit" name="submit">Save</button>
					<<?php else: ?>
					<button class="btn btn-primary" type="submit" name="update">update</button>
				    <?php endif ?>
				</div>
			</form>
	   </div>
	 </div>
	</div>

	<div class="col-md-3 col-lg-3">
	 <!-- For Right Space -->
	</div>

    <!-- For Footer Section -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/parsleyjs/parsley.min.js"></script>
</body>
</html>
<?php
//connect to the database

$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "addNotesDB";
$conn= mysqli_connect($hostName,$userName,$password,$dbName);
$insert = false;
// $sql = "CREATE DATABASE addNotesDB";//database created
// mysqli_query($conn,$sql);

//crud---------------->>>>>>>>
//create
if(isset($_POST)){
    $title = $_POST["noteTitle"];
    $description = $_POST["noteDesc"];
    // $password = $_POST["password"];
}
$sql = "INSERT INTO `notes` (`sl`, `title`, `description`, `time`) VALUES (NULL, '$title', '$description', current_timestamp())";
$result = mysqli_query($conn, $sql);
$insert = true;

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
		

		<!-- Bootstrap CSS -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
		<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		

		<title>PHP Notes-CRUD</title>
	</head>
	<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">PHP CRUD</a>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
					</ul>
					<form class="d-flex">
						<input
							class="form-control me-2"
							type="search"
							placeholder="Search"
							aria-label="Search"
						/>
						<button class="btn btn-outline-success" type="submit">
							Search
						</button>
					</form>
				</div>
			</div>
		</nav>
		<?php
		if($insert){
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Thank You!</strong> Your notes have been added
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>';
		}
		?>
		<div class="container mt-5">
			<h2>Add a Note</h2>
			<form action="/CRUD_PHP/" method="post">
				<div class="mb-3 my-4">
					<label for="noteTitle" class="form-label">Note Title</label>
					<input
						type="text"
						class="form-control"
						id="noteTitle"
						name="noteTitle"
					/>
				</div>
				<!-- <div class="mb-3">
					<label for="noteDescription" class="form-label"
						>Note Description</label
					>
					<textarea type="text" class="form-control" id="noteDescription" >
				</div> -->
				<label for="noteDescription" class="form-label">Note Description</label>
				<textarea
					id="noteDescription"
					rows="3"
					cols="120"
					name="noteDesc"
					class="form-control mb-2"
				></textarea>
				<button type="submit" class="btn btn-primary">Add Note</button>
			</form>
		</div>

		<div class="container form-data-validation my-4">
			
			<?php

			//insert into table
			// $sql = "INSERT INTO `notes` (`sl`, `title`, `description`, `time`) VALUES (NULL, 'buy books', 'please buy books from store', current_timestamp())";

			//show data after fetching
			// $sql = "SELECT * FROM `notes`";
			// $result = mysqli_query($conn, $sql);
			// while($row = mysqli_fetch_assoc($result)){
			// 	echo $row["sl"]." ".$row["title"]." ".$row["description"];
			// 	echo "<br>";
			// }

            ?>
			<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sl. No.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	<?php
	$sql = "SELECT * FROM `notes`";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>
      <th scope='row'>{$row["sl"]}</th>
      <td>{$row["title"]}</td>
      <td>{$row["description"]}</td>
      <td>@mdo</td>
    </tr>";
		// echo "<br>";
	}
	?>
    
  </tbody>
</table>
		</div>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"
		></script>
		<script>
			let table = new DataTable('#myTable');
		</script>
	</body>
</html>

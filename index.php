<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    	.form{
    		border:2px solid #ced4da;
    		padding: 1rem;
    		border-radius: 8px;
    	}
    </style>

    <title>Online Notes App</title>
  </head>
  <body>
 
 <?php include "./navBar.php"; ?>
 <?php include "./db.php"; ?>
 <?php include "./editModal.php"; ?>

 <!--<?php
 	//if(isset($_POST["submit"])){
 		//if(!isset($_POST["hidden"])){
 		//$title =$_POST["title"];
 		//$desc=$_POST["desc"];
		//$sql="INSERT INTO `notes`(`title`, `description`) VALUES ('$title','$desc')";
		//$res=mysqli_query($con,$sql);

 	//}
 //}

 ?>-->


 	<div class="container my-4">
 	<div class="row justify-content-center">
 	<div class="col-lg-10">
<form class="form" method="POST" action="insert.php">
  	<div class="form-group">
  		<h1>Add Note</h1>
    	<label for="title">Title</label>
    	<input type="text" class="form-control" id="title" placeholder="Note title..." name="title">
  	</div>
	<div class="mb-3">
  		<label for="desc" class="form-label">Description</label>
  		<textarea class="form-control" id="desc" rows="3" placeholder="Enter Description" name="description"></textarea>
	</div>
  	<button type="submit" name="submit" class="btn btn-success">Add Note</button>
</form>
 			
 	</div>
	</div>
	</div>



 <div class="container">
 	<div class="row justify-content-center">
 		<div class="col-lg-10">
 			<h1>Your Notes</h1>
 			<?php
 				$sql="SELECT * FROM `notes`";
 				$res=mysqli_query($con,$sql);
 				$noNotes=true;

 				//edit note
 				while($fetch=mysqli_fetch_assoc($res)){
 					$noNotes=false;
 					echo '<div class="card my-3">
  							<div class="card-body">
    						<h5 class="card-title">'.$fetch["title"].'</h5>
    						<p class="card-text">'.$fetch["description"].'</p>
    						<!-- Button trigger modal -->
							<button type="button" class="btn btn-success edit" data-toggle="modal" data-target="#exampleModal" id="'.$fetch["sno"].'">
  								Edit
							</button>
    						<a href="./delete.php?id='.$fetch["sno"].'" class="btn btn-danger">Delete</a>
  						</div>
						</div>';
 				}

 				if($noNotes){
 					echo '<div class="card my-3">
  							<div class="card-body">
    						<h5 class="card-title">Message</h5>
    						<p class="card-text">No Notes are available for reading.</p>
  						</div>
						</div>';
 				}
 			?>
 		</div>
 	</div>
 </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>

    	//edit a note
    	const edit=document.querySelectorAll(".edit");
    	const editTitle=document.getElementById("edittitle");
    	const editdesc=document.getElementById("editdesc");
    	const hiddenInput = document.getElementById("hidden");
    	//edit noteee
    	const cardBody=document.querySelectorAll(".card-body");
    	edit.forEach(element =>{
    		element.addEventListener("click", ()=>{
        		const titleText=element.parentElement.children[0].innerText;
        		const descText=element.parentElement.children[1].innerText;	
        		editTitle.value=titleText;
        		editdesc.value=descText;
        		hiddenInput.value=element.id;
        		console.log(hiddenInput);		
    		});

    	});
//Search Button
    	const search=document.getElementById('search');
    	search.addEventListener("click", ()=>{
    		const value=search.value.toLowerCase();
    		cardBody.forEach(element =>{
    			const titleText=element.children[0].innerText.toLowerCase();
        		const descText=element.children[1].innerText.toLowerCase();	
        		if(titleText.includes(value) || descText.includes(value)){
        			element.parentElement.style.display="block";
        		}else{
        			element.parentElement.style.display="none";
        		}
    		});
    	});
    </script>



  </body>
</html>
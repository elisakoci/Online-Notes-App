<?php
include "./db.php";
if(isset($_POST["hidden"])){
	$title=$_POST["edittitle"];
	$desc=$_POST["editdesc"];
	$id=$_POST["hidden"];
	$sql="UPDATE `notes` SET `sno`='$id',`title`='$title',`description`='$desc' WHERE `sno`='$id'";
	$res=mysqli_query($con,$sql);
}

echo '<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
        <input type="hidden" name="hidden" id="hidden">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="edittitle" placeholder="Note title..." name="edittitle">
  </div>
	<div class="mb-3">
  		<label for="desc" class="form-label">Description</label>
  		<textarea class="form-control" id="editdesc" rows="3" placeholder="Enter Description" name="editdesc"></textarea>
	</div>

  <button type="submit" name="submit" class="btn btn-success">Update Note</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>'
?>
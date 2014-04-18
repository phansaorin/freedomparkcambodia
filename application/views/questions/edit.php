<div class="modal-header">
  <h4 class="modal-title">Create New</h4>
</div>
<?php 
if ($data->num_rows() > 0) {
	echo form_open_multipart("questions/save", "role='form'"); ?>
	<?php 
	foreach($data->result() as $row){ 
	echo form_hidden("uid", $row->q_uid); 
	?>
		<div class="form-group">
	    <label for="question">Question</label>
	    <input type="text" name="question" value="<?php echo $row->question; ?>" class="form-control" placeholder="Question">
	  </div>
	  <div class="form-group">
	    <label for="category">Category</label>
	    <?php echo form_dropdown("category", $category, $row->cateID, "class='form-control'"); ?>
	  </div>
	  <div class="form-group">
	    <label for="parent-q">Parent Q</label>
	    <?php echo form_dropdown("parent-q", $parentQuestion, $row->parent_q, "class='form-control'"); ?>
	  </div>
	  <!-- <div class="form-group">
	    <label for="image">Image</label>
	    <input type="file" name="source_image" id="image">
	  </div> -->
	  <div class="form-group">
	    <label for="question">Answer</label>
	  </div>
	      <?php 
	      if ($row->answer == "") {
	      	$check = "check";
	      } else if ($row->answer == "Yes") {
	      	$check = "check";
	      } else if ($row->answer == "No") {
	      	$check = "check";
	      } else {
	      	$check = "";
	      }?>
	      <div class="checkbox">
		      <label>
		      	<input type="radio" name="answer" value="" checked="<?php echo $check; ?>"> NULL <p class="help-block">NULL for main question.</p>
		      </label>
	  	  </div>
	      <div class="checkbox">
		      <label>
		      	<input type="radio" name="answer" value="Yes" checked="<?php echo $check; ?>"> Yes <p class="help-block">Yes for sub question.</p>
		      </label>
		  </div>
	      <div class="checkbox">
		    <label>
		      <input type="radio" name="answer" value="No" checked="<?php echo $check; ?>"> No <p class="help-block">No for sub question.</p>
		    </label>
		  </div>
	      <?php
		}
	?>
  <div class="modal-footer">
    <?php echo anchor("questions/view", form_button("btnClose", "Close", "class='btn btn-default'"), "role='button'"); ?>
    <?php echo form_submit("btnEdit", "Update", "class='btn btn-default'") ?>
  </div>
<?php echo form_close();
}
?>
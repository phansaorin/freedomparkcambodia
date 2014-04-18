<div class="modal-header">
  <h4 class="modal-title">Edit</h4>
</div>
<?php 
if ($data->num_rows() > 0) {
	echo form_open_multipart("categories/update", "role='form'"); ?>
	<?php 
	foreach($data->result() as $row){ 
	echo form_hidden("uid", $row->category_id); 
	?>
		<div class="form-group">
	    <label for="question">Category Name</label>
	    <input type="text" name="categoryName" value="<?php echo $row->name; ?>" class="form-control">
	  </div>
	      <?php
		}
	?>
  <div class="modal-footer">
    <?php echo anchor("categories/view", form_button("btnClose", "Close", "class='btn btn-default'"), "role='button'"); ?>
    <?php echo form_submit("btnEdit", "Update", "class='btn btn-default'") ?>
  </div>
<?php echo form_close();
}
?>
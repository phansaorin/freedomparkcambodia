<div class="modal-header">
  <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
  <h4 class="modal-title">Create New</h4>
</div>
<?php echo form_open_multipart("questions/save", "role='form'"); ?>
  <div class="form-group">
    <label for="question">Question</label>
    <input type="text" name="question" class="form-control" placeholder="Question">
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <?php echo form_dropdown("category", $category, "class='form-control'"); ?>
  </div>
  <div class="form-group">
    <label for="parent-q">Parent Q</label>
    <?php echo form_dropdown("parent-q", $parentQuestion, "class='form-control'"); ?>
  </div>
  <!-- <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="source_image" id="image">
  </div> -->
  <div class="form-group">
    <label for="question">Answer</label>
  </div>
  <div class="checkbox">
    <label>
      <input type="radio" name="answer" value=""  checked="check"> NULL <p class="help-block">NULL for main question.</p>
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="radio" name="answer" value="Yes"> Yes <p class="help-block">Yes for sub question.</p>
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="radio" name="answer" value="No"> No <p class="help-block">No for sub question.</p>
    </label>
  </div>
  <div class="modal-footer">
    <?php echo anchor("questions/view", form_button("btnClose", "Close", "class='btn btn-default'"), "role='button'"); ?>
    <?php echo form_submit("btnSubmit", "Submit", "class='btn btn-default'") ?>
  </div>
<?php echo form_close(); ?>
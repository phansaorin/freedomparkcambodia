<?php $controller = "questions"; ?>
<div class="row">
	<div></div>
	<?php if($questions > 0) { ?>
	<?php echo form_open("questions/removePermanent"); ?>
	<table class="table">
		<thead>
			<tr>
				<th>N&ordm;</th>
				<th><?php echo form_checkbox(array("name"=>"checkAll", "id"=>"check_all")); ?></th>
				<th>Question</th>
				<th>Answer</th>
				<th>Parent Q</th>
				<th>Category</th>
				<th>Image</th>
				<th>Control</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		// column id
        $id = 1;
        if ($this->uri->segment(3)) {
            $id = $this->uri->segment(3) + 1;
        } else {
            $id = 1;
        }
		foreach($questions as $rows) { ?>
			<tr>
				<td><?php echo $id++; ?></td>
				<td><?php echo form_checkbox(array('class' => 'check_value', 'id' => 'rcd_check', 'name' => 'rcdChecked[]'), $rows->q_uid); ?></td>
				<td><?php echo $rows->question; ?></td>
				<td><?php echo $rows->answer; ?></td>
				<td><?php echo $rows->parent_q; ?></td>
				<td><?php echo $rows->name; ?></td>
				<td><?php echo $rows->source; ?></td>
				<td>
				<?php
                echo anchor($controller.'/edit/' . $rows->q_uid, '<span class="glyphicon glyphicon-edit"></span>', 'title="Edit" data-toggle="tooltip" id="tooltip"');
                ?>
				</td>
			</tr>	
		<?php } ?>
		</tbody>
	</table>
	<div class="for-action">
        <?php
        echo anchor($controller.'/create', form_button('btn_creating', 'Add New', 'class="btn btn-primary btn-sm btn-info btn_action"'));
        echo anchor($controller.'/removePermanent', form_button('btn_remove_permanent', 'Remove Permanent', 'class="btn btn-primary btn-sm btn-danger btn_action removePermanent"'), 'id="removePermanent"');
		//echo form_submit("submit", "Remove Permanent",'class="btn btn-primary btn-sm btn-danger btn_action removePermanent"' );
		?>
        <div class="clearer"></div>
    </div>
    <?php echo form_close(); ?>
	<?php }
	?>

</div><!--/row-->
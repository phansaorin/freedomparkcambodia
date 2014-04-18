<?php $controller = "categories"; ?>
<div class="row">
	<div></div>
	<?php if($category > 0) { ?>
	<table class="table" id="view">
		<thead>
			<tr>
				<th>N&ordm;</th>
				<th><?php echo form_checkbox(array("name"=>"checkAll", "id"=>"check_all")); ?></th>
				<th>Name</th>
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
		foreach($category as $rows) { ?>
			<tr>
				<td><?php echo $id++; ?></td>
				<td><?php echo form_checkbox(array('class' => 'check_value', 'id' => 'rcd_check', 'name' => 'rcdChecked[]'), $rows->category_id); ?></td>
				<td><?php echo $rows->name; ?></td>
				<td>
				<?php
                echo anchor($controller.'/edit/' . $rows->category_id, '<span class="glyphicon glyphicon-edit"></span>', 'class="edit" title="Edit"');
                ?>
				</td>
			</tr>	
		<?php } ?>
		</tbody>
	</table>
	<div class="for-action">
		<!-- Button trigger modal -->
        <?php
        echo anchor("#new", form_button('btn_creating', 'Add New', 'class="btn btn-primary btn-sm btn-info btn_action" data-toggle="modal" data-target="#new"'));
        echo anchor($controller.'/removePermanent', form_button('btn_remove_permanent', 'Remove Permanent', 'class="btn btn-primary btn-sm btn-danger btn_action removePermanent"'), 'id="removePermanent"');
		?>
        <div class="clearer"></div>
    </div>
	<?php } else {?>
	<table class="table">
		<thead>
			<tr>
				<th>N&ordm;</th>
				<th><?php echo form_checkbox(array("name"=>"checkAll", "id"=>"check_all")); ?></th>
				<th>Name</th>
				<th>Control</th>
			</tr>
		</thead>
		<tbody>
			<tr><td colspan="4">No Data</td></tr>
		</tbody>
	</table>
	<?php }
	$this->load->view("categories/partial/new");
	?>
</div><!--/row-->
<div class="list-group">
	<?php 
	$nav = $this->db->select('*')
		->where('status', 1)
		->where('deleted', 0)
		->get("hh_menus");
	$current = $this->uri->segment(1);
	if ($nav->num_rows() > 0) {
        foreach ($nav->result() as $menu) {
            if ($menu->alias === $current) {
                ?>
                <?php echo anchor(strtolower($menu->alias)."/view", '<span class="glyphicon glyphicon-fire"></span> '. ucfirst($menu->menu_name), array('class' => "list-group-item active")); ?>
            <?php } else { ?>
                <?php echo anchor(strtolower($menu->alias)."/view", '<span class="glyphicon glyphicon-fire"></span> '. ucfirst($menu->menu_name), array('class' => "list-group-item")); ?>
                <?php
            }
        }
    }

	?>
  <?php echo anchor("admin/dashboard", "<span class='glyphicon glyphicon-fire'></span> Home Dashboard", "class='list-group-item'"); ?>
  <?php echo anchor("admin/sign_out", "<span class='glyphicon glyphicon-star'></span> Logout", "class='list-group-item'"); ?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php
		$_title = "Hinghorng Welcome";
		if ($title) {
			echo $title;
		} else {
			echo $this->uri->segment(2);
		}
		?>
		</title>
	<?php echo link_tag("asset/dist/css/bootstrap.css"); ?>
	<?php echo link_tag("asset/css/template.css"); ?>
        <?php                        
	$folder = $this->uri->segment(1);
	$page = $this->uri->segment(2);
        ?>
	<link rel="shortcut icon" href="<?php echo base_url().'asset/images/codingate.png'; ?>">
	
</head>
<body>

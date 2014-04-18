<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php 
	echo link_tag("asset/dist/css/bootstrap.css");
	echo link_tag("asset/css/admin/admin.css"); 
	echo link_tag("asset/css/admin/general_admin.css"); 
	?>
	<link rel="shortcut icon" href="<?php echo base_url().'asset/images/codingate.png'; ?>">
</head>

<body>
<?php $this->load->view("admin/partial/top_nav.php"); ?>
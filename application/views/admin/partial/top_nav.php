<?php 
if ($this->uri->segment(1) == "admin" && !$this->uri->segment(2)) { ?>

<?php } else { ?>
  <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <?php echo anchor(base_url(), img("asset/images/codingate-logo.png"), "class='navbar-brand' target='_blank'"); ?>
    </div>
  </div><!-- /.container -->
</div><!-- /.navbar -->
<?php }
?>


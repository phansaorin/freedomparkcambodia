<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <?php echo link_tag("asset/dist/css/bootstrap.css"); ?>
        <?php echo link_tag("asset/css/template.css"); ?>
        <?php
        $folder = $this->uri->segment(1);
        $page = $this->uri->segment(2);
        ?>
		<link rel="shortcut icon" href="<?php echo base_url().'asset/images/codingate.png'; ?>">

    </head>

    <body>
    <center>
        <div class="container" id="ques">
            <div class="row">
                <br/><br/>
                <div class=".col-xs-12 .col-md-12" id="question_block">
                    <?php
                        $qtn = $question->row()->question;
                        $qtn_id = $question->row()->q_uid;
                        
                        echo "<span id='$qtn_id' class='question'>".$qtn."</span>";
                    ?>
                </div>
            </div>
            &nbsp;
            <div class="row">

                <div class=".col-xs-6 .col-md-4">
                    <button type="button" name="btnY" class="btn btn-info btn-lg myButton" id="yes" baseurl="<?php echo base_url();?>" parent="<?php echo $this->uri->segment(3)?>">Yes</button> 
                    &nbsp;&nbsp;
                    <!-- <a href="<?php //echo site_url('page/vedio_no');?>"><button type="button" name="btnN" class="btn btn-info btn-lg myButton" id="no">No</button></a> -->
                    <button type="button" name="btnN" class="btn btn-info btn-lg myButton" id="no" baseurl="<?php echo base_url();?>" parent="<?php echo $this->uri->segment(3)?>">No</button>
                </div>

            </div>
        </div>
    </center>
    <div id="footer-ques">
        <div id="hinghorng_logo">
            <div><a href="http://hinghorng.codingate.com"><img class="img-responsive" src="<?php echo base_url('asset/images/codingate-logo.png'); ?>" alt="codingate" title="codingate" /></a></div>
        </div>
        <div id="fb-root">
            <div class="fb-share-button" data-href="http://hinghorng.codingate.com/about.html" data-type="button_count"></div>
        </div>
    </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url();?>asset/dist/js/question_controll.js"></script>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</div><!-- End .wrap_content -->

<?php echo include_js(array('asset/dist/js/bootstrap.js')); ?>

</body>
</html>
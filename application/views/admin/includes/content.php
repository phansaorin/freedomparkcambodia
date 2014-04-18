<div class="container wrap">
    <?php 
    if ($this->uri->segment(1) == "admin" && !$this->uri->segment(2)) { ?>
        
    <?php } else { ?>
        <div class="jumbotron">
        <?php echo heading("Hing Horng", 2, "class='heading'"); ?>
        </div>
    <?php }
    ?>
    
    <div class="container">
        <?php if ($this->session->userdata("admin")) { ?>
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9" id="content">
                    <?php
                    /* Include file show message */
                    $this->load->view("admin/partial/show_sms");

                    if (!$this->uri->segment(2)) {
                        redirect('admin/dashboard');
                    } else {
                        $this->load->view($this->uri->segment(1) . '/' . $this->uri->segment(2));
                    }
                    ?>
                </div>
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <?php $this->load->view("admin/partial/sidebar_left"); ?>
                </div>
            </div>
        <?php } else {
            $this->load->view('admin/partial/login');
        } ?>

    </div>
</div>
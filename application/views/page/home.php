    <div class="row"> 
        <center><h1 class="text-primary">How do you feel today?</h1></center>
        <br/><br/><br/>

    </div>
    <div class="row">
        <?php 
        $query = $this->db->select("*")
            ->where("deleted", 0)
            ->get("hh_categories");
            $i = 1;
            foreach ($query->result() as $value) {
                if ($i <= 1) 
                    $showClassName = 'col-md-offset-3';
                else
                    $showClassName = '';
                ?>
                <div class="col-xs-3 col-md-3 <?php echo $showClassName; ?>">
                    <a href="<?php echo base_url().'page/question/'.$value->category_id; ?>" >
                        <img class="img-circle img-responsive" src="<?php echo base_url('asset/images/'.$value->name.'.png'); ?>" alt="<?php echo ucfirst($value->name); ?>" title="<?php echo ucfirst($value->name); ?>" />
                    </a>
                </div>
            <?php
            $i++;
            }
        ?>
    </div>
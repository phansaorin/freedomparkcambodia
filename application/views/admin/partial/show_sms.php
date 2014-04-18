<?php

if ($this->session->userdata('delete')) {
    echo $this->session->userdata('delete');
    $this->session->unset_userdata('delete');
} else if ($this->session->userdata('edit')) {
    echo $this->session->userdata('edit');
    $this->session->unset_userdata('edit');
} else if ($this->session->userdata('status')) {
    echo $this->session->userdata('status');
    $this->session->unset_userdata('status');
} else if ($this->session->userdata('create')) {
    echo $this->session->userdata('create');
    $this->session->unset_userdata('create');
}
?>
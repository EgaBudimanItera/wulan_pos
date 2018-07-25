<?php
  $this->load->view('partials/front/header');
  if($link=='beranda'){
  	$this->load->view('partials/front/slider');	
  }
  else{

  }
  
  $this->load->view('partials/front/isi');
  $this->load->view('partials/front/footer');
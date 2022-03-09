<?php 

function request_method($method, $rm) {

  if($rm != $method) {
    show_404();return;
  }
  
}
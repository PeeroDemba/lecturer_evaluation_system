<?php
  if(isset($_COOKIE["login"])) {
    header('Location: '.$uri.'/website/');
  }
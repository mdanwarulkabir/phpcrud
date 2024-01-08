<?php
  class validate{
    //Function to check empty fields
    public function checkEmpty($data, $fields){
      $msg = null;
      foreach ($fields as $value){
        if (empty($data[$value])){
          $msg .= "<p>$value field empty</p>";
        }
      }
      return $msg;
    }
  }
?>
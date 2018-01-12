<?php require 'header.php'  ;
      require 'db_function.php' ;
	  db_connection(); 
?>
<h2>개별 글 보기 </h2> 
<?php
 $results = array();
 $sql = "SELECT no,subject,tbody FROM ".$_GET['b_name']."`no` EQU".$_GET['b_no']; 
 db_make_query();
 $results = db_exec_query(1); ?>
 <textarea>
 


</textarea> 
<?php require 'footer.php' ?>
	  
<?php require 'header.php' ;
      require 'db_function.php' ;
	  db_connection(); 
?>
<h1 >샘플 게시판</h1> 
<!--
<table class="type06">
    <tr>
        <th scope="row">항목명</th>
        <td>내용이 들어갑니다.</td>
    </tr>
    <tr>
        <th scope="row" class="even">항목명</th>
        <td class="even">내용이 들어갑니다.</td>
    </tr>
    <tr>
        <th scope="row">항목명</th>
        <td>내용이 들어갑니다.</td>
    </tr>
</table>
-->

<table>
  <caption>자유 게시판<button type="button" onclick="location.href='page_edit.php'">새글입력</button></caption>
  <?php $board_name="a_tn2_freeboard_list"; ?>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Date</th>
      <th scope="col">Writter</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $results = array(); 
    db_make_query();
	$results = db_exec_query();
    for($i = 0 ; $i< 10 ; $i++) { ?>
    <tr>
      <td data-label="No"><?php echo $results[$i][0] ;?></td>
      <td data-label="Title"><?php echo "<a href=\"page_view.php?b_name=".$board_name."?b_no=".$results[$i][0]."\">". $results[$i][1]."</a>"?></td>
      <td data-label="Date"><?php echo generateRandomDate(); ?></td>
	<td data-label="Writter"><?php echo generateRandomString(3); ?></td>
    </tr>
	<?php } ?>	
  </tbody>
</table>
<?php require 'footer.php' ?> 



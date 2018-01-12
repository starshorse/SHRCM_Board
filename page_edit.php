<?php require 'header.php' ?>
<h1 >샘플 게시판</h1> 
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
// bkLib.onDomLoaded(nicEditors.allTextAreas);
bkLib.onDomLoaded(function() {
	new nicEditor({
		fullPanel : true //메뉴 전체 사용 (false로 바꾸시면 몇개의 메뉴가 사라집니다.
	}).panelInstance('contents'); // id contents에 웹에디터 적용
});
</script>
<form action='db_interface.php'>
<label>Title</label> 
<input type='textbox' placeholder="제목을 입력해주세요">
</br>
<label>Content</label> 
<textarea id="contents" cols="2" rows="10" id="rules"/>
</textarea> 
<input id='submit' name='submit' type='submit' value='submit' /> 
</form>
<?php require 'footer.php' ?> 
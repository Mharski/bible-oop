<?php 
include_once('head.php'); 
include_once('config.php');
include_once('BibleDAO.php');

$books = BibleDAO::getBooks();
$defaultChapters = BibleDAO::getChapterNumbers(1);
$defaultVerses = BibleDAO::getVerseNumbers(1, 1);
$defaultVerseText = BibleDAO::getVerseText(1, 1, 1);
?>
<body class = "back7">
<br><br>
<div class="container">
	<div class="thumbnail span12">
		<div class="page-header">
			<div class = "back1">
				<div class="span4 pull-left">
					<h3 class = "font3"><i class="icon-book"></i>&nbsp;<b>Digital Bible</b></h3>
				</div>
				<div class="span4 pull-right" style = "margin-top:15px;margin-left:0px;margin-right:20px">
					<div class = "pull-right">
		    			<form>
							<input placeholder="Quick Search ....." class="pull-right input-large search-query pull-left font6" style = "width:200px;color:black" type="search" id="keyword">
							<br/>
						</form>
	    			</div>
				</div>
			</div>
		</div>
		<div class="span9 container">
	    	<div class="span9 page-header" style = "margin-left:7px">
				<div class="alert alert-info span8" style = "margin-left:0px;align:center">
					<h3 class = "font4" align = "center"><i class="icon-book"></i>&nbsp;King James Version</h3>
				</div>
				<form method = "POST" name = "frm">
				    <table class="table table-bordered span8" align = "center" style = "margin-left:0px">
						<thead>
						    <tr>
						    	<th>Book Title</th>
						    	<th>Chapter</th>
						    	<th>Verse</th>
						    </tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="books" id="books">
										<?php foreach($books as $id => $book): ?>
										<option value="<?= $id ?>"><?= $book ?></option>
										<?php endforeach ?>
									</select>
								</td>
								<td>
									<select name="chapters" id="chapters">
										<?php for($i = 1; $i <= $defaultChapters; $i++): ?>
										<option value="<?= $i ?>"><?= $i ?></option>
										<?php endfor ?>
									</select>
								</td>
								<td>
									<select name="verses" id="verses">
										<?php for($i = 1; $i <= $defaultVerses; $i++): ?>
										<option value="<?= $i ?>"><?= $i ?></option>
										<?php endfor ?>
									</select>
								</td>
							</tr>
						</tbody>
	    			</table>
	    		</form>
				<div class="span9 pull-left box2" style = "margin-left:0px;color:beige;width:703px;height:150px">
					<div class="span9 pull-left">
						<div class="span3 pull-left" style = "margin-left:0px">
							<h4 class = "font4"><i class = "icon-search"></i>&nbsp;Specific Verse Found:</h4>
						</div>
						<div class="span5 pull-right" style = "margin-top:10px;margin-right:0px;margin-left:20px">
							<div class="row">
								<?php include "Time.php"; ?>
							</div>
						</div>
						<br><br>
						<div id="verse_text" class = "span7">
							<p class = "font7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class = "icon-book"></i>&nbsp;<?= $defaultVerseText ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span3 pull-left" style = "margin-right:20px">
			<div class="span3 box" style = "width:240px;radius:5px;height:375px;margin-right:10px">
				<h4 align = "center" class = "font3"><i class = "icon-search"></i>&nbsp;Result Found</h4>
				<div class = "Scroll" style = "margin-left:5px">
					<div class="loading" id = "loading"></div>
					<div id = "result"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
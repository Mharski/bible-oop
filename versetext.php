<?php
include_once('config.php');
include_once('BibleDAO.php');

$book_id = (isset($_GET['book_id'])) ? $_GET['book_id']: false;
$chapter_id = (isset($_GET['chapter_id'])) ? $_GET['chapter_id']: false;
$verse_id = (isset($_GET['verse_id'])) ? $_GET['verse_id']: false;

$verse_text = BibleDAO::getVerseText($book_id, $chapter_id, $verse_id);

if ($verse_text == false) {
	echo json_encode(
			array(
				'status' => 'failed',
				'message' => 'Unable to get verse'
			)
		);
} else {
	echo json_encode(
			array(
				'status' => 'success',
				'verse_text' => "<p class = 'font7 span8'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class = 'icon-book'></i>&nbsp;" . $verse_text ."</p>"
			)
		);
}
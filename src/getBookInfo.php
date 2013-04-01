<?php
	require_once("simple_html_dom.php");
	// config constants
	$USTC_LIB_QUERY_URL = "http://opac.lib.ustc.edu.cn/opac/openlink.php";
	$DEBUG = false;
	
	if($DEBUG){
		$file = fopen("./tmp/test.txt", "w");
		fwrite($file, $_GET['isbn']);
		fwrite($file, $_GET['bookname']);
		fclose($file);
	}
	$subjectIsbn = $_GET['isbn'];
	$subjectIsbn = substr($subjectIsbn, 3);
	$bookname = trim($_GET['bookname']);
	$targetUrl = $USTC_LIB_QUERY_URL . "?isbn=" . $subjectIsbn;
	if($DEBUG){
		echo "targetUrl = " . $targetUrl;
	}
	$html = file_get_html($targetUrl);
	$resultArray = array();
	foreach($html->find('li[class=book_list_info]') as $bookInfo){
		$url = "http://opac.lib.ustc.edu.cn/opac/" . $bookInfo->children(0)->children(1)->href;
		if($DEBUG){
			echo "<br/>" . $url;
		}
		$title = $bookInfo->children(0)->children(1)->innertext;
		$title = preg_split('/[0-9]+[.]/', $title);
		$title = $title[1];
		if($DEBUG){
			echo "<br/>" . $title;
		}
		$accessible = $bookInfo->children(1)->children(0)->innertext;
		$accessible = preg_split('/可借复本：/', $accessible);
		if($DEBUG){
			echo "<br/>" . $accessible[1];
		}
		$totalcount = $accessible[0];
		$totalcount = preg_split('/馆藏复本：/', $totalcount);
		preg_match('/[0-9]+/', $totalcount[1], $matches);
		if($DEBUG){
			echo "<br/>" . $matches[0];
		}
		$accessible = $accessible[1];
		$totalcount = $matches[0];
		$arr = array('url'=>$url, 'title'=>$title, 'accessible'=>$accessible, 'totalcount'=> $totalcount);
		array_push($resultArray, $arr);
	}

	$targetUrl = $USTC_LIB_QUERY_URL . "?title=" . $bookname;
	$html = file_get_html($targetUrl);
	foreach($html->find('li[class=book_list_info]') as $bookInfo){
		$url = "http://opac.lib.ustc.edu.cn/opac/" . $bookInfo->children(0)->children(1)->href;
		if($DEBUG){
			echo "<br/>" . $url;
		}
		$title = $bookInfo->children(0)->children(1)->innertext;
		$title = preg_split('/[0-9]+[.]/', $title);
		$title = $title[1];
		if($DEBUG){
			echo "<br/>" . $title;
		}
		$accessible = $bookInfo->children(1)->children(0)->innertext;
		$accessible = preg_split('/可借复本：/', $accessible);
		if($DEBUG){
			echo "<br/>" . $accessible[1];
		}
		$totalcount = $accessible[0];
		$totalcount = preg_split('/馆藏复本：/', $totalcount);
		preg_match('/[0-9]+/', $totalcount[1], $matches);
		if($DEBUG){
			echo "<br/>" . $matches[0];
		}
		$accessible = $accessible[1];
		$totalcount = $matches[0];
		$arr = array('url'=>$url, 'title'=>$title, 'accessible'=>$accessible, 'totalcount'=> $totalcount);
		array_push($resultArray, $arr);
	}
	echo "processRelatedResult(".json_encode($resultArray).")";
?>

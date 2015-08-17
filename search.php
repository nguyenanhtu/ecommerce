<?php
	//Tìm kiếm sản phẩm
	include('includes/header.html');
?>

<script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#search').keyup(function(event) {
			var search_string = $(this).val();
			var datastring = 'keyword='+search_string;
			if(search_string.length >0) {
				$.ajax({
				type:'POST',
				url:'modules/search_analyze.php',
				data:datastring,
				cache:false,
				success:function(html)
				{
					$("#results").html(html);
				}
				
			});
			}
			else
			{
				$("#results").html('');
			}
			return false;
		}
		);
		
	}
	);
</script>

<h1> Trang tìm kiếm sản phẩm </h1>
<form>
<input type="text" id="search" autocomplete="off" />
</form>
<h4 id="results-text">Showing results for: <b id="search-string"> </b></h4>
<ul id="results"> </ul>


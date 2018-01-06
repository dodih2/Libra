<html> 
<title>Tutorial Menggunakan TinyMCE di dalam web PHP</title> 
<head>
	<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script> 
	<script type="text/javascript"> 
		tinymce.init({ //General options 
			selector: ".pesan",
			width:400,
			height:100,

			plugin:[
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste jbimages",
				"pagerbreak"
			],
			toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
			relative_urls: false
}); 
</script>
</head> 
<body> 
			<td><textarea name="Deskripsi Artikel" class="pesan"></textarea><br>
						<input type="submit" name="kirim"></td><br>

</body> 
</html>

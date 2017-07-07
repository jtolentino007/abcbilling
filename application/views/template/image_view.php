<!DOCTYPE html>
<html>
<head>
	<title>JCORE - Image Viewer</title>
	<link rel="shortcut icon" href="assets/abc_logo.ico" />
	<?php echo $_def_css_files; ?>
</head>
<body>
	<div id="imgModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog" style="width: 80%">
	    <div class="modal-content">
	      <div class="modal-header" style="background: #404040;">
	        <h4 class="modal-title" style="color: white;"><b>JCORE</b> IMAGE VIEWER <a class="btn btn-success pull-right" href="<?php echo $img_src; ?>" download="<?php echo $fname; ?>"><span class="fa fa-download"></span>&nbsp;Download image</a></h4>
	      </div>
	      <div class="modal-body text-center" style="overflow-x: auto;">
	        <img src="<?php echo $img_src; ?>">
	      </div>
	    </div>
	  </div>
	</div>
	<?php echo $_def_js_files; ?>
</body>
<script>
	(function(){
		$('#imgModal').modal('show');
	})();
</script>
</html>
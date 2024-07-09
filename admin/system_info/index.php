<?php if ($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>

<style>
	img#cimg {
		height: 15vh;
		width: 15vh;
		object-fit: cover;
	}

	.card-primary.card-outline {
		border-top: 3px solid white;
	}

	.text-sm .content-header h1 {
		font-size: 1.5rem;
		color: transparent;
	}

	.content-wrapper {
		background: white;
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
	}

	.card {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 0 solid rgba(0, 0, 0, 0.125);
		border-radius: 0.25rem;
		object-fit: cover;
		box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);
	}

	.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
	.sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
		background-color: transparent;
		color: #fff;
	}

	img#cimg,
	img#cimg2 {
		height: 20%;
		width: 20%;
		object-fit: cover;
	}

	.nav-pills .nav-link.active,
	.nav-pills .show>.nav-link {
		color: #fff;
		background-color: #d61ae7;
	}
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="system-frm">
				<div id="msg" class="form-group"></div>
				<div class="form-group">
					<label for="" class="control-label" style="font-family: Verdana, sans-serif;">Course</label>
					<textarea name="course" id="" cols="30"
						class="form-control"><?php echo stripslashes($_settings->info('course')) ?></textarea>
				</div>
				<div class="form-group">
					<label for="" class="control-label" style="font-family: Verdana, sans-serif;">About
						Profile</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img"
							onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile"
							style="font-family: Verdana , sans-serif;">Choose file</label>
					</div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo validate_image($_settings->info('logo')) ?>" alt="" id="cimg"
						class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button
						style="float: right;background-color: #d61ae7;font-family: Verdana, sans-serif; border-color: #363e45;"
						class="btn btn-sm btn-primary" form="system-frm"
						style="float: right;font-family: Verdana, sans-serif;">Update</button>
				</div>
			</div>
		</div>

	</div>
</div>
<script>
	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(function () {
		$('.summernote').summernote({
			height: 200,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
				['fontname', ['fontname']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph', 'height']],
				['table', ['table']],
				['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
			]
		})
	})
</script>
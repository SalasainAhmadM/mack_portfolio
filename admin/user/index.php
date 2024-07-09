<?php
$user = $conn->query("SELECT * FROM users where id ='" . $_settings->userdata('id') . "'");
foreach ($user->fetch_array() as $k => $v) {
	$meta[$k] = $v;
}
?>
<?php if ($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>
<div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="" id="manage-user">
				<input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
				<div class="input-container">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"
						value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>" required
						autocomplete="off">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" value=""
						autocomplete="off">
				</div>
				<div class="input-container">
					<label for="name">First Name</label>
					<input type="text" name="firstname" id="firstname" class="form-control"
						value="<?php echo isset($meta['firstname']) ? $meta['firstname'] : '' ?>" required>
					<label for="name">Middle Name</label>
					<input type="text" name="middlename" id="middlename" class="form-control"
						value="<?php echo isset($meta['middlename']) ? $meta['middlename'] : '' ?>">
					<label for="name">Last Name</label>
					<input type="text" name="lastname" id="lastname" class="form-control"
						value="<?php echo isset($meta['lastname']) ? $meta['lastname'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="" class="control-label">Profile</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img"
							onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo validate_image(isset($meta['avatar']) ? $meta['avatar'] : '') ?>" alt=""
						id="cimg" class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
		<div class="col-md-12">
			<div class="row">
				<button
					style="float: right;background-color: #d61ae7;font-family: Verdana, sans-serif; border-color: #363e45;"
					class="btn btn-sm btn-primary" form="manage-user">Update</button>
			</div>
		</div>
	</div>
</div>
<style>
	.input-container {
		display: flex;
		align-items: center;
		/* centers elements vertically */
	}

	.nav-pills .nav-link.active,
	.nav-pills .show>.nav-link {
		color: #fff;
		background-color: #d61ae7;
	}

	/* style for each input element */
	.input-container input,
	.input-container label {
		display: inline-block;
		margin-right: 10px;
		margin-bottom: 30px;
	}

	label {
		font-family: Verdana, sans-serif;
	}

	img#cimg,
	img#cimg2 {
		height: 20%;
		width: 20%;
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
		object-fit: cover;
		box-shadow: 0px 2px 4px -1px rgb(0 0 0 / 20%), 0px 4px 5px 0px rgb(0 0 0 / 14%), 0px 1px 10px 0px rgb(0 0 0 / 12%);
	}

	.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
	.sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
		background-color: transparent;
		color: #fff;
	}
</style>
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
	function displayImg2(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#cimg2').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#manage-user').submit(function (e) {
		e.preventDefault();
		start_loader()
		$.ajax({
			url: _base_url_ + 'classes/Users.php?f=save',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function (resp) {
				if (resp == 1) {
					location.reload()
				} else {
					$('#msg').html('<div class="alert alert-danger">Error 404!</div>')
					end_loader()
				}
			}
		})
	})

</script>
<script>

	$(document).ready(function () {
		$('#about_c').submit(function (e) {
			e.preventDefault();
			start_loader();
			$.ajax({
				url: _base_url_ + "classes/Content.php?f=update",
				method: "POST",
				data: $(this).serialize(),
				error: err => {
					alert_toast("An error occured", 'error')
					console.log(err);
				},
				success: function (resp) {
					if (resp != undefined) {
						resp = JSON.parse(resp)
						if (resp.status == 'success') {
							location.reload()
						} else {
							alert_toast("An error occured", 'error')
							console.log(resp);
							end_loader();
						}
					}
				}
			})
		})
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
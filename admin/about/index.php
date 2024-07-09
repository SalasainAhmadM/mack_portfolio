<?php if ($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<style>
			label {
				font-family: Verdana, sans-serif;
			}

			.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
			.sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
				background-color: transparent;
				color: #fff;
			}

			.card-primary.card-outline {
				border-top: 3px solid white;
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

			.text-sm .content-header h1 {
				font-size: 1.5rem;
				color: transparent;
			}

			.content-wrapper {
				background: white;
				background-color: background-repeat: no-repeat;
				background-size: cover;
				background-position: center;
			}

			.nav-pills .nav-link.active,
			.nav-pills .show>.nav-link {
				color: #fff;
				background-color: #d61ae7;
			}
		</style>
		<div class="card-body">
			<form id="about_c">
				<div class="form-group">
					<input type="hidden" name="file" value="about">
					<label for="" class="control-label">About Myself</label>
					<textarea name="content" id="" cols="30" rows="10"
						class="form-control summernote"><?php echo (is_file(base_app . 'about.html')) ? file_get_contents((base_app . 'about.html')) : '' ?></textarea>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<button
				style="float: right;background-color:#d61ae7;font-family: Verdana, sans-serif; border-color: #363e45;"
				class="btn btn-primary btn-sm" form="about_c">Update </button>
		</div>
	</div>
</div>

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
	})

</script>
<?php if ($_settings->chk_flashdata('success')): ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>
<?php
$qry = $conn->query("SELECT * from contacts ");
while ($row = $qry->fetch_assoc()) {
	$meta[$row['meta_field']] = $row['meta_value'];
}
?>
<div class="col-lg-12" style="margin-right: 70%">
	<div class="card card-outline card-primary" style="background-color: white">
		<div class="card-body">
			<form id="contact">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<style>
								label {
									font-family: Verdana, sans-serif;
								}

								.card-primary.card-outline {
									border-top: transparent;
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

								.card {}

								.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
								.sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
									background-color: transparent;
									color: #fff;
								}
							</style>
							<label for="" class="control-label">Contact Number</label>
							<div class="input-group" style="width: 100%">

								<input type="text" name="mobile" class="form-control"
									value="<?php echo isset($meta['mobile']) ? $meta['mobile'] : '' ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="control-label">Email</label>
							<div class="input-group">
								<div class="input-group-prepend">
								</div>
								<input type="text" class="form-control" name="email"
									value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Facebook Link</label>
							<div class="input-group">
								<div class="input-group-prepend">

								</div>
								<input type="text" class="form-control" name="facebook"
									value="<?php echo isset($meta['facebook']) ? $meta['facebook'] : '' ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Instagram Link</label>
							<div class="input-group">
								<div class="input-group-prepend">

								</div>
								<input type="text" class="form-control" name="instagram"
									value="<?php echo isset($meta['instagram']) ? $meta['instagram'] : '' ?>">
							</div>
						</div>
						<!--	<div class="form-group">
							<label for="" class="control-label">Twitter Link</label>
							<div class="input-group">
								<div class="input-group-prepend">
								  
								</div>
								<input type="text" class="form-control" name="twitter" value="<?php echo isset($meta['twiter']) ? $meta['twiter'] : '' ?>">
							</div>
						</div> -->
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="" class="control-label">Address</label>
							<textarea name="address" id="" cols="30"
								class="form-control "><?php echo (isset($address)) ? ($address) : '' ?></textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<button style="background-color: #d61ae7;font-family: Verdana, sans-serif; border-color: #363e45;"
				class="btn btn-primary btn-sm" form="contact">Save</button>
		</div>
	</div>
</div>
<style>
	.nav-pills .nav-link.active,
	.nav-pills .show>.nav-link {
		color: #fff;
		background-color: #d61ae7;
	}
</style>
<script>

	$(document).ready(function () {
		$('.select')
		$('#contact').submit(function (e) {
			e.preventDefault();
			start_loader();
			$.ajax({
				url: _base_url_ + "classes/Content.php?f=contact",
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
							location.href = _base_url_ + "admin/?page=contact";
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
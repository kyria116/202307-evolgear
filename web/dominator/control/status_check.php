	<script>
		function select_check(id) {
			$.ajax({
				type: "POST",
				async: true,
				url: "../control/check_doupdate.php",
				dataType: "text",
				data: {
					"db": "<?php echo $db_name; ?>",
					"id_name": "<?php echo $id_name; ?>",
					"status_name": "<?php echo $status_name; ?>",
					"id": id,
					"status": $("#check_" + id).val()
				},
				success: function(msg) {
					if (msg == 1) {
						if ($("#check_" + id).val() == 1) {
							$("#button_" + id + ", .button_" + id).addClass("btn-info");
							$("#button_" + id + ", .button_" + id).removeClass("btn-danger");
						} else {
							$("#button_" + id + ", .button_" + id).addClass("btn-danger");
							$("#button_" + id + ", .button_" + id).removeClass("btn-info");
						}
					}
				}
			});
		};
	</script>
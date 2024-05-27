<script>
	var doughnutChart;
	$(document).ready(function() {
		// Mendapatkan tanggal hari ini
		var today = new Date();

		// Mengatur nilai default input tanggal menjadi hari ini
		var yyyy = today.getFullYear();
		var mm = String(today.getMonth() + 1).padStart(2, '0'); // January dimulai dari 0
		var dd = String(today.getDate()).padStart(2, '0');
		var formattedDate = yyyy + '-' + mm + '-' + dd;

		$('#html5-date-input11').val(formattedDate);
		$('#html5-date-input22').val(formattedDate);
		$.ajax({
			url: "<?php echo base_url('dashboard/getRekap'); ?>",
			method: "POST",
			dataType: "json",
			data: function(d) {
				d.tgl_1 = $('#html5-date-input11').val(),
					d.tgl_2 = $('#html5-date-input22').val()
			},
			success: function(data) {
				var sukses = parseInt(data.data.sukses_pascabayar) + parseInt(data.data.sukses_prabayar);
				var gagal = parseInt(data.data.gagal_pascabayar) + parseInt(data.data.gagal_prabayar);
				document.getElementById("total_member").innerText = data.data.total_member;
				document.getElementById("total_balance_pending").innerText = formatCurrency(data.data.total_balance_pending);
				document.getElementById("total_balance_qris").innerText = formatCurrency(data.data.total_balance_qris);
				document.getElementById("total_balance").innerText = formatCurrency(data.data.total_balance);
				document.getElementById("kredit").innerText = formatCurrency(sukses);
				document.getElementById("debet").innerText = formatCurrency(gagal);
				document.getElementById("total_transaksi").innerText = formatCurrency(parseInt(data.data.sukses_pascabayar) + parseInt(data.data.gagal_pascabayar) + parseInt(data.data.sukses_prabayar) + parseInt(data.data.gagal_prabayar));
				document.getElementById("total_deposit").innerText = formatCurrency(data.data.total_deposit);

				
				createChart(sukses, gagal);
			},
			error: function(xhr, status, error) {
				// Handle error jika terjadi
				alert('Terjadi Kesalahan')
			}
		});
	});

	$('#btnSubmit').click(function() {
		$.ajax({
			url: "<?php echo base_url('dashboard/getRekap'); ?>",
			method: "POST",
			dataType: "json",
			data: function(d) {
				d.tgl_1 = $('#html5-date-input11').val(),
					d.tgl_2 = $('#html5-date-input22').val()
			},
			success: function(data) {
				alert('Data Berhasil Diperbarui');
				document.getElementById("total_member").innerText = data.data.total_member;
				document.getElementById("total_balance_pending").innerText = formatCurrency(data.data.total_balance_pending);
				document.getElementById("total_balance_qris").innerText = formatCurrency(data.data.total_balance_qris);
				document.getElementById("total_balance").innerText = formatCurrency(data.data.total_balance);
				document.getElementById("kredit").innerText = formatCurrency(data.data.kredit);
				document.getElementById("debet").innerText = formatCurrency(data.data.debet);
				document.getElementById("total_transaksi").innerText = formatCurrency(parseInt(data.data.sukses_pascabayar) + parseInt(data.data.gagal_pascabayar) + parseInt(data.data.sukses_prabayar) + parseInt(data.data.gagal_prabayar));
				document.getElementById("total_deposit").innerText = formatCurrency(data.data.total_deposit);
				var sukses = parseInt(data.data.sukses_pascabayar) + parseInt(data.data.sukses_prabayar);
				var gagal = parseInt(data.data.gagal_pascabayar) + parseInt(data.data.gagal_prabayar);
				updateChart(sukses, gagal);
			},
			error: function(xhr, status, error) {
				// Handle error jika terjadi
				alert('Terjadi Kesalahan')
			}
		});
	});

	$('#btnReset').click(function() {
		// Mendapatkan tanggal hari ini
		var today = new Date();

		// Mengatur nilai default input tanggal menjadi hari ini
		var yyyy = today.getFullYear();
		var mm = String(today.getMonth() + 1).padStart(2, '0'); // January dimulai dari 0
		var dd = String(today.getDate()).padStart(2, '0');
		var formattedDate = yyyy + '-' + mm + '-' + dd;

		$('#html5-date-input11').val(formattedDate);
		$('#html5-date-input22').val(formattedDate);
		$.ajax({
			url: "<?php echo base_url('dashboard/getRekap'); ?>",
			method: "POST",
			dataType: "json",
			data: function(d) {
				d.tgl_1 = $('#html5-date-input11').val(),
					d.tgl_2 = $('#html5-date-input22').val()
			},
			success: function(data) {
				alert('Data Berhasil Diperbarui');
				$('#html5-date-input11').val(null);
				$('#html5-date-input22').val(null);
				document.getElementById("total_member").innerText = data.data.total_member;
				document.getElementById("total_balance_pending").innerText = formatCurrency(data.data.total_balance_pending);
				document.getElementById("total_balance_qris").innerText = formatCurrency(data.data.total_balance_qris);
				document.getElementById("total_balance").innerText = formatCurrency(data.data.total_balance);
				document.getElementById("kredit").innerText = formatCurrency(data.data.kredit);
				document.getElementById("debet").innerText = formatCurrency(data.data.debet);
				document.getElementById("total_transaksi").innerText = formatCurrency(parseInt(data.data.sukses_pascabayar) + parseInt(data.data.gagal_pascabayar) + parseInt(data.data.sukses_prabayar) + parseInt(data.data.gagal_prabayar));
				document.getElementById("total_deposit").innerText = formatCurrency(data.data.total_deposit);
				var sukses = parseInt(data.data.sukses_pascabayar) + parseInt(data.data.sukses_prabayar);
				var gagal = parseInt(data.data.gagal_pascabayar) + parseInt(data.data.gagal_prabayar);
				updateChart(sukses, gagal);
			},
			error: function(xhr, status, error) {
				// Handle error jika terjadi
				alert('Terjadi Kesalahan')
			}
		});

	});

	function formatCurrency(amount) {
		// Fungsi untuk memformat nilai numerik menjadi format mata uang Indonesia
		var formatter = new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 0
		});
		return formatter.format(amount);
	}

	function createChart(sukses, gagal) {
		var ctx = document.getElementById('doughnutChart').getContext('2d');
		doughnutChart = new Chart(ctx, {
			type: "doughnut",
			data: {
				labels: ["Transaksi Sukses", "Transaksi Gagal"],
				datasets: [{
					data: [sukses, gagal],
					backgroundColor: [
						'rgba(75, 192, 192, 0.7)', // Warna hijau dengan alpha 0.7
						'rgba(255, 99, 132, 0.7)' // Warna merah dengan alpha 0.7
					],
					borderColor: [
						'rgba(75, 192, 192, 1)', // Warna hijau tanpa alpha
						'rgba(255, 99, 132, 1)' // Warna merah tanpa alpha
					],
					borderWidth: 0,
					pointStyle: "rectRounded",
				}, ],
			},
			options: {
				responsive: !0,
				animation: {
					duration: 500
				},
				cutout: "68%",
				plugins: {
					legend: {
						display: !1
					},
				},
			},
		});
	}

	function updateChart(sukses, gagal) {
		if (doughnutChart) {
			doughnutChart.data.datasets[0].data = [sukses, gagal];
			doughnutChart.update(); // Mengupdate grafik
		}
	}



	// Inisialisasi grafik
</script>
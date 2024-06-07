<script>
	var doughnutChart;
	$(document).ready(function() {
		// Mendapatkan tanggal hari ini

		$.ajax({
			url: "<?php echo base_url('dashboard/getRekap'); ?>",
			method: "POST",
			dataType: "json",
			data: {
				tgl_1: $('#html5-date-input11').val(),
				tgl_2: $('#html5-date-input22').val()
			},
			success: function(data) {
				var sukses = parseInt(data.data.daily_sukses_pascabayar) + parseInt(data.data.daily_sukses_prabayar);
				var gagal = parseInt(data.data.daily_gagal_pascabayar) + parseInt(data.data.daily_gagal_prabayar);
				var pending = parseInt(data.data.daily_pending_pascabayar) + parseInt(data.data.daily_pending_prabayar);
				document.getElementById("total_member").innerText = data.data.total_member;
				document.getElementById("total_balance_pending").innerText = pending;
				document.getElementById("total_balance_qris").innerText = formatCurrency(data.data.total_balance_qris);
				document.getElementById("total_balance").innerText = formatCurrency(data.data.total_balance);
				document.getElementById("kredit").innerText = sukses;
				document.getElementById("debet").innerText = gagal;
				document.getElementById("total_transaksi").innerText = sukses + gagal + pending;
				document.getElementById("total_deposit").innerText = formatCurrency(data.data.total_deposit);


				createChart(sukses, gagal, pending);
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
			data: {
				tgl_1: $('#html5-date-input11').val(),
				tgl_2: $('#html5-date-input22').val()
			},
			success: function(data) {
				alert('Data Berhasil Diperbarui');
				var sukses = parseInt(data.data.daily_sukses_pascabayar) + parseInt(data.data.daily_sukses_prabayar);
				var gagal = parseInt(data.data.daily_gagal_pascabayar) + parseInt(data.data.daily_gagal_prabayar);
				var pending = parseInt(data.data.daily_pending_pascabayar) + parseInt(data.data.daily_pending_prabayar);
				document.getElementById("total_member").innerText = data.data.total_member;
				document.getElementById("total_balance_pending").innerText = pending;
				document.getElementById("total_balance_qris").innerText = formatCurrency(data.data.total_balance_qris);
				document.getElementById("total_balance").innerText = formatCurrency(data.data.total_balance);
				document.getElementById("kredit").innerText = sukses;
				document.getElementById("debet").innerText = gagal;
				document.getElementById("total_transaksi").innerText = sukses + gagal + pending;
				document.getElementById("total_deposit").innerText = formatCurrency(data.data.total_deposit);


				updateChart(sukses, gagal, pending);
			},
			error: function(xhr, status, error) {
				// Handle error jika terjadi
				alert('Terjadi Kesalahan')
			}
		});
	});

	$('#btnReset').click(function() {
		// Mendapatkan tanggal hari ini

		$.ajax({
			url: "<?php echo base_url('dashboard/getRekap'); ?>",
			method: "POST",
			dataType: "json",
			data: {
				tgl_1: $('#html5-date-input11').val(),
				tgl_2: $('#html5-date-input22').val()
			},
			success: function(data) {
				alert('Data Berhasil Diperbarui');
				$('#html5-date-input11').val(null);
				$('#html5-date-input22').val(null);
				var sukses = parseInt(data.data.daily_sukses_pascabayar) + parseInt(data.data.daily_sukses_prabayar);
				var gagal = parseInt(data.data.daily_gagal_pascabayar) + parseInt(data.data.daily_gagal_prabayar);
				var pending = parseInt(data.data.daily_pending_pascabayar) + parseInt(data.data.daily_pending_prabayar);
				document.getElementById("total_member").innerText = data.data.total_member;
				document.getElementById("total_balance_pending").innerText = pending;
				document.getElementById("total_balance_qris").innerText = formatCurrency(data.data.total_balance_qris);
				document.getElementById("total_balance").innerText = formatCurrency(data.data.total_balance);
				document.getElementById("kredit").innerText = sukses;
				document.getElementById("debet").innerText = gagal;
				document.getElementById("total_transaksi").innerText = sukses + gagal + pending;
				document.getElementById("total_deposit").innerText = formatCurrency(data.data.total_deposit);
				updateChart(sukses, gagal, pending);
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

	function createChart(sukses, gagal, pending) {
		var ctx = document.getElementById('doughnutChart').getContext('2d');
		doughnutChart = new Chart(ctx, {
			type: "doughnut",
			data: {
				labels: ["Transaksi Sukses", "Transaksi Gagal", "Transaksi Pending"],
				datasets: [{
					data: [sukses, gagal, pending],
					backgroundColor: [
						'rgba(75, 192, 192, 0.7)', // Warna hijau dengan alpha 0.7
						'rgba(255, 99, 132, 0.7)', // Warna merah dengan alpha 0.7,
						'rgba(255, 255, 0, 0.7)' // Warna kuning dengan alpha 0.7
					],
					borderColor: [
						'rgba(75, 192, 192, 1)', // Warna hijau tanpa alpha
						'rgba(255, 99, 132, 1)', // Warna merah tanpa alpha,
						'rgba(255, 255, 0, 1)' // Warna kuning tanpa alpha
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

	function updateChart(sukses, gagal, pending) {
		if (doughnutChart) {
			doughnutChart.data.datasets[0].data = [sukses, gagal, pending];
			doughnutChart.update(); // Mengupdate grafik
		}
	}



	// Inisialisasi grafik
</script>
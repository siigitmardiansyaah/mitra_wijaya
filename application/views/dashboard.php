<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="row mb-4">
            <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Summary Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="javascript:void(0)">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Mulai</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="date" name="tgl_permohonan11" id="html5-date-input11" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label" for="basic-icon-default-fullname">Tanggal Selesai</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control" type="date" name="tgl_permohonan22" id="html5-date-input22" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-form-label" for="basic-icon-default-fullname">&nbsp;</label>
                                        <div class="input-group input-group-merge">
                                            <button type="button" style="margin-right: 10px;" class="btn btn-outline-primary" id="btnSubmit">
                                                <span class="tf-icons bx bx-filter me-1"></span>Filter
                                            </button>
                                            <button type="button" class="btn btn-outline-warning" id="btnReset">
                                                <span class="tf-icons bx bx-reset me-1"></span>Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <div class="row mb-4 g-3">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="total_member"></h3>
                                <small>Total Member</small>
                            </div>
                            <span class="badge bg-label-primary rounded-circle p-2">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="total_balance_qris"></h3>
                                <small>Total Saldo QRIS</small>
                            </div>
                            <span class="badge bg-label-info rounded-circle p-2">
                                <i class="bx bx-qr-scan bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="total_balance"></h3>
                                <small>Total Saldo Aktif</small>
                            </div>
                            <span class="badge bg-label-success rounded-circle p-2">
                                <i class="bx bx-money bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="total_deposit"></h3>
                                <small>Total Deposit</small>
                            </div>
                            <span class="badge bg-label-info rounded-circle p-2">
                                <i class="bx bx-credit-card-alt bx-money"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="kredit"></h3>
                                <small>Transaksi Sukses</small>
                            </div>
                            <span class="badge bg-label-success rounded-circle p-2">
                                <i class="bx bx-check-double bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="debet"></h3>
                                <small>Transaksi Gagal</small>
                            </div>
                            <span class="badge bg-label-danger rounded-circle p-2">
                                <i class="bx bx-x bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="total_balance_pending"></h3>
                                <small>Transaksi Pending</small>
                            </div>
                            <span class="badge bg-label-warning rounded-circle p-2">
                                <i class="bx bx-loader bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h3 class="mb-0" id="total_transaksi"></h3>
                                <small>Total Transaksi</small>
                            </div>
                            <span class="badge bg-label-info rounded-circle p-2">
                                <i class="bx bx-transfer bx-"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row mb-4">
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <h5 class="card-header">Chart Transaksi Per Hari Ini</h5>
                    <div class="card-body">
                        <canvas id="doughnutChart" class="chartjs mb-4" data-height="100"></canvas>
                        <ul class="doughnut-legend d-flex justify-content-around ps-0 mb-2 pt-1">
                            <li class="ct-series-0 d-flex flex-column">
                                <h5 class="mb-0">Transaksi Sukses</h5>
                                <span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgba(75, 192, 192, 0.7);width:35px; height:6px;"></span>
                                <div class="text-muted" id="berhasil_bayar"></div>
                            </li>
                            <li class="ct-series-1 d-flex flex-column">
                                <h5 class="mb-0">Transaksi Gagal</h5>
                                <span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgba(255, 99, 132, 0.7);width:35px; height:6px;"></span>
                                <div class="text-muted" id="gagal_bayar"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-xl-8">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php echo $welcome ?> 🎉</h5>
                                <p class="mb-4">Selamat datang! Temukan informasi yang kamu butuhkan di website ini</p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?php echo base_url() ?>assets/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- / Content -->
<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url() ?>assets/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $title ?></title>


    <meta name="description" content="Mitra Wijaya" />
    <meta name="keywords" content="Mitra Wijaya">
    <!-- Canonical SEO -->
    <!-- <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/"> -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/assets/img/handshake.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="<?php echo base_url() ?>assets/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo base_url() ?>assets/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url() ?>assets/assets/js/config.js"></script>

</head>

<body>

    <!-- Content -->

    <div class="authentication-wrapper authentication-basic px-4">
        <div class="authentication-inner">
            <!--  Two Steps Verification -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">

                                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                        <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                                        <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                                        <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                                    </defs>
                                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                    <mask id="mask-2" fill="white">
                                                        <use xlink:href="#path-1"></use>
                                                    </mask>
                                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                                    <g id="Path-3" mask="url(#mask-2)">
                                                        <use fill="#696cff" xlink:href="#path-3"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                    </g>
                                                    <g id="Path-4" mask="url(#mask-2)">
                                                        <use fill="#696cff" xlink:href="#path-4"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                    </g>
                                                </g>
                                                <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                            </span>
                            <span class="app-brand-text demo text-body fw-bold" style="text-transform: uppercase;">Mitra Wijaya</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Two Step Verification 💬</h4>
                    <p class="text-start mb-4">
                    Kode OTP dikirim, Silahkan cek inbox dan spam Email anda
                    </p>
                    <p class="mb-0 fw-medium">Ketikkan 6 digit kode OTP Anda</p>
                    <form id="twoStepsForm" action="<?php echo base_url() ?>setting/prosesOTP" method="POST">
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-warning d-flex mb-0" role="alert">
                                <div class="d-flex flex-column ps-1">
                                    <h6 class="alert-heading d-flex align-items-center mb-1">Terjadi Kesalahan</h6>
                                    <span><?php echo $this->session->flashdata('error') ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success d-flex mb-0" role="alert">
                                <div class="d-flex flex-column ps-1">
                                    <h6 class="alert-heading d-flex align-items-center mb-1">Success</h6>
                                    <span><?php echo $this->session->flashdata('success') ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
                                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1" autofocus>
                                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
                            </div>
                            <!-- Create a hidden field which is combined by 3 fields above -->
                            <input type="hidden" name="otp" id="verificationCode" />
                        </div>
                        <button class="btn btn-info d-grid w-100 mb-3" type="submit">
                            Update
                        </button>
                        <?php if($kode == 1) : ?>
                        <a href="<?php echo base_url()?>setting/integrasi_qris" class="btn btn-warning d-grid w-100 mb-3">Kembali</a>
                        <?php else : ?>
                            <a href="<?php echo base_url()?>integrasi/transaksi_ip" class="btn btn-warning d-grid w-100 mb-3">Kembali</a>
                        <?php endif; ?>
                        <div>
                            <!-- Teks untuk menampilkan waktu mundur -->
                            <p style="text-align: center; font-weight: bold;">Anda dapat mengirim ulang OTP dalam</p>
                        </div>
                        <button class="btn btn-warning d-grid w-100 mb-3" id="resendBtn" onclick="resendOTP()" disabled type="button"> 5:00
                        </button>
                    </form>
                </div>
            </div>
            <!-- / Two Steps Verification -->
        </div>
    </div>

    <!-- / Content -->






    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="<?php echo base_url() ?>assets/assets/js/pages-auth.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/js/pages-auth-two-steps.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var otpInputs = document.querySelectorAll(".auth-input");

            function setupOtpInputListeners(inputs) {
                inputs.forEach(function(input, index) {
                    input.addEventListener("paste", function(ev) {
                        var clip = ev.clipboardData.getData('text').trim();
                        if (!/^\d{6}$/.test(clip)) {
                            ev.preventDefault();
                            return;
                        }

                        var characters = clip.split("");
                        inputs.forEach(function(otpInput, i) {
                            otpInput.value = characters[i] || "";
                        });

                        enableNextBox(inputs[0], 0);
                        inputs[5].removeAttribute("disabled");
                        inputs[5].focus();
                        updateOTPValue(inputs);
                    });

                    input.addEventListener("input", function() {
                        var currentIndex = Array.from(inputs).indexOf(this);
                        var inputValue = this.value.trim();

                        if (!/^\d$/.test(inputValue)) {
                            this.value = "";
                            return;
                        }

                        if (inputValue && currentIndex < 5) {
                            inputs[currentIndex + 1].removeAttribute("disabled");
                            inputs[currentIndex + 1].focus();
                        }

                        if (currentIndex === 4 && inputValue) {
                            inputs[5].removeAttribute("disabled");
                            inputs[5].focus();
                        }

                        updateOTPValue(inputs);
                    });

                    input.addEventListener("keydown", function(ev) {
                        var currentIndex = Array.from(inputs).indexOf(this);

                        if (!this.value && ev.key === "Backspace" && currentIndex > 0) {
                            inputs[currentIndex - 1].focus();
                        }
                    });
                });
            }

            function enableNextBox(input, currentIndex) {
                var inputValue = input.value;

                if (inputValue === "") {
                    return;
                }

                var nextIndex = currentIndex + 1;
                var nextBox = otpInputs[nextIndex] || emailOtpInputs[nextIndex];

                if (nextBox) {
                    nextBox.removeAttribute("disabled");
                }
            }

            function updateOTPValue(inputs) {
                var otpValue = "";

                inputs.forEach(function(input) {
                    otpValue += input.value;
                });

                if (inputs === otpInputs) {
                    document.getElementById("verificationCode").value = otpValue;
                } else if (inputs === emailOtpInputs) {
                    document.getElementById("emailverificationCode").value = otpValue;
                }
            }

            setupOtpInputListeners(otpInputs);
            setupOtpInputListeners(emailOtpInputs);

            otpInputs[0].focus(); // Set focus on the first OTP input field
            emailOtpInputs[0].focus(); // Set focus on the first email OTP input field

            otpInputs[5].addEventListener("input", function() {
                updateOTPValue(otpInputs);
            });

            emailOtpInputs[5].addEventListener("input", function() {
                updateOTPValue(emailOtpInputs);
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
     <script>
        let countdown; // variabel untuk menyimpan interval countdown
        const resendBtn = document.getElementById('resendBtn');

        function startCountdown(duration) {
            let timer = duration;
            countdown = setInterval(function() {
                const minutes = Math.floor(timer / 60);
                let seconds = timer % 60;

                seconds = seconds < 10 ? '0' + seconds : seconds;

                // Update teks tombol dengan countdown
                resendBtn.textContent = `${minutes}:${seconds}`;

                if (--timer < 0) {
                    clearInterval(countdown);
                    resendBtn.textContent = 'Kirim Ulang Code OTP'; // Reset teks tombol
                    resendBtn.disabled = false; // Aktifkan kembali tombol
                }
            }, 1000);
        }

        // Mulai countdown saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            startCountdown(300); // 5 menit = 300 detik
        });

        // Fungsi untuk mengirim ulang OTP
        function resendOTP() {
            $.ajax({
                url: "<?php echo base_url('integrasi/resendOTP'); ?>",
                method: "POST",
                dataType: "json",
                data: function(d) {
                    d.tgl_1 = "",
                        d.tgl_2 = ""
                },
                success: function(data) {
                    if (data.status_code === 500) {
                        alert(data.messages);
                        <?php if ($kode == 1 || $kode == 2) : ?>
                            window.location.href = "<?php echo base_url() ?>integrasi/integrasi_qris";
                        <?php else : ?>
                            window.location.href = "<?php echo base_url() ?>integrasi/transaksi_ip";
                        <?php endif; ?>
                    } else {
                        alert(data.messages);
                        resendBtn.disabled = true; // Menonaktifkan tombol
                        startCountdown(300); // Mulai countdown kembali setelah tombol diklik
                    }


                },
                error: function(xhr, status, error) {
                    // Handle error jika terjadi
                    alert('Terjadi Kesalahan')
                    // startCountdown();
                    <?php if ($kode == 1 || $kode == 2) : ?>
                        window.location.href = "<?php echo base_url() ?>integrasi/integrasi_qris";
                    <?php else : ?>
                        window.location.href = "<?php echo base_url() ?>integrasi/transaksi_ip";
                    <?php endif; ?>
                }
            });

        }
    </script>
</body>

</html>

<!-- beautify ignore:end -->
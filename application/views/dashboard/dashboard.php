<div>
    <div class="page-header">
        <h1 class="page-title">
            Dashboard
        </h1>
    </div>
    <!-- ADMIN SECTION -->
    <?php if ($_SESSION['admin']['user_role'] === "ADMIN") {?>
    <div class="col-12 col-xs-6">
        <div class="row row-cards">
            <div class="col-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Mendaftar</div>
                        <div class="h1 m-0"><?php echo $mendaftar?></div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Diperiksa</div>
                        <div class="h1 m-0"><?php echo $diperiksa?></div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Selesai Di periksa</div>
                        <div class="h1 m-0"><?php echo $selesai?></div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Batal Periksa</div>
                        <div class="h1 m-0"><?php echo $batal?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?}?>
    <!-- END ADMIN SECTION -->

    <!-- DOCTOR SECTION -->
    <?php if ($_SESSION['admin']['user_role'] === "DOKTER") {?>
    <div class="col-12 col-xs-6">
        <div class="row row-cards">
            <div class="col-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Mendaftar</div>
                        <div class="h1 m-0"><?php echo $mendaftar?></div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Diperiksa</div>
                        <div class="h1 m-0"><?php echo $diperiksa?></div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Selesai Di periksa</div>
                        <div class="h1 m-0"><?php echo $selesai?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?}?>
    <!-- END DOCTOR SECTION -->

    <!-- RESERVATION SECTION -->
    <?php if ($_SESSION['admin']['user_role'] === "RESEPSIONIS") {?>
    <div class="col-12 col-xs-6">
        <div class="row row-cards">
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Mendaftar</div>
                        <div class="h1 m-0"><?php echo $mendaftar?></div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Batal Periksa</div>
                        <div class="h1 m-0"><?php echo $batal?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?}?>
    <!-- END RESERVATION SECTION -->

    <!-- APOTEKER SECTION -->
    <?php if ($_SESSION['admin']['user_role'] === "APOTEKER") {?>
    <div class="col-12 col-xs-6">
        <div class="row row-cards">
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Diperiksa</div>
                        <div class="h1 m-0"><?php echo $diperiksa?></div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-muted mb-4">Pasien Selesai Di periksa</div>
                        <div class="h1 m-0"><?php echo $selesai?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?}?>
    <!-- END APOTEKER SECTION -->
</div>
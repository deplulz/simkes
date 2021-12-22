<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pasien</h3>
                <?php if (($_SESSION['admin']['user_role'] === "RESEPSIONIS") || ($_SESSION['admin']['user_role'] === "ADMIN")) {?>
                <a href="<?php echo base_url("reservation/add");?>" class="btn btn-primary ml-auto"><i
                        class="p-1 dropdown-icon text-white fe fe-file-plus"></i> Tambah Antrian</a>
                <?}?>
            </div>
            <div class="">
                <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                    <thead>
                        <tr>
                            <th class="text-center w-1"></i>No. </th>
                            <th>Nama Pasien</th>
                            <th>Status Pasien</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $a=0;
                        foreach ($data as $data) {?>
                        <tr>
                            <td class="text-center">
                                <?php echo $a=$a+1?>
                            </td>
                            <td>
                                <?php echo $data->patient_name;?>
                            </td>
                            <td>
                                <?php echo $data->reference_label;?>
                            </td>

                            <td class="text-center">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                            class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php if ($_SESSION['admin']['user_role'] === "DOKTER") {?>
                                        <a href="<?php echo base_url('examination/put/'.$data->reservation_id);?>"
                                            class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Panggil
                                            Pasien </a>
                                        <?}?>
                                        <?php if (($_SESSION['admin']['user_role'] === "RESEPSIONIS") || ($_SESSION['admin']['user_role'] === "ADMIN")) {?>
                                        <a href="<?php echo base_url('reservation/put/'.$data->reservation_id);?>"
                                            class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Ubah </a>
                                        <a href="<?php echo base_url('reservation/remove/'.$data->reservation_id);?>"
                                            class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Hapus </a>
                                        <?}?>
                                        <?php if ($_SESSION['admin']['user_role'] === "APOTEKER") {?>
                                        <a href="<?php echo base_url('recipe/put/'.$data->reservation_id);?>"
                                            class="dropdown-item"><i class="dropdown-icon fe fe-file-text"></i> Proses Resep</a>
                                        <?}?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
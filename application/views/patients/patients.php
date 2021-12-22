<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pasien</h3>
                    <a href="<?php echo base_url("patient/add");?>" class="btn btn-primary ml-auto"><i
                                                class="p-1 dropdown-icon text-white fe fe-user-plus"></i> Tambah Pasien</a>
            </div>
            <div class="">
                <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                    <thead>
                        <tr>
                            <th class="text-center w-1"></i>No. </th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center w-1"></th>
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
                                <div><?php echo $data->patient_name;?></div>
                                <div class="small text-muted">
                                    <?php echo myDateTime($data->created_date);?>
                                </div>
                            </td>
                            <td>
                                <?php echo $data->patient_address;?>
                            </td>

                            <td class="text-center">
                                <?php echo $data->patient_gender;?>
                            </td>

                            <td class="text-center">
                                <?php echo $data->patient_age;?> Tahun
                            </td>

                            <td class="text-center">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                            class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="<?php echo base_url('patient/put/'.$data->patient_id);?>" class="dropdown-item"><i
                                                class="dropdown-icon fe fe-edit-2"></i> Ubah </a>
                                        <a href="<?php echo base_url('patient/remove/'.$data->patient_id);?>" class="dropdown-item"><i
                                                class="dropdown-icon fe fe-trash"></i> Hapus </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?}?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                
            </div>
        </div>
    </div>
</div>
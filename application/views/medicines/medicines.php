<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Obat</h3>
            </div>
            <div class="">
                <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                    <thead>
                        <tr>
                            <th class="text-center w-1"></i>No. </th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Stok Obat</th>
                            <th>Harga</th>
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
                                <div><?php echo $data->medicine_name;?></div>
                            </td>
                            <td>
                                <?php echo $data->medicine_type;?>
                            </td>
                            <td> 
                                <?php echo $data->medicine_stock;?>
                            </td>
                            <td>
                                <?php echo rupiah($data->medicine_price);?>
                            </td>

                            <td class="text-center">
                                <div class="item-action dropdown">
                                    <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                            class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="<?php echo base_url('medicine/put/'.$data->medicine_id);?>" class="dropdown-item"><i
                                                class="dropdown-icon fe fe-edit-2"></i> Ubah </a>
                                        <a href="<?php echo base_url('medicine/remove/'.$data->medicine_id);?>" class="dropdown-item"><i
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
                <div class="d-flex">
                    <a href="<?php echo base_url("medicine/add");?>" class="btn btn-primary ml-auto">Tambah Obat</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row row-cards row-deck">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Penjualan Obat</h3>
                <a href="<?php echo base_url("report_selling_print");?>" class="btn btn-primary ml-auto"><i
                                                class="p-1 dropdown-icon text-white fe fe-printer"></i> Cetak Laporan</a>
            </div>
            <div class="">
                <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                    <thead>
                        <tr>
                            <th class="text-center w-1"></i>No. </th>
                            <th>Nama Obat</th>
                            <th>Jumlah Terjual</th>
                            <th class="text-right w-1">Stok Tersedia</th>
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
                                <?php echo $data->medicine_name;?>
                            </td>
                            <td class="pl-5">
                                <?php echo $data->Sell;?>
                            </td>

                            <td class="text-center"> 
                                <?php echo $data->medicine_stock;?>
                            </td>
                        </tr>
                        <?}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
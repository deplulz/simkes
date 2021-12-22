<div class="row">
    <div class="col-6">
        <form action="<?php echo $url;?>" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Informasi Pasien</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="form-group">
                            <label class="form-label">Nama Pasien</label>
                            <select name="patient_name" class="form-control" required>
                                <option value="" disabled selected hidden>Nama Pasien</option>
                                <?php
                                if (!empty($patients)) {
                                    for( $i = 0; $i < count($patients); $i++ ) {
                                    echo '<option value = "' . $patients[$i]->patient_id .'"' . (!empty($data[0]) ? $data[0]->reservation_user === $patients[$i]->patient_id ? 'selected="selected"' : '' : '' ) . '>' . $patients[$i]->patient_name . '</option>';
                                    }
                                };?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status Pasien</label>
                            <select name="status_patient" class="form-control" aria-disable="true" required>
                                <option value="" disabled selected hidden>Status Pasien</option>
                                <?php
                                if (!empty($status)) {
                                    for( $i = 0; $i < count($status); $i++ ) {
                                    echo '<option value = "' . $status[$i]->reference_id .'"' . (!empty($data[0]) ? $data[0]->reservation_status === $status[$i]->reference_id ? 'selected="selected"' : '' : '' ) . '>' . $status[$i]->reference_label . '</option>';
                                    }
                                };?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Obat Pasien</label>
                            <select name="medicine_patient[]" class="form-control" multiple="multiple" required
                                disabled>
                                <option value="" selected hidden>Obat Pasien</option>
                                <?php
                                if (!empty($medicine)) {
                                    $_arr_id = array();
                                    for( $i = 0; $i < count($medicine); $i++ ) {
                                        array_push($_arr_id,$medicine[$i]->medicine_id);
                                        echo '<option value = "' . $medicine[$i]->medicine_id .'"' . 'selected="selected">' . $medicine[$i]->medicine_name . '</option>';
                                    }
                                };?>
                            </select>
                        </div>

                        <input name="flag" type="text" class="form-control" value="<?php echo $flag;?>" hidden>
                        <input name="reservation_id" type="text" class="form-control"
                            value="<?php echo !empty($data[0]) ? $data[0]->reservation_id : "";?>" hidden>
                        <input name="mid" type="text" class="form-control" value="<?php foreach($_arr_id as $data) { echo $data . "|";};?>" hidden readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <Button class="btn btn btn-outline-primary ml-auto">Selesai</Button>
            </div>
        </form>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Obat</h3>
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
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $a=0;
                        $total_price=0;
                        foreach ($medicine as $data) {?>
                        <tr>
                            <?php $total_price = $total_price+$data->medicine_price?>
                            <td class="text-center">
                                <?php echo $a=$a+1?>
                            </td>

                            <td>
                                <?php echo $data->medicine_name;?>
                            </td>
                            <td>
                                1 Buah
                            </td>
                            <td>
                                <?php echo rupiah($data->medicine_price);?>
                            </td>
                        </tr>
                        <?}?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-left">
                                Total
                            </div>
                            <div class="mr-5"><b><?php echo rupiah($total_price);?></b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
});
</script>
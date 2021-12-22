<div class="row">
    <div class="col-12">
        <form action="<?php echo $url;?>" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Reservasi Pasien</h3>
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

                        <!-- show only in role doctor -->
                        <?php if ($_SESSION['admin']['user_role'] === "DOKTER") {?>
                        <div class="form-group">
                            <label class="form-label">Obat Pasien</label>
                            <select name="medicine_patient[]" class="form-control" multiple="multiple" required>
                                <option value="" selected hidden>Obat Pasien</option>
                                <?php
                                if (!empty($medicine)) {
                                    for( $i = 0; $i < count($medicine); $i++ ) {
                                    echo '<option value = "' . $medicine[$i]->medicine_id .'"' . (!empty($data[0]) ? $data[0]->medicine === $medicine[$i]->medicine_id ? 'selected="selected"' : '' : '' ) . '>' . $medicine[$i]->medicine_name . '</option>';
                                    }
                                };?>
                            </select>
                        </div>
                        <?}?>

                        <input name="flag" type="text" class="form-control" value="<?php echo $flag;?>" hidden>
                        <input name="reservation_id" type="text" class="form-control"
                            value="<?php echo !empty($data[0]) ? $data[0]->reservation_id : "";?>" hidden>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <?php if ($_SESSION['admin']['user_role'] !== "DOKTER") {?>
                <a href="javascript:prev()" class="btn btn btn-outline-danger">Batal</a>
                <?}?>
                <Button class="btn btn btn-outline-primary ml-auto">Simpan</Button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
});
</script>
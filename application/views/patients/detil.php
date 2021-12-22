<div class="row">
    <div class="col-12">
        <form action="<?php echo base_url("patient/post");?>" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="form-group">
                            <label class="form-label">Rekam Medis</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-clipboard"></i>
                                </span>
                                <input name="medical_record" type="text" class="form-control" placeholder="Nomor Rekam Medis Pasien" readonly value="<?php echo !empty($data[0]) ? $data[0]->patient_id : "" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Pasien</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-user"></i>
                                </span>
                                <input name="name" type="text" class="form-control" placeholder="Nama Pasien" value="<?php echo !empty($data[0]) ? $data[0]->patient_name : "" ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-user-check"></i>
                                </span>
                                <select name="gender" class="form-control" placeholder="Jenis Kelamin" required>
                                    <option value="" disabled selected hidden>Jenis Kelamin</option>
                                    <?php
                                if (!empty($gender)) {
                                    for( $i = 0; $i < count($gender); $i++ ) {
                                    echo '<option value = "' . $gender[$i]->reference_id .'"' . (!empty($data[0]) ? $data[0]->patient_gender === $gender[$i]->reference_id ? 'selected="selected"' : '' : '' ) . '>' . $gender[$i]->reference_label . '</option>';
                                    }
                                };?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alamat Pasien</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-map"></i>
                                </span>
                                <input name="address" type="text" class="form-control" placeholder="Alamat pasien" value="<?php echo !empty($data[0]) ? $data[0]->patient_address : "" ?>" required> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Umur Pasien</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-calendar"></i>
                                </span>
                                <input name="age" type="text" class="form-control" placeholder="Umur Pasien" value="<?php echo !empty($data[0]) ? $data[0]->patient_age : "" ?>" required>
                            </div>
                        </div>
                        <input name="flag" type="text" class="form-control" value="<?php echo $flag;?>" hidden>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="javascript:prev()" class="btn btn btn-outline-danger">Batal</a>
                <Button class="btn btn btn-outline-primary ml-auto">Simpan</Button>
            </div>
        </form>
    </div>
</div>
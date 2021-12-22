<div class="row">
    <div class="col-12">
        <form action="<?php echo base_url("medicine/post");?>" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Data Obat</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="form-group">
                            <label class="form-label">Nama Obat</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-life-buoy"></i>
                                </span>
                                <input name="name" type="text" class="form-control" placeholder="Nama Obat"
                                    value="<?php echo !empty($data[0]) ? $data[0]->medicine_name : "" ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jenis Obat</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-layout"></i>
                                </span>
                                <select name="medicine_type" class="form-control" required>
                                    <option value="" disabled selected hidden>Jenis Obat</option>
                                    <?php
                                if (!empty($medicine_type)) {
                                    for( $i = 0; $i < count($medicine_type); $i++ ) {
                                    echo '<option value = "' . $medicine_type[$i]->reference_id .'"' . (!empty($data[0]) ? $data[0]->medicine_type === $medicine_type[$i]->reference_id ? 'selected="selected"' : '' : '' ) . '>' . $medicine_type[$i]->reference_label . '</option>';
                                    }
                                };?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Harga Obat</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <b>Rp.</b>
                                </span>
                                <input data-mask="000,000,000,000,000.00" name="medicine_price" type="text"
                                    class="form-control" placeholder="Harga Obat"
                                    value="<?php echo !empty($data[0]) ? $data[0]->medicine_price : "" ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Stock Obat</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-folder-plus"></i>
                                </span>
                                <input name="medicine_stock" type="text"
                                    class="form-control" placeholder="Stock Obat"
                                    value="<?php echo !empty($data[0]) ? $data[0]->medicine_stock : "" ?>" required>
                            </div>
                        </div>

                        <input name="flag" type="text" class="form-control" value="<?php echo $flag;?>" hidden>
                        <input name="medicine_id" type="text" class="form-control"
                            value="<?php echo !empty($data[0]) ? $data[0]->medicine_id : "";?>" hidden>
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
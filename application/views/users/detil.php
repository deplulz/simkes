<div class="row">
    <div class="col-12">
        <form action="<?php echo base_url("user/post");?>" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <div class="form-group">
                            <label class="form-label">Nama Pengguna</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-user"></i>
                                </span>
                                <input name="name" type="text" class="form-control" placeholder="Nama Pengguna" value="<?php echo !empty($data[0]) ? $data[0]->user_name : "" ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Level Pengguna</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-user-check"></i>
                                </span>
                                <select name="role" class="form-control" onchange="document.getElementById('role_text').value=this.options[this.selectedIndex].text" required>
                                    <option value="" disabled selected hidden>Level Pengguna</option>
                                    <?php
                                if (!empty($role)) {
                                    for( $i = 0; $i < count($role); $i++ ) {
                                    echo '<option value = "' . $role[$i]->role_id .'"' . (!empty($data[0]) ? $data[0]->user_role_id === $role[$i]->role_id ? 'selected="selected"' : '' : '' ) . '>' . $role[$i]->role_name . '</option>';
                                    }
                                };?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Kata Sandi</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="fe fe-map"></i>
                                </span>
                                <input name="password" type="password" class="form-control" placeholder="Kata Sandi" <?php echo $flag === 'add' ? "required" : "";?>> 
                            </div>
                        </div>

                        <input name="flag" type="text" class="form-control" value="<?php echo $flag;?>" hidden readonly>
                        <input name="role_text" id="role_text" type="text" class="form-control" value="" hidden readonly>
                        <input name="user_id" id="user_id" type="text" class="form-control" value="<?php echo !empty($data[0]) ? $data[0]->user_id : "" ?>" hidden readonly>
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
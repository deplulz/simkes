<div class="page-main">
    <div class="header py-4">
        <div class="container">
            <div class="d-flex">
                <a class="header-brand" href="./index.html">
                    <img src="<?php echo base_url('assets/images/icons/icons.svg');?>" class="header-brand-img" alt="tabler logo">
                    Klinik Medica
                </a>
                <div class="d-flex order-lg-2 ml-auto">
                    <div class="dropdown">
                        <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                            <span class="avatar" style="background-image: url(<?php echo base_url('assets/images/users/18.jpg')?>)"></span>
                            <span class="ml-2 d-none d-lg-block">
                                <span class="text-default"><?php echo ucfirst($_SESSION['admin']['username']);?></span>
                                <small
                                    class="text-muted d-block mt-1"><?php echo ucfirst($_SESSION['admin']['user_role']);?></small>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="<?php echo base_url('logout');?>">
                                <i class="dropdown-icon fe fe-log-out"></i> Sign out
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                    data-target="#headerMenuCollapse">
                    <span class="header-toggler-icon"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg order-lg-first">
                    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>"
                                class="nav-link <?php echo $menu === "dashboard" ? "active" : ""?>"><i
                                    class="fe fe-home"></i>
                                Home</a>
                        </li>
                        <?php if ($_SESSION['admin']['user_role'] === "RESEPSIONIS") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('reservation');?>"
                                class="nav-link <?php echo $menu === "reservation" ? "active" : ""?>"><i
                                    class="fe fe-clipboard"></i>
                                Reservasi</a>
                        </li>
                        <?}?>
                        <?php if ($_SESSION['admin']['user_role'] === "DOKTER") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('examination');?>"
                                class="nav-link <?php echo $menu === "examinations" ? "active" : ""?>"><i
                                    class="fe fe-activity"></i>
                                Examination</a>
                        </li>
                        <?}?>
                        <?php if ($_SESSION['admin']['user_role'] === "APOTEKER") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('recipe');?>"
                                class="nav-link <?php echo $menu === "recipe" ? "active" : ""?>"><i
                                    class="fe fe-file-text"></i>
                                Recipe</a>
                        </li>
                        <?}?>
                        <?php if (($_SESSION['admin']['user_role'] === "RESEPSIONIS") || ($_SESSION['admin']['user_role'] === "ADMIN")) {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('patient');?>"
                                class="nav-link <?php echo $menu === "patients" ? "active" : ""?>"><i
                                    class="fe fe-credit-card"></i> Patients</a>
                        </li>
                        <?}?>
                        <?php if ($_SESSION['admin']['user_role'] === "ADMIN") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('medicine');?>"
                                class="nav-link <?php echo $menu === "medicines" ? "active" : ""?>"><i
                                    class="fe fe-layout"></i>
                                Medicine</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('user');?>"
                                class="nav-link <?php echo $menu === "users" ? "active" : ""?>"><i
                                    class="fe fe-user"></i>
                                User</a>
                        </li>
                        <?}?>
                        <?php if ($_SESSION['admin']['user_role'] === "ADMIN") {?>
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link <?php echo $menu === "report" ? "active" : ""?>" data-toggle="dropdown">
                                <i class="fe fe-sidebar"></i> Report
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow">
                                <a href="<?php echo base_url('report_consulting');?>" class="dropdown-item">Doctor Consultation</a>
                                <a href="<?php echo base_url('report_medicine');?>" class="dropdown-item ">Medicine Selling</a>
                            </div>
                        </li>
                        <?}?>
                        <li class="nav-item">
                            <a href="<?php echo base_url("developer");?>"
                                class="nav-link <?php echo $menu === "developer" ? "active" : ""?>"><i
                                    class="fe fe-user-check"></i>
                                 Developer Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
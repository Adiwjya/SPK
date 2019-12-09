<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PRAMEDIA">
        <title>SPK Smartphone Xiaomi</title>
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>app-assets/css/vendors.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/extensions/unslider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/weather-icons/climacons.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/fonts/meteocons/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/charts/morris.css">
        <!-- END VENDOR CSS-->
        <!-- BEGIN STACK CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/app.css">
        <!-- END STACK CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/fonts/simple-line-icons/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/pages/timeline.css">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
        <!-- END Custom CSS-->
        <!-- JQUERY -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.3.js"></script>
        <!-- Tanggal -->
        <link href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">        
        
        <script type="text/javascript">
            
            function back(){
                window.history.back();
            }
            
            function hanyaAngka(e, decimal) {
                var key;
                var keychar;
                if (window.event) {
                    key = window.event.keyCode;
                } else if (e) {
                    key = e.which;
                } else {
                    return true;
                }
                keychar = String.fromCharCode(key);
                if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
                    return true;
                } else if ((("0123456789").indexOf(keychar) > -1)) {
                    return true;
                } else if (decimal && (keychar == ".")) {
                    return true;
                } else {
                    return false;
                }
            }
            
            function batas_angka(input, max) {
                if (input.value < 0){ input.value = 0;}
                if (input.value > parseInt(max)) {input.value = parseInt(max);}
            }
        </script>
    </head>
    <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        <!-- fixed-top-->
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content" style="margin-left:0px;">
                    <div class="collapse navbar-collapse" id="navbar-mobile">
                        <ul class="nav navbar-nav mr-auto float-left">
                            <li class="dropdown nav-item mega-dropdown mr-2"><a class=" nav-link" href="<?php echo base_url(); ?>home">SPK Smartphone Xiaomi</a>
                                
                            </li>
                            <li class="dropdown nav-item mega-dropdown ml-2 mr-2" ><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Master</a>
                                <ul class="mega-dropdown-menu dropdown-menu row">
                                   
                                    <li class="col-md-2 pb-2 pt-2">
                                        <a href="<?php echo base_url(); ?>barang">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"> Data Barang</h6>
                                        </a>
                                    </li>
                                    <li class="col-md-2 pb-2 pt-2">
                                        <a href="<?php echo base_url(); ?>kriteria">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"> Data Kriteria</h6>
                                        </a>
                                    </li>
                                    <li class="col-md-2 pb-2 pt-2">
                                        <a href="<?php echo base_url(); ?>alternatif">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"> Data Alternatif</h6>
                                        </a>
                                    </li>
                
                                </ul>
                                
                            </li>
                            <li class="dropdown nav-item mega-dropdown ml-2 mr-2"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Analytical Hierarchy Process</a>
                                <ul class="mega-dropdown-menu dropdown-menu row">
                                   
                                    <li class="col-md-2 pb-2 pt-2">
                                        <a href="<?php echo base_url(); ?>nkriteria">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"> Nilai Kriteria</h6>
                                        </a>
                                    </li>
                                    <li class="col-md-2 pb-2 pt-2">
                                        <a href="<?php echo base_url(); ?>nalternatif">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"> Nilai Alternatif</h6>
                                        </a>
                                    </li>
                                    <li class="col-md-2 pb-2 pt-2">
                                        <a href="<?php echo base_url(); ?>">
                                        <h6 class="dropdown-menu-header text-uppercase mb-1"> Hasil Alternatif</h6>
                                        </a>
                                    </li>
                
                                </ul>
                            </li>
                            
                            
                        </ul>
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown dropdown-user nav-item">
                            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="<?php echo base_url(); ?>home/logout"><i class="ficon ft-power"></i></a></li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
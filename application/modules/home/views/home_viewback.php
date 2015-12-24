<?php $this->load->view('../../includes/header_view'); ?>
<div id="app">
    <!-- sidebar -->
    <?php $this->load->view('../../includes/sidebar_view'); ?>
    <?php $this->load->view('../../includes/navbar_header_view') ?>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Selamat Datang di Aplikasi Database Perizinan BPPT Kota Bekasi</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <div id="tabs">
                    <ul class="nav-tabs btn-group">
                        <li class="btn btn-default"><a href="#tabs-1">Notifikasi</a></li>
                        <li class="btn btn-default"><a href="#tabs-2">Monitoring Perizinan</a></li>
                    </ul>
                    <div id="tabs-1" class="tabs-content">
                        <table class="table table-striped table-hover" id="sample-table-2">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th>Waktu</th>
                                    <th class="hidden-xs">Tanggal</th>
                                    <th class="hidden-xs">Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">1.</td>
                                    <td>Kemarin</td>
                                    <td class="hidden-xs">20-09-2015</td>
                                    <td class="hidden-xs">Surat masuk butuh didisposisi</td>
                                </tr>
                                <tr>
                                    <td class="center">2.</td>
                                    <td>2 hari yang lalu</td>
                                    <td class="hidden-xs">19-09-2015</td>
                                    <td class="hidden-xs">Izin reklame telah disetujui</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="tabs-2" class="tabs-content">

                    </div>
                </div>
            </div>
            <!-- end: PAGE TITLE -->
            <!-- start: YOUR CONTENT HERE -->
            <!-- end: YOUR CONTENT HERE -->
        </div>
    </div>
</div>
<!-- start: FOOTER -->
<?php $this->load->view('../../includes/footer_view') ?>
<!-- end: FOOTER -->
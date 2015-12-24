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
                        <h1 class="mainTitle">Surat Lainya</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Persuratan</a></li>
                    <li><a href="#">Surat Lainya</a></li>
                </ol>
                <a class="btn btn-blue pull-right" href="#">Tambah Surat Lainya</a>
                <table class="table table-striped table-hover" id="sample-table-2">
                    <thead>
                        <tr>
                            <th class="center">No.</th>
                            <th>Tanggal</th>
                            <th class="hidden-xs">Nomor Surat</th>
                            <th class="hidden-xs">Dari</th>
                            <th class="hidden-xs">Kepada</th>
                            <th class="hidden-xs">Jenis</th>
                            <th class="hidden-xs">Perihal</th>
                            <th class="hidden-xs">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="center">1</th>
                            <th>20-09-2015 (Kemarin)</th>
                            <th class="hidden-xs">011/IX/BPPT/2015</th>
                            <th class="hidden-xs">PT Maju Jaya</th>
                            <th class="hidden-xs">Surat Keterangan</th>
                            <th class="hidden-xs">Kepala Badan BPPT</th>
                            <th class="hidden-xs">Surat Permohonan</th>
                            <th><a href="#">Baca</a></th>
                        </tr>
                    </tbody>
                </table>
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
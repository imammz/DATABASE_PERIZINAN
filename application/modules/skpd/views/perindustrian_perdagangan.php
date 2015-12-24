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
                        <h1 class="mainTitle">Dinas Perindustrian & Perdagangan</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="<?php echo PATH_ASSETS; ?>skpd">SKPD</a></li>
                    <li><a href="<?php echo PATH_ASSETS; ?>skpd">Dinas Perindustrian & Perdagangan</a></li>
                </ol>
                <table class="table table-striped table-hover" id="sample-table-2">
                    <thead>
                    <tr>
                        <th class="center">No.</th>
                        <th>Pemohon</th>
                        <th class="hidden-xs">Tanggal</th>
                        <th class="hidden-xs">Jenis Izin</th>
                        <th class="hidden-xs">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td align="center">1</td>
                        <td>Raisa</td>
                        <td>12 Juni 2015</td>
                        <td>IMB</td>
                        <td><a class="show-modal" href="<?php echo PATH_ASSETS; ?>assets/ajax/form.php">view</a></td>
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

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
                        <h1 class="mainTitle">Surat Masuk</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Persuratan</a></li>
                    <li><a href="#">Surat Masuk</a></li>
                </ol>
                <div class="btn-group" role="group" style="margin-bottom: 30px">
                    <a href="<?php echo PATH_ASSETS; ?>persuratan/surat_masuk" class="btn btn-default">Daftar Surat Masuk</a>
                    <a href="<?php echo PATH_ASSETS; ?>persuratan/surat_masuk_2" class="btn btn-default active">Disposisi Surat Masuk</a>
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
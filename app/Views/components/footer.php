            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date = date('Y', strtotime('now'));
                        ?>
                        <span>Copyright &copy; <?= $date; ?> <strong>SMP Yanuri</strong></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>


            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('js/jquery.js'); ?>"></script>
            <script src="<?= base_url('js/jqueryDataTables.js'); ?>"></script>
            <script src="<?= base_url('js/dataTablesBs.js'); ?>"></script>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#dataTable2').DataTable();
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#dataTable3').DataTable();
                });
            </script>
            <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>



            </body>

            </html>
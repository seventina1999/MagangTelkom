<!-- Footer -->

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script type="text/javascript">
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["WHOLESALE ACCESS NETWORK & WIFI", "GOVERNMENT SERVICE", "SHARED SERVICE HC & FINANCE", "CONSUMER SERVICE", "ENTERPRISE SERVICE",
            "ACCESS & SERVICE OPERATION", "ACCESS OPTIMA & CONSTRUCTION SPV", "CUSTOMER CARE", "BUSINESS SERVICE", "LOGISTIK & GENERAL SUPPORT",
            "ACCESS DATA MANAGEMENT", "NETWORK AREA & IS OPERATION", "DIGITAL SERVICE & WIFI"
        ],
        datasets: [{
            data: [
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 3 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 4 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 5 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 6 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 7 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 8 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 9 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 10 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 11 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 12 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 13 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 14 and user.role = 'User'")->num_rows(); ?>,
            <?php echo $this->db->query("SELECT id_divisi FROM user WHERE id_divisi= 15 and user.role = 'User'")->num_rows(); ?>],
            backgroundColor: ['#dc3545', '#198754', '#0dcaf0', '#6c757d', '#ffc107', '#d63384', '#006400', '#8A2BE2', '#0000FF', '#F08080', '#fd7e14', '#9ACD32', '#FF0000'],
            hoverBackgroundColor: ['#dc3545', '#198754', '#0dcaf0', '#6c757d', '#ffc107', '#d63384', '#006400', '#8A2BE2', '#0000FF', '#F08080', '#fd7e14', '#9ACD32', '#FF0000'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
</script>

</body>

</html>
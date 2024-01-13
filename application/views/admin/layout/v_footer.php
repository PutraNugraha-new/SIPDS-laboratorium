</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ali Kusuma 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>public/dashboard/js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="<?= base_url() ?>public/dashboard/assets/demo/chart-area-demo.js"></script>
        <script src="<?= base_url() ?>public/dashboard/assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>public/dashboard/js/datatables-simple-demo.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="<?= base_url() ?>/public/extensions/jquery/jquery.min.js"></script>

        <script>
        const ctx = document.getElementById('myChart');
        const ctxx = document.getElementById('myBarChart');
        const chartData = <?php echo json_encode($chartSampel); ?>;

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.map(data => data.jenis_sampel),
                datasets: [{
                    label: 'Data Sampel',
                    data: chartData.map(data => data.jumlah_sampel),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(ctxx, {
            type: 'line',
            data: {
                labels: chartData.map(data => data.jenis_sampel),
                datasets: [{
                    label: 'Data Sampel',
                    data: chartData.map(data => data.jumlah_sampel),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </body>
</html>
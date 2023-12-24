<!-- Thêm liên kết đến thư viện Chart.js từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    main {
        padding: 20px;
    }

    canvas {
        max-width: 1000px;
        margin: 20px auto;
    }
</style>

<main>
    <!-- Thêm một thẻ canvas để vẽ biểu đồ -->
    <canvas id="orderChart" width="800" height="300"></canvas>
</main>

<script>
    // Chuyển dữ liệu từ PHP thành JavaScript
    var js_allTK = <?php echo json_encode($allTK); ?>;
    // Khởi tạo mảng labels
    var labels = [];
    var huy = [];
    var donhang = [];
    var danggiao = [];
    var dagiao = [];
    var tong = [];
    // Duyệt qua mảng js_allTK và thêm dữ liệu vào mảng labels
    js_allTK.forEach(element => {
        labels.push(element.ten_danh_muc);
        huy.push(element.huy);
        donhang.push(element.doi_giao);
        danggiao.push(element.dang_giao);
        dagiao.push(element.da_giao);
        tong.push(element.tong);
    });

    // In ra mảng labels để kiểm tra
    console.log(labels);

    // Mã JavaScript để vẽ biểu đồ sử dụng Chart.js
    document.addEventListener('DOMContentLoaded', function() {
        // Dữ liệu biểu đồ (đơn giảm đơn tăng, chỉ là ví dụ)
        var data = {
            labels,
            datasets: [{
                label: 'Đơn hàng',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: tong,
            }, {
                label: 'Đợi duyệt',
                backgroundColor: 'rgba(0, 0, 0, 0.2)',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1,
                data: donhang,
            }, {
                label: 'Đang giao',
                backgroundColor: 'rgba(255, 205, 86, 0.2)',
                borderColor: 'rgba(255, 205, 86, 1)',
                borderWidth: 1,
                data: danggiao,
            }, {
                label: 'Đã giao',
                backgroundColor: 'rgba(0, 128, 0, 0.2)',
                borderColor: 'rgba(0, 128, 0, 1)',
                borderWidth: 1,
                data: dagiao,
            }, {
                label: 'Đã hủy',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: huy,
            }, ],

        };

        // Lấy thẻ canvas và context
        var canvas = document.getElementById('orderChart');
        var ctx = canvas.getContext('2d');

        // Tạo và cấu hình biểu đồ thanh
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<?php 
    include 'koneksi.php';
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                            <li class="breadcrumb-item active">Welcome Back</li>
                        </ol>
                        <div style="width: 800px;margin: 0px auto;">
    <canvas id="myChart"></canvas>
</div>
<?php 
    $judul= "";
        $jumlah=null;

        $sql="SELECT pelatihan.judul, COUNT(*) AS total FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan GROUP BY pelatihan.id_pelatihan";

    $hasil=mysqli_query($koneksi,$sql);

    while ($data = mysqli_fetch_array($hasil)) {
        $jud=$data['judul'];
        $judul .= "'$jud'". ", ";

        $jum=$data['total'];
        $jumlah .= "$jum". ", ";
    }
 ?>
        <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?php echo $judul; ?>],
            datasets: [{
                label:'Data Pelatihan',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah; ?>]
            },
            ]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>                </div>
            </main>
    </div>
</div>
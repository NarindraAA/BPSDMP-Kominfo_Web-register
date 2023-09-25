<?php  $koneksi = mysqli_connect("localhost", "root", "", "pelatihankominfo"); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        	<main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Send Email</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                            <li class="breadcrumb-item active">Kirimkan Email</li>
                    	</ol>
            <center>
            <form action="views/sendmail.php" method="POST" class="msg_container">
            <h4>Compose Email</h4>
            <p id="multi-responce"></p>
             <div class="form-group">
                            <!-- <label for="pelatihan">Pelatihan :</label> -->
                            
                                <select class="form-select mb-2  " aria-label=".form-select-lg example" name="pelatihan" id="pelatihan">
                                    <option value="0">Pilih Pelatihan</option>
                                    <?php
                                        $query_pelatihan = mysqli_query($koneksi, "SELECT pelatihan.id_pelatihan,pelatihan.judul,COUNT(*) AS total FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan GROUP BY pelatihan.id_pelatihan");
                                        while($a= mysqli_fetch_array($query_pelatihan))
                                        {
                                    ?>
                                    <option value="<?php echo $a['id_pelatihan']?>"><?php echo $a['judul'];?> (<?php echo $a['total']?> Peserta)</option>
                                    <?php 
                                        }
                                     ?>
                                </select>
                               
                           
                        </div>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="floatingInput" name="subjek" placeholder="name@example.com">
                <label for="floatingInput">Subjek</label>
            </div>            
            <div class="form-floating mb-2">
            <textarea class="form-control" placeholder="Leave a comment here" id="mytextarea" name="pesan" style="height: 300px"></textarea>
            <label for="floatingTextarea2">Pesan</label>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-lg col-lg-12" id="submit">Send Now </button>

        </form>
        </center>
                </div>
            </main>
    </div>
</div>
<!--== SlideshowBg Area Start ==-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <br><br><br>
        </div>
    </div>
</div>
<!--== SlideshowBg Area End ==-->

<!--== Mobile App Area Start ==-->
<div id="mobileapp-video-bg"></div><br>
<section id="mobile-app-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <div class="mobile-app-content">
                    <?php if ($this->session->userdata('nama')) { ?>
                        <h2>SEWA ALAT BERAT</h2>
                        <p>PLEASE CHOOSE A CAR TO RENT</p>
                        <div class="app-btns">
                            <a href="<?php echo base_url('customer/data_alat_berat') ?>" class="ntn btn-sm btn-primary"> ALAT BERAT</a>

                        </div>
                    <?php } else { ?>
                        <h2>SEWA ALAT BERAT</h2>
                        <p>PLEASE LOGIN FIRST TO RENT OUR CARS</p>
                        <div class="app-btns">
                            <a href="<?php echo base_url('Auth/login') ?>" class="ntn btn-sm btn-primary"><i class=""></i> LOGIN</a>
                            <a href="<?php echo base_url('Register') ?>" class="ntn btn-sm btn-primary"><i class=""></i> REGISTER</a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>



<section id="mobile-app-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-app-content">
                    <h5>Pemberitahuan</h5><br>
                    <table class="table table-sm table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Alat Berat</th>
                                <th scope="col">Tanggal pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Pembayaran</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($notification as $key => $data) { ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data['merk'] ?></td>
                                    <td><?= $data['tanggal_sewa'] ?></td>
                                    <td><?= $data['tanggal_kembali'] ?></td>
                                    <td>
                                        <?php
                                        if ($data['status_pembayaran'] == 1) {
                                            echo 'Pembayaran selesai';
                                        } else {
                                            echo 'Belum di bayar';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $currentDate = date('Y-m-d');
                                        if ($data['status_pembayaran'] == 1 && $currentDate > $data['tanggal_kembali']) {
                                            echo 'Telat';
                                        } else if ($data['status_pembayaran'] == 1 && $currentDate < $data['tanggal_kembali']) {
                                            echo 'Sedang dipinjam';
                                        } else {
                                           echo '-';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
<br>
<!--== Mobile App Area End ==-->
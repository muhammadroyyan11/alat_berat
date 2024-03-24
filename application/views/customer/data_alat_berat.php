
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>ALAT BERAT TERJAMIN</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Penyewaan Alat Berat dengan kondisi baik dan siap digunakan bebas kendala untuk membantu pekerjaan anda.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <?php echo $this->session->flashdata('pesan')?>

            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                            <!-- Single Car Start -->
                            <?php foreach ($alat_berat as $ab) : ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                <img src="<?php echo base_url('assets/upload/'.$ab->gambar)?>" style = "width: 550px; height: 300px" alt="">
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#"><?php echo $ab->merk ?></a></h2>
                                        <h5>Rp. <?php echo number_format($ab->harga,0,',',',')  ?>/Hari</h5>
                                        <ul class="car-info-list">
                                            <li><?php
                                                    if ($ab->operator == "1"){
                                                        echo "<i class='fa fa-check-square text-success'></i>";
                                                    }else{
                                                        echo "<i class='fa fa-times-circle text-danger'></i>";
                                                    }
                                                ?>Operator</li>
                                            <li><?php
                                                    if ($ab->BBM == "1"){
                                                        echo "<i class='fa fa-check-square text-success'></i>";
                                                    }else{
                                                        echo "<i class='fa fa-times-circle text-danger'></i>";
                                                    }
                                                ?>Bahan Bakar</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                        <?php if($ab->status == "1"){
                                            echo anchor('customer/rental/tambah_rental/'.$ab->id_alat_berat,'<span class="rent-btn">Sewa</span>');
                                        }else{ 
                                            echo "<span class='rent-btn'>Tidak Tersedia</span>";
                                        } ?>
                                        
                                        <a href="<?php echo base_url('customer/data_alat_berat/detail_alat_berat/'.$ab->id_alat_berat)?>" class="rent-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- Single Car End -->
                        </div>
                    </div>
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

    
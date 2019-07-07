<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Sistem Informasi SPI  Online</title>
    <!-- main css -->
    <link rel="stylesheet" href="css/welcome.css" />
  </head>


<?php $__env->startSection('content'); ?>
 <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                    Selamat datang
                </p>
                <h2>
                    SISTEM INFORMASI SPI ONLINE <br> <h3>Depot LPG Tanjung Perak</h3>
                </h2>
                
                <div>
                    <div class="container " style="margin-top: 50px">
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-3">
                                <a class="nav-link primary-btn" href="<?php echo e(route('login')); ?>"><h3>LOGIN</h3></a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KP\resources\views/welcome.blade.php ENDPATH**/ ?>
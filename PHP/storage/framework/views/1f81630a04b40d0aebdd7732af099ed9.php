<?php
    $total = 0;

    if (isset($selectedServices)) {
        if (is_array($selectedServices)) {
            foreach ( $selectedServices as $selectedServiceName => $selectedServicePrice) {
                $total += $selectedServicePrice;
            }
        } else {
            $total = $selectedServicePrice;
        }
    }
?>



<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <!-- Styles -->
        <style>
            .btn-info {
                font-family: Raleway-SemiBold;
                font-size: 20px;
                color: rgba(91, 192, 222, 0.75);
                letter-spacing: 1px;
                line-height: 15px;
                border: 2px solid rgba(91, 192, 222, 0.75);
                border-radius: 40px;
                background: transparent;
                transition: all 0.3s ease 0s;
                margin-right: 1rem;
                margin-top: 0.5rem;
            }

            .btn-info:hover {
                color: #FFF;
                background: rgba(72, 156, 182, 0.75);
                border: 2px solid rgba(91, 192, 222, 0.75);
            }

            .btn-success {
                font-family: Raleway-SemiBold;
                font-size: 20px;
                color: rgba(28, 159, 34, 0.75);
                letter-spacing: 1px;
                line-height: 15px;
                border: 2px solid rgba(22, 138, 28, 0.75);
                border-radius: 40px;
                background: transparent;
                transition: all 0.3s ease 0s;
                margin-right: 1rem;
                margin-top: 0.5rem;
            }

            .btn-success:hover {
                color: #FFF;
                background: rgba(47, 118, 23, 0.75);
                border: 2px solid rgba(47, 118, 23, 0.75);
            }

            .services {
                font-family: Raleway-SemiBold;
                font-weight: bold;
                font-size: 1.2rem;
            }

            .desc {
                font-family: Raleway-SemiBold;
                color: gray;
                font-size: 1rem;
            }

            .price {
                font-family: Raleway-SemiBold;
                font-weight: bold;
                font-size: 1.1rem;
            }

            input.card {
                color: inherit;
                text-decoration: inherit;
                margin-bottom: 0.7rem;
                text-align: start;
                width: 25rem;
            }

            .card {
                width: 25rem;
            }

            .btn {
                border-color: aqua;
            }

        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg" style="background-color: #b5a15e;">
            <div class="d-flex justify-content-start" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Women</a>
                    </li>
                    <span class="navbar-text">
                    |
                    </span>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Men</a>
                    </li>
                </ul>
            </div>

            <div class="container-fluid d-flex justify-content-center">
              <a class="navbar-brand" href="#">Gentlemen's Groomery</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>

            <div class="d-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Cart</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div>
                        <h1 style="font-weight: bold; font-size:2.5rem; padding-bottom:1rem; padding-top:1rem; font-family: Raleway-SemiBold; text-align:center">Select services</h1>
                    </div>
                    <div style="margin-bottom: 2rem; text-align:center">
                        <a href="#/Featured"  class="btn btn-info">Featured</a>
                        <a href="#/Haircut" class="btn btn-info">Haircut</a>
                        <a href="#/Beard" class="btn btn-info">Beard</a>
                        <a href="#/Wellbeing" class="btn btn-info">Wellbeing</a>
                    </div>
                    <form method="POST" action="<?php echo e(url('/services')); ?>">
                        <?php echo csrf_field(); ?>
                        <div style="margin-bottom: 1.5rem">
                            <h1 id="/Featured" style="font-weight: bold; font-size:1.5rem; padding-bottom:1rem; padding-top:1rem; font-family: Raleway-SemiBold;">Featured</h1>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <?php $__currentLoopData = $services->where('group', 'Featured'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card" style="margin-bottom: 0.7rem">
                                    <div class="card-body">
                                        <h3 class="services"><?php echo e($service->name); ?></h3>
                                        <p class="desc"><?php echo e($service->time); ?>min</p>
                                        <p class="desc"><?php echo e($service->desc); ?></p>
                                        <br>
                                        <h4 class="price"><?php echo e($service->price); ?> SEK</h4>
                                        <input type="checkbox" class="card services btn" id="inputField" value="<?php echo e($service->name); ?>" name="serviceName[]"
                                            <?php if($selectedServices != ""): ?>
                                                <?php $__currentLoopData = $selectedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedServiceName => $selectedServicePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($service->name == $selectedServiceName ): ?> checked
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div style="margin-bottom: 1.5rem">
                            <h1 id="/Haircut" style="font-weight: bold; font-size:1.5rem; padding-bottom:1rem; padding-top:1rem; font-family: Raleway-SemiBold;">Haircut</h1>
                            <?php $__currentLoopData = $services->where('group', 'Haircut'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card" style="margin-bottom: 0.7rem">
                                <div class="card-body">
                                    <h3 class="services"><?php echo e($service->name); ?></h3>
                                    <p class="desc"><?php echo e($service->time); ?>min</p>
                                    <p class="desc"><?php echo e($service->desc); ?></p>
                                    <br>
                                    <h4 class="price"><?php echo e($service->price); ?> SEK</h4>
                                    <input type="checkbox" class="card services btn" id="inputField" value="<?php echo e($service->name); ?>" name="serviceName[]"
                                        <?php if($selectedServices != ""): ?>
                                            <?php $__currentLoopData = $selectedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedServiceName => $selectedServicePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($service->name == $selectedServiceName ): ?> checked
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div style="margin-bottom: 1.5rem">
                            <h1 id="/Beard" style="font-weight: bold; font-size:1.5rem; padding-bottom:1rem; padding-top:1rem; font-family: Raleway-SemiBold;">Beard</h1>
                            <?php $__currentLoopData = $services->where('group', 'Beard'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card" style="margin-bottom: 0.7rem">
                                <div class="card-body">
                                    <h3 class="services"><?php echo e($service->name); ?></h3>
                                    <p class="desc"><?php echo e($service->time); ?>min</p>
                                    <p class="desc"><?php echo e($service->desc); ?></p>
                                    <br>
                                    <h4 class="price"><?php echo e($service->price); ?> SEK</h4>
                                    <input type="checkbox" class="card services btn" id="inputField" value="<?php echo e($service->name); ?>" name="serviceName[]"
                                        <?php if($selectedServices != ""): ?>
                                            <?php $__currentLoopData = $selectedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedServiceName => $selectedServicePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($service->name == $selectedServiceName ): ?> checked
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div style="margin-bottom: 1.5rem">
                            <h1 id="/Wellbeing" style="font-weight: bold; font-size:1.5rem; padding-bottom:1rem; padding-top:1rem; font-family: Raleway-SemiBold;">Wellbeing</h1>
                            <?php $__currentLoopData = $services->where('group', 'Wellbeing'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card" style="margin-bottom: 0.7rem">
                                <div class="card-body">
                                    <h3 class="services"><?php echo e($service->name); ?></h3>
                                    <p class="desc"><?php echo e($service->time); ?>min</p>
                                    <p class="desc"><?php echo e($service->desc); ?></p>
                                    <br>
                                    <h4 class="price"><?php echo e($service->price); ?> SEK</h4>
                                    <input type="checkbox" class="card services btn" id="inputField" value="<?php echo e($service->name); ?>" name="serviceName[]"
                                        <?php if($selectedServices != ""): ?>
                                            <?php $__currentLoopData = $selectedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedServiceName => $selectedServicePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($service->name == $selectedServiceName ): ?> checked
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div style="text-align: center">
                            <button class="btn btn-success" type="submit" id="finalize">Finalize cart</button>
                        </div>
                    </form>


                </div>
                <div class="col" style="margin-top: 9rem; margin-bottom: 7rem">
                    <h1 id="/Featured" style="margin-left: 2rem; font-weight: bold; font-size:1.5rem; padding-bottom:1rem; padding-top:1rem; font-family: Raleway-SemiBold;">Cart</h1>
                    <div class="card" style="margin-left: 2rem; height:100%">
                        <div id="cartDiv" class="card-body">
                            <?php if($selectedServices != ""): ?>
                                <?php $__currentLoopData = $selectedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedServiceName => $selectedServicePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="services"> <?php echo e($selectedServiceName); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="desc">No services selected</p>
                            <?php endif; ?>
                            <hr style="margin-bottom: 1rem; margin-top: 1rem">
                            <?php if($selectedServices != ""): ?>
                                <h3 class="services">Total:  <?php echo e($total); ?> SEK</h3>
                            <?php else: ?>
                                <h3 class="services">Total:  Free</h3>
                            <?php endif; ?>

                        </div>
                      </div>
                </div>
                <div class="col"></div>
            </div>
        </div>


        <!-- Footer -->
        <div style="padding-top: 1%">
            <section class="">
            <footer class="text-center text-white" style="background-color: #b5a15e;">
              <div class="container p-4 pb-0">
              </div>
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              </div>
            </footer>
          </section>
        </div>
    </body>
</html>
<?php /**PATH /Users/antoine/Documents/Coding/SustainablePrograming/Examination1/GroupWork/PHP/resources/views//services.blade.php ENDPATH**/ ?>
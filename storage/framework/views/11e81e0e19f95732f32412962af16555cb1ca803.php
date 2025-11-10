<?php
    $subscribe_content = getContent('subscribe.content', true);
    $footer_content = getContent('footer.content', true);
    $contact = getContent('contact.content', true);
    $social_icons = getContent('social_icon.element', false, null, true);
    $policy_pages = getContent('policy_pages.element', false, null, true);
?>
<!-- Footer Section -->

  <div class="newsletter-section">
            <div class="newsletter-wrapper">
                <div class="footer-logo">
                    <a href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(getImage(imagePath()['logoIcon']['path'].'/logo.png')); ?>" alt="logo" style="width:100px;">
                    </a>
                </div>
                <div class="newsletter-title">
                    <div class="section__header border-0">
                        <h4 class="section__title mb-0"><?php echo app('translator')->get('Newsletter'); ?> <span class="text--base"><?php echo app('translator')->get('Subscription'); ?></span></h4>
                        <p><?php echo e(__(@$subscribe_content->data_values->content)); ?></p>
                    </div>
                </div>
                <div class="newsletter-form">
                    <form action="<?php echo e(route('subscribe')); ?>" id="subscribeForm" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <input name="email" type="email" class="form-control form--control subscribe_email" placeholder="<?php echo app('translator')->get('Enter your email address'); ?>"/>
                            <button type="submit" class="input-group-text cmn--btn"><?php echo app('translator')->get('Subscribe'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!-- footer area -->
    <footer class="footer-area">

        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-120 pb-70">
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-widget-box about-us">
                            <h4 class="footer-widget-title"><?php echo app('translator')->get('About'); ?> <?php echo app('translator')->get($general->sitename); ?></h4>
                    <p><?php echo e(__(@$footer_content->data_values->content)); ?></p>
                    <ul class="social-icons">

                          <?php $__empty_1 = true; $__currentLoopData = $social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e($item->data_values->url); ?>" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    <?php echo @$item->data_values->social_icon ?>
                                </a>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>

                    </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                                  <h4 class="footer-widget-title"><?php echo app('translator')->get('General Links'); ?></h4>
                            <ul class="footer-list">

                                  <li><a href="<?php echo e(route('home')); ?>"><i class="fas fa-caret-right"></i><?php echo app('translator')->get('Home'); ?></a></li>

                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('pages',[$data->slug])); ?>"><i class="fas fa-caret-right"></i><?php echo e(__($data->name)); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <li><a href="<?php echo e(route('vehicles')); ?>"><i class="fas fa-caret-right"></i><?php echo app('translator')->get('Vehicles'); ?></a></li>
                        <li><a href="<?php echo e(route('plans')); ?>"><i class="fas fa-caret-right"></i><?php echo app('translator')->get('Plan'); ?></a></li>
                        <li><a href="<?php echo e(route('blogs')); ?>"><i class="fas fa-caret-right"></i><?php echo app('translator')->get('Blog'); ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Support Center</h4>
                            <ul class="footer-list">
                                  <?php $__empty_1 = true; $__currentLoopData = $policy_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a href="<?php echo e(route('policy.pages', [$policy->id, slug($policy->data_values->title)])); ?>"><i class="fas fa-caret-right"></i> <?php echo e(__(@$policy->data_values->title)); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                         <li><a href="<?php echo e(route('policy.faqs')); ?>"><i class="fas fa-caret-right"></i>Faqs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Get In Touch</h4>
                          
                              <ul class="footer__contact">
                        <li>
                            <div class="icon"><i class="las la-phone-volume"></i></div>
                            <div class="cont">
                                <span class="subtitle"><?php echo app('translator')->get('For Support'); ?></span>
                                <a href="Tel:<?php echo e($contact->data_values->phone); ?>" class="info"><?php echo e($contact->data_values->phone); ?></a>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="las la-headset"></i></div>
                            <div class="cont">
                                <span class="subtitle"><?php echo app('translator')->get('Send Us Email'); ?></span>
                                <a href="mailto:<?php echo e($contact->data_values->email); ?>" class="info"><?php echo e($contact->data_values->email); ?></a>
                            </div>
                        </li>
                    </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            <span id="date"></span> <a href="#"> </a> <?php echo e(__(@$footer_content->data_values->copyright)); ?>

                        </p>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul class="footer-social">
                         
                         <div class="footer__widget widget__about">
                                       <ul class="social-icons">

                          <?php $__empty_1 = true; $__currentLoopData = $social_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e($item->data_values->url); ?>" class="btn btn-secondary btn-md-square rounded-circle me-3">
                                    <?php echo @$item->data_values->social_icon ?>
                                </a>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>

                    </ul>
                </div>
                 </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


<?php /**PATH C:\xampp\htdocs\getz\resources\views/templates/basic/partials/footer.blade.php ENDPATH**/ ?>
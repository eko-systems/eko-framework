<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="<?php echo e(siteUrl()); ?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="32"
                 viewBox="0 0 146.711 46.83">
                <defs>
                    <linearGradient id="linear-gradient" y1="0.5" x2="1" y2="0.5" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#5756a2"/>
                        <stop offset="0.313" stop-color="#5b5aa4"/>
                        <stop offset="0.669" stop-color="#6664ab"/>
                        <stop offset="1" stop-color="#7673b4"/>
                    </linearGradient>
                </defs>
                <g id="Group_2" transform="translate(-911 -48.024)">
                    <g id="socore" transform="translate(911 48.024)">
                        <path id="Path_1"
                              d="M38.752,46,14.2,48.314a9.976,9.976,0,0,1-10.875-9L1.012,14.765a9.978,9.978,0,0,1,9-10.875L34.556,1.572a9.977,9.977,0,0,1,10.875,9l2.318,24.549a9.993,9.993,0,0,1-9,10.879Z"
                              transform="translate(-0.967 -1.528)" fill="url(#linear-gradient)"/>
                        <g id="Group_1" transform="translate(18.576 11.55)">
                            <path id="Path_2"
                                  d="M44.117,49.225h-4.6v-5.2h4.6a2.469,2.469,0,0,0,1.749-4.216l-3.946-3.946A6.072,6.072,0,0,1,46.212,25.5h1.195v5.2h-1.2a.873.873,0,0,0-.617,1.489l3.946,3.946a7.664,7.664,0,0,1-5.42,13.086Z"
                                  transform="translate(-39.52 -25.5)" fill="#fff"/>
                        </g>
                    </g>
                </g>
            </svg>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li>
                <a href="<?php echo e(siteUrl()); ?>" class="nav-link px-2 link-secondary"><?php echo trans("Anasayfa") ?></a>
            </li>
            <li>
                <a href="<?php echo e(siteUrl('about')); ?>" class="nav-link px-2 link-dark"><?php echo trans("Hakkımızda") ?></a>
            </li>
            <li>
                <a href="<?php echo e(siteUrl('contact')); ?>" class="nav-link px-2 link-dark"><?php echo trans("İletişim") ?></a>
            </li>
            <li>
                <a href="<?php echo e(siteUrl('blog')); ?>" class="nav-link px-2 link-dark"><?php echo trans("Blog") ?></a>
            </li>
        </ul>
        <div class="col-md-3 text-end">
            <?php if(auth()->segment->get('user_name')): ?>
                <a href="<?php echo e(siteUrl('auth/profile')); ?>" class="btn btn-outline-primary me-2">[<?php echo e(auth()->segment->get('user_name')); ?>]</a>
            <?php else: ?>
                <a href="<?php echo e(siteUrl('auth/login')); ?>" class="btn btn-outline-primary me-2"><?php echo trans("Giriş Yap") ?></a>
                <a href="<?php echo e(siteUrl('auth/register')); ?>" class="btn btn-primary"><?php echo trans("Kayıt Ol") ?></a>
            <?php endif; ?>
        </div>
    </header>
</div><?php /**PATH /Applications/MAMP/htdocs/eko-freamwork/themes/theme1/view/header.blade.php ENDPATH**/ ?>
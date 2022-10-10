
<?php $__env->startSection('title', 'Profil'); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="container">
            <div class="card-body">
                <a href="javascript: void(0);" class="text-reset text-primary-hover small">hello@gmail.com</a>
                <hr>
                <form method="POST">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger" type="submit" name="logout" value="1">
                        <i class="fad fa-sign-out-alt fa-fw me-2"></i>
                        <span><?php echo trans("Çıkış Yap") ?></span>
                    </button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/eko-freamwork/themes/theme1/view/auth/profile.blade.php ENDPATH**/ ?>
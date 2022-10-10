
<?php $__env->startSection('title', trans('Giriş Yap')); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form method="POST" novalidate class="needs-validation">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="user_name"
                                       class="form-label"><?php echo trans("E-Posta") ?>: </label>
                                <input type="email"
                                       class="form-control"
                                       id="user_name"
                                       name="user_name"
                                       placeholder="<?php echo trans("E-Posta") ?>"
                                       required>
                                <?php if (isset($errors['user_name'])): ?><div class="getValidatorError"><?=$errors['user_name'][0]?></div><?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="user_password"
                                       class="form-label"><?php echo trans("Şifre") ?>:</label>
                                <input type="password"
                                       class="form-control"
                                       id="user_password"
                                       name="user_password"
                                       placeholder="･････････"
                                       required>
                                <?php if (isset($errors['user_password'])): ?><div class="getValidatorError"><?=$errors['user_password'][0]?></div><?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit"
                                    name="login"
                                    value="1"
                                    class="btn btn-success"> <?php echo trans("Giriş Yap") ?> </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/eko-freamwork/themes/theme1/view/auth/login.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Anasayfa'); ?>
<?php $__env->startSection('content'); ?>
    <?php if(auth()->segment->get('user_name')): ?>
        <div class="container">
            <div class="alert alert-success"><?php echo trans("Hoşgeldin") ?>, <b><?php echo e(auth()->segment->get('user_name')); ?></b></div>
        </div>
    <?php endif; ?>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <?php if(auth()->segment->get('user_name')): ?>
                    <div class="col-6">
                        <form method="post" novalidate class="needs-validation" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="contentAdded" value="<?php echo e(auth()->segment->get('user_name')); ?>">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="content-body"
                                               class="form-label"><?php echo trans("İçerik") ?>: </label>
                                        <textarea name="content"
                                                  id="content-body"
                                                  rows="3"
                                                  class="form-control"
                                                  placeholder="<?php echo trans("İçerik") ?>" required></textarea>
                                        <?php if (isset($errors['content'])): ?><div class="getValidatorError"><?=$errors['content'][0]?></div><?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="image" class="form-label"><?php echo trans("Görsel") ?>:</label>
                                        <input type="file" id="image" name="content_image" class="form-control" required>
                                        <?php if (isset($errors['content_image'])): ?><div class="getValidatorError"><?=$errors['content_image'][0]?></div><?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12 text-left">
                                    <button class="btn btn-success"
                                            type="submit"
                                            name="addNewContent"
                                            value="1"> <?php echo trans("Ekle") ?> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="<?php if(auth()->segment->get('user_name')): ?> col-6 <?php else: ?> col-12 <?php endif; ?>">
                    <div class="row">
                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <?php if(isset($item['contentImage'])): ?>
                                        <img src="<?php echo e(siteUrl('upload/' . $item['contentImage'])); ?>" class="card-img-top" alt="...">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($item['contentAdded']); ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo e(carbon()->parse($item['contentDate'])->diffForHumans()); ?></h6>
                                        <p class="card-text"><?php echo e($item['content']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/eko-freamwork/themes/theme1/view/index.blade.php ENDPATH**/ ?>
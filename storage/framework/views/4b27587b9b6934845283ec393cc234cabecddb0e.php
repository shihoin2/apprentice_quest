
<?php $__env->startSection('content'); ?>
<div class="editor-page">
    <div class="container page">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12">
                <ul class="error-messages">
                    <li>That title is required</li>
                </ul>
                <form method="POST" action="<?php echo e(route('conduit.update', ['id'=>$conduit->id])); ?>" >
                    <?php echo csrf_field(); ?>
                    <fieldset>
                        <fieldset class="form-group">
                            <!-- <input type="text" value="<?php echo e($conduit->title); ?>" name="title" class="form-control form-control-lg" placeholder="Article Title" /> -->
                            <input type="text" value="<?php echo e($conduit->title); ?>" name="title" class="form-control form-control-lg"  />
                        </fieldset>

                        <fieldset class="form-group">
                            <!-- <input type="text" name="about" class="form-control" placeholder="What's this article about?" /> -->
                            <input type="text" name="about" class="form-control" value="<?php echo e($conduit->about); ?>" />
                        </fieldset>

                        <fieldset class="form-group">
                            <!-- <textarea name="detail" class="form-control" rows="8" placeholder="Write your article (in markdown)"></textarea> -->
                            <textarea name="detail" class="form-control" rows="8"><?php echo e($conduit->detail); ?></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <!-- <input type="text" name="tag" class="form-control" placeholder="Enter tags" /> -->
                            <input type="text" name="tag" class="form-control" value="<?php echo e($conduit->tag); ?>" />
                            <div class="tag-list">
                                <span class="tag-default tag-pill"> <i class="ion-close-round"></i> tag </span>
                            </div>
                        </fieldset>

                        <button class="btn btn-lg pull-xs-right btn-primary" type="submit">
                            Publish Article
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('conduit.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shihoin2/apprentice/laravel/conduit/resources/views/conduit/editor2.blade.php ENDPATH**/ ?>
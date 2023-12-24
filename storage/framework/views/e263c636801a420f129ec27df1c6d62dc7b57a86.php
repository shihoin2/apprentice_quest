
<?php $__env->startSection('content'); ?>
<div class="editor-page">
    <div class="container page">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12">
                <ul class="error-messages">
                    <li>That title is required</li>
                </ul>

                <form method="POST" action="<?php echo e(route('conduit.store')); ?>" >
                    <?php echo csrf_field(); ?>
                    <fieldset>
                        <fieldset class="form-group">
                            <input type="text" name="title" class="form-control form-control-lg" placeholder="Article Title" />
                        </fieldset>

                        <fieldset class="form-group">
                            <input type="text" name="about" class="form-control" placeholder="What's this article about?" />
                        </fieldset>

                        <fieldset class="form-group">
                            <textarea name="detail" class="form-control" rows="8" placeholder="Write your article (in markdown)"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <input type="text" name="tag" class="form-control" placeholder="Enter tags" />
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

<?php echo $__env->make('conduit.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shihoin2/apprentice/laravel/conduit/resources/views/conduit/editor.blade.php ENDPATH**/ ?>
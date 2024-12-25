<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="post mb-3">
        <h3><?php echo e($post->title); ?></h3>
        <p><?php echo e($post->content); ?></p>
        <p>Author: <?php echo e($post->user->name); ?></p>
        <p>Created at: <?php echo e($post->created_at->format('Y-m-d')); ?></p>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
            <a href="<?php echo e(route('posts.edit', $post)); ?>">Edit</a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">Delete</button>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\JIGS SUTHAR\blog\resources\views/posts/partials/posts.blade.php ENDPATH**/ ?>
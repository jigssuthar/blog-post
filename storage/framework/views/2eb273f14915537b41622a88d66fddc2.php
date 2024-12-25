

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Posts</h2>
        <form method="GET" action="<?php echo e(route('posts.index')); ?>" class="mb-3 d-flex flex-wrap align-items-center">
            <input type="text" name="search" placeholder="Search by title or content" value="<?php echo e(request()->get('search')); ?>" class="form-control mb-2 mr-2" style="max-width: 200px;">
            <input type="date" name="start_date" value="<?php echo e(request()->get('start_date')); ?>" class="form-control mb-2 mr-2" style="max-width: 150px;">
            <input type="date" name="end_date" value="<?php echo e(request()->get('end_date')); ?>" class="form-control mb-2 mr-2" style="max-width: 150px;">
            <select name="author" class="form-control mb-2 mr-2" style="max-width: 200px;">
                <option value="">Select Author</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e(request()->get('author') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Filter</button>
        </form>
        <?php if($posts->isEmpty()): ?>
            <p>No posts found matching the selected filters.</p>
        <?php endif; ?>
        <h3>All Posts</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($post->title); ?></td>
                    <td><?php echo e(\Str::limit($post->content, 100)); ?> <a href="<?php echo e(route('posts.show', $post)); ?>">Read more</a></td>
                    <td><?php echo e($post->user->name); ?></td>
                    <td><img src="<?php echo e(asset('storage/' . $post->image_path)); ?>" width="120px" alt="Post Image">
                    </td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                            <a href="<?php echo e(route('posts.edit', $post)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                            <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            <?php echo e($posts->links('pagination::bootstrap-4')); ?>

        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\JIGS SUTHAR\blog\resources\views/posts/index.blade.php ENDPATH**/ ?>
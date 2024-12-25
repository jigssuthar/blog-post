<nav>
    <ul>
        <li><a href="<?php echo e(route('posts.index')); ?>">Home</a></li>
        <?php if(auth()->guard()->check()): ?>
            <li><a href="<?php echo e(route('posts.create')); ?>">Create Post</a></li>
            <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
        <?php else: ?>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH D:\JIGS SUTHAR\blog\resources\views/partials/navbar.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="text-center mb-4">Doctors Details</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialization</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($doctor['id']); ?></td>
                <td><?php echo e($doctor['name']); ?></td>
                <td><?php echo e($doctor['specialization']); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\health-domain\resources\views/doctors/index.blade.php ENDPATH**/ ?>
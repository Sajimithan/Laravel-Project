

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="text-center mb-4">Book Appointment</h1>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(route('appointments.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="patient_name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="patient_name" name="patient_name" required>
        </div>
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Select Doctor</label>
            <select class="form-select" id="doctor_id" name="doctor_id" required>
                <option value="">-- Select a Doctor --</option>
                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($doctor['id']); ?>"><?php echo e($doctor['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date</label>
            <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\health-domain\resources\views/appointments/create.blade.php ENDPATH**/ ?>
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <?php $__env->startSection('content'); ?>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="h-16 flex items-center justify-center text-lg font-semibold border-b border-gray-700">
                Health Care System
            </div>
            <nav class="flex-1">
                <ul class="space-y-2 px-4 mt-4">
                    <li>
                        <a href="<?php echo e(route('dashboard')); ?>" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('patients.index')); ?>" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Patient List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('doctors.index')); ?>" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Doctors Details
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('appointments.create')); ?>" class="block py-2 px-4 rounded hover:bg-gray-700">
                            Book Appointment
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Welcome to the Dashboard</h3>
                <p class="text-gray-700">
                    <?php echo e(__("You're logged in!")); ?>

                </p>
            </div>

            <!-- Additional Links for Patients, Doctors, and Appointments -->
            <div class="mt-6 bg-white shadow-md rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Quick Actions</h3>
                    <ul class="list-disc list-inside">
                        <li>
                            <a href="<?php echo e(route('patients.index')); ?>" class="text-blue-600 hover:underline">
                                View Patient List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('doctors.index')); ?>" class="text-blue-600 hover:underline">
                                View Doctors Details
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('appointments.create')); ?>" class="text-blue-600 hover:underline">
                                Book an Appointment
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\health-domain\resources\views/dashboard.blade.php ENDPATH**/ ?>
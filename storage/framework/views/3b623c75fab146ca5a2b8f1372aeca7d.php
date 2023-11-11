<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>

</head>

<body>
    <div class="gradient">


        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="register" id="adduser">Add User</a>
                </li>
            </ul><br>
        </div>
        <div class="container">
            <?php if($message= Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>
        </div>
        <div class="container" id="userlist">
            <h2>User list</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Image</th>
                        <th>Days for birthday</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($loop->index+1); ?></td>
                        <td><?php echo e($datas->name); ?></td>
                        <td><?php echo e($datas->email); ?></td>
                        <td><?php echo e($datas->phone); ?></td>
                        <td><?php echo e($datas->address); ?></td>

                        <td><?php echo e(\Carbon\Carbon::parse($datas->dob)->format('d-m-Y')); ?></td>

                        <td>
                            <img src="uploads/<?php echo e($datas->image); ?>" class="rounded-circle" width="50" height="50" alt="user image" />
                        </td>
                        
                        <td><?php echo e($datas->days_to_birthday); ?></td>

                        <td>
                            <form method="POST" action="data/<?php echo e($datas->id); ?>/delete">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>   
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirmDelete()">Delete</button>

                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
</body>
</div>

</html><?php /**PATH /home/ab/Desktop/tragonProject/resources/views/userlist.blade.php ENDPATH**/ ?>
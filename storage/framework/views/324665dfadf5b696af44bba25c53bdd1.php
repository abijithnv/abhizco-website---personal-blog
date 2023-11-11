<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registeration</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="gradient">
        <div class="container">
            <div class="container-fluid" id="header">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" id="navlink" href="/">Goto Homepage</a>
                    </li>
                </ul><br>
            </div>
            <?php if($message= Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>

            <div class="container-md">
                <h2 class="text-center">Add Users</h2>
                <div class="row justify-content-center">

                    <div class="col-sm-6">
                        <div class="card mt-3 p-3" id="signupcol">

                            <form action="/user/store" method="POST" enctype="multipart/form-data" id="InsideUserList">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>Name</label><input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                                    <p id="nameError" class="error"></p>
                                </div>
                                <div class="form-group">
                                    <label>Email</label><input type="email" name="email" placeholder="Enter email id" class="form-control" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                    <p id="emailError" class="error"></p>

                                </div>
                                <div class="form-group">
                                    <label>Phone</label><input type="phone" name="phone" placeholder="Enter a contact number" class="form-control" value="<?php echo e(old('phone')); ?>">
                                    <?php if($errors->has('phone')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                    <?php endif; ?>
                                    <p id="phoneError" class="error"></p>
                                </div>
                                <div class="form-group">
                                    <label>Address</label></label><textarea class="form-control" name="address" rows="4"><?php echo e(old('address')); ?></textarea>
                                    <?php if($errors->has('address')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                                    <?php endif; ?>
                                    <p id="addressError" class="error"></p>
                                </div>
                                <div class="form-group">
                                    <label>Date Of Birth</label><input type="date" name="dob" class="form-control" pattern="\d{2}-\d{2}-\d{4}" value="<?php echo e(old('dob')); ?>">
                                    <?php if($errors->has('dob')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('dob')); ?></span>
                                    <?php endif; ?>
                                    <p id="dobError" class="error"></p>
                                </div>
                                <div class="form-group">
                                    <label>User Image</label><input type="file" name="image" alt="photo of the user" class="form-control" value="<?php echo e(old('image')); ?>"><br>
                                    <?php if($errors->has('image')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                                    <?php endif; ?>
                                    <p id="imageError" class="error"></p>
                                </div>
                                <input type="submit" class="btn btn-primary ">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH /home/ab/Desktop/tragonProject/resources/views/register.blade.php ENDPATH**/ ?>
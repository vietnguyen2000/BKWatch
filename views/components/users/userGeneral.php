<div>
    <!-- User Avatar -->
    <img src="<?= $user['avatarURL'] ?>" alt="profile picture " class="card-img-top rounded-circle img-fluid" style="aspect-ratio: 1/1;object-fit: cover;">


    <!-- Card content -->
    <div class="card-body">
        <!-- Title -->
        <div class="card-title">
            <p style="text-align: center;">
                <strong>
                    <!-- Fullname -->
                    <?php echo $user['fullname'] ?>
                </strong>
            </p>
            <p style="text-align: center;">
                <!-- Roles -->
                <?php if ($user['role'] == 1) : ?>
                    <small class="badge badge-primary">Administrator</small>
                <?php elseif ($user['role'] == 0) : ?>
                    <small class="badge badge-info">Member</small>
                <?php endif ?>
            </p>
        </div>

        <!-- User Description -->
        <blockquote class="blockquote">
            <p class="card-text">

            </p>
        </blockquote>
    </div>
</div>
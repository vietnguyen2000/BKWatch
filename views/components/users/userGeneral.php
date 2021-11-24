<style> <?php include 'userGeneral.css'; ?> </style>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<div class="card">
    <!-- User Avatar -->            
    
    <div class="avatar mx-auto white profile-pic">
        <label class="-label" for="file" onClick="openUploadDropzone()">
            <i class="fas fa-camera"></i>
            <span>Change Image</span>
        </label>
        <input type="text" name="avatarUrl" />
        <img src="<?php echo $user['avatarURL'] ?>" alt="profile picture " class="card-img-top rounded-circle img-fluid" >    
    </div>

    <!-- Card content -->
    <div class="card-body">
        <!-- Title -->
        <div class="card-title">
            <p>
                <strong>
                    <!-- Fullname -->
                    <?php echo $user['fullname'] ?>
                </strong>                         
                <small class="text-muted">
                    <!-- Username -->
                    (<?php echo $user['username'] ?>)
                </small>                
            </p>
            <p>
                <!-- Roles -->
                <?php if ($user['role'] == 1): ?>
                    <small class="badge badge-primary">Administrator</small>
                <?php elseif ($user['role'] == 0): ?>
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
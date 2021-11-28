<style>
    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
        width: 100%;
        height: auto;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        aspect-ratio: 1/1;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, .35);
        border-radius: 50%;
        z-index: 0;
        width: 100%;
    }

    .profile-pic .overlay-upload {
        cursor: pointer;
        width: 100%;
        aspect-ratio: 1/1;
        z-index: 1;
        border-radius: 50%;
    }

    .overlay-loading-image {
        position: absolute;
        width: 100%;
        aspect-ratio: 1/1;
        z-index: 2;
        background-color: rgba(0, 0, 0, .8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-pic .overlay-upload:hover,
    .dragging {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, .8);
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;

        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }
</style>
<div class="container mt-5 mb-5">
    <form action="/user/<?= $user['id'] ?>/update" id="user-update-form" method="POST">
        <!-- User Profile -->
        <div class="card">
            <div class="card-title m-3">
                <h2>Thông tin cá nhân</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div style="position: relative;">
                            <!-- User Avatar -->

                            <div class="avatar mx-auto white profile-pic">
                                <label id="user-image-upload" class="overlay-upload" for="file">
                                    <p style="pointer-events: none;">
                                        <i class="fas fa-camera"></i>
                                        <span>Click or drag and drop<br>to change Image</span>
                                    </p>

                                </label>
                                <div class="overlay-loading-image" style="display: none;">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <input id="user-image-input" type="file" name="image-input" hidden />
                                <input id="avt-url" type="text" name="avatarURL" value="<?= $user['avatarURL'] ?>" hidden />
                                <img id="avatar" src="<?= $user['avatarURL'] ?>" alt="profile picture " class="card-img-top rounded-circle img-fluid">
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
                    </div>


                    <div class="card col-12 col-lg-9">
                        <div class="card-body">
                            <?php require(realpath($_SERVER["DOCUMENT_ROOT"]) . '/views/components/users/userUpdate.php'); ?>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-primary btn-submit" onClick="document.getElementById('user-update-form').submit()">Lưu</a>
                                <a href="/me" class="btn btn-black">Huỷ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Background image -->
</div>

<script>
    $('#user-image-input').on('change', e => {
        if (e.target.files && e.target.files.length > 0) {
            e.preventDefault();
            e.stopPropagation();
            uploadProfileImage(e.target.files[0])
            $('#user-image-input').val('')
        }
    })

    $('#user-image-upload').on('click', () => {
        $('#user-image-input').click();
    })

    $("#user-image-upload").on("dragover", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).addClass('dragging');
    });

    $("#user-image-upload").on("dragleave", function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass('dragging');
    });

    $("#user-image-upload").on("drop", function(event) {
        $(this).removeClass('dragging');
        if (!checkDragIsFiles(event.originalEvent)) {
            return
        }
        event.preventDefault();
        event.stopPropagation();
        uploadProfileImage(event.originalEvent.dataTransfer.files[0])
    });

    function checkDragIsFiles(e) {
        var imageTypes = ['image/png', 'image/gif', 'image/bmp', 'image/jpeg'];
        if (!e.dataTransfer || !e.dataTransfer.files) return false
        if (e.dataTransfer.files.length == 0) return false
        var fileType = e.dataTransfer.files[0].type;
        if (!imageTypes.includes(fileType)) return false
        return true
    }

    async function uploadProfileImage(file) {
        $('.overlay-loading-image').show()
        try {
            const url = await uploadImageAsync(file)
            $('#avatar').removeAttr('src')
            $('#avatar').attr('src', url)
            $('#avatar').one("load", function() {
                $('.overlay-loading-image').hide()
            })

            $('#avatar').one("error", function() {
                $('.overlay-loading-image').hide()
            })
            $('#avt-url').val(url)
        } catch (error) {
            console.error(error)
        }
    }
</script>

<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/utils/uploadImage.php') ?>
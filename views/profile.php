<div class="card">
    <div class="card-header">
        <h2>Profile</h2>
    </div>
    <div class="card-body">
        <form action="/update-profile" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo auth_user('name'); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo auth_user('email'); ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>
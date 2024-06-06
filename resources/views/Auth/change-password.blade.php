<div class="container mt-5">
    <h2>Change Password</h2>
    <form action="{{ route('post-change-password') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check if the session variable 'change_password' is true
        if ({{ session('change_password') ? 'true' : 'false' }}) {
            // Create and display the modal
            var modalContent = `
                <div id="changePasswordModal" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Your Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Your current password is your NIK. Please change it for security reasons.</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', modalContent);

            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
            modal.show();
        }
    });
</script>

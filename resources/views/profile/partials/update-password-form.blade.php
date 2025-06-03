<section>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Update Password</h4>
            <p class="text-muted mb-4">Ensure your account is using a long, random password to stay secure.</p>

            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')

                <div class="row mb-3">
                    <label for="update_password_current_password" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                        <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="update_password_password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="update_password_password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                        @if (session('status') === 'password-updated')
                            <span class="text-success ms-2">Saved.</span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

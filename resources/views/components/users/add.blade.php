@props(['roles'])

<div class="content-body">


    @auth


    <!-- Upload Button -->
    <div class="content-upload position-absolute end-0 mt-2">
        <div class="upload-btn-container">
            <a href="" class="btn btn-upload" data-bs-toggle="modal" data-bs-target="#modal_user">
                <img class="btn-icon" src="assets/icons/add.png">
                Add User
            </a>
        </div>
    </div>

    @endauth

    <div class="modal fade" id="modal_user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-width">
            <div class="modal-content">
                <div class="modal-header" id="modal_add_user_header">
                    <h4 class="modal-title" id="userModalLabel">Add New User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="modal_user_form" class="form" action="{{ route('users.upload') }}">
                        @csrf
                        <div class="d-flex flex-column scroll-y me-n7 pe-7 mb-3">
                            <div class="upload-information-container d-flex flex-column">

                                {{-- UserName --}}
                                <div class="row mb-4 mx-0 fv-row">
                                    <label class="required upload-description-title">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="username"></textarea>
                                </div>


                                {{-- Name --}}
                                <div class="row mb-4 mx-0 fv-row">
                                    <label class="required upload-description-title">Name</label>
                                    <input type="text" class="form-control" id="user_name" name="name"></textarea>
                                </div>
                                {{-- Email --}}
                                <div class="row mb-4 mx-0 fv-row">
                                    <label class="required upload-description-title">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"></textarea>
                                </div>
                                {{-- Role --}}
                                {{-- <div class="row mb-4 mx-0 fv-row">
                                    <label class="required upload-description-title">Role</label>
                                    <select class="form-select" id="user_role" name="role_id">
                                        <option disabled selected>Choose Role</option>
                                        @foreach ($roles as $role )
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="row mb-4 mx-0 fv-row">
                                    <label class=" upload-description-title">Role</label>
                                    <select class="form-select" id="user_role" name="role">
                                        <option disabled selected>Choose Role</option>
                                        @foreach ($roles as $role)
                                        @if ($role->name !== 'Default')
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Password --}}
                                <div class="row mb-4 mx-0 fv-row">
                                    <label class="required upload-description-title">Password</label>
                                    <input type="password" class="form-control" id="user_password"
                                        name="password"></textarea>
                                </div>


                                {{-- Password Confir --}}
                                <div class="row mb-4 mx-0 fv-row">
                                    <label class="required upload-description-title">Confirm Password</label>
                                    <input type="password" class="form-control" id="user_confirm_password"
                                        name="password_confirmation"></textarea>
                                </div>

                            </div>
                        </div>
                        {{-- Confirmation --}}
                        <div class="text-center mt-4 modal-action">
                            <button type="reset" class="btn btn-discard me-3" data-bs-dismiss="modal"
                                data-users-modal-action="cancel">Discard</button>
                            <button type="submit" class="btn btn-submit">
                                <span class="indicator-label">Add User</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

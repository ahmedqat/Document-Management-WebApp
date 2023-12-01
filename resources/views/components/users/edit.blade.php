@props(['user','modalId' => null])



{{-- Edit Modal --}}

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header" id="modal_upload_header">
                <h4 class="modal-title" id="uploadModalLabel">Edit User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="modal_edit_user_form" class="form"
                    action="{{ route('users.update',$user) }}">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="modal_id" value="{{ $modalId }}">

                    <div class="d-flex flex-column scroll-y me-n7 pe-7 mb-3">
                        <div class="upload-information-container d-flex flex-column">

                            {{-- Name --}}

                            <div class="row mb-4 mx-0 fv-row">
                                <label class="required upload-description-title">User Name</label>
                                <input type="text" class="form-control" id="edit_user_name" name="edit_user_name"
                                    value="{{ $user->name }}">
                                @error('edit_user_name','user_update')

                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>



                            {{-- Email --}}

                            <div class="row mb-4 mx-0 fv-row">
                                <label class="required upload-description-title">Email</label>
                                <input type="text" class="form-control" id="edit_user_email" name="edit_user_email"
                                    value="{{ $user->email }}">
                                @error('edit_user_email','user_update')

                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>



                            {{-- Role --}}


                            <div class="row mb-4 mx-0 fv-row">
                                <label class="required upload-description-title">Role</label>
                                <select class="form-select" id="edit_user_role" name="edit_user_role">
                                    <option disabled selected>Choose Role</option>


                                    @foreach ($roles as $role )
                                    <option value="{{ $role->id }}" @if($user->role_id ==
                                        $role->id) selected @endif>{{ $role->name }}</option>
                                    @endforeach



                                </select>

                                @error('edit_user_role','user_update')

                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>





                        </div>

                    </div>

                    <div class="text-center mt-4 modal-action">
                        <button type="reset" class="btn btn-discard me-3" data-bs-dismiss="modal">Discard</button>


                        <button type="submit" class="btn btn-submit" id="submitBtn">Submit</button>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>











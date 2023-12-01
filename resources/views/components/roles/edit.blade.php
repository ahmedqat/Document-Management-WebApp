@props(['role','modalId' => null])



{{-- Edit Modal --}}

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header" id="modal_upload_header">
                <h4 class="modal-title" id="uploadModalLabel">Edit Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="modal_edit_role_form" class="form"
                    action="{{ route('roles.update',$role) }}">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="modal_id" value="{{ $modalId }}">

                    <div class="d-flex flex-column scroll-y me-n7 pe-7 mb-3">
                        <div class="upload-information-container d-flex flex-column">

                            {{-- Name --}}

                            <div class="row mb-4 mx-0 fv-row">
                                <label class="required upload-description-title">Role Name</label>
                                <input type="text" class="form-control" id="edit_role_name" name="edit_role_name"
                                    value="{{ $role->name }}">
                                @error('edit_role_name','role_update')

                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>



                            {{-- Role Description --}}
                            <div class="row mb-4 mx-0 fv-row">
                                <label class="required upload-description-title">Role Description</label>
                                <textarea class="form-control" id="edit_role_description" rows="3"
                                    name="edit_role_description">{{ $role->role_description }}</textarea>
                                @error('edit_role_description','role_update')

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











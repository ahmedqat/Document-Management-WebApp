<div class="content-body">
    @auth


        <!-- Upload Button -->
        <div class="content-upload position-absolute end-0 mt-2">
            <div class="upload-btn-container">
                <a href="" class="btn btn-upload" data-bs-toggle="modal" data-bs-target="#modal_departments">
                    <img class="btn-icon" src="assets/icons/add.png">
                    Add Department
                </a>
            </div>
        </div>
    @endauth
        <div class="modal fade" id="modal_departments" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-width">
                <div class="modal-content">
                    <div class="modal-header" id="modal_add_role_header">
                        <h4 class="modal-title" id="roleModalLabel">Add New Department</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="modal_add_departments_form" class="form" action="{{ route('departments.upload') }}">
                            @csrf
                            <div class="d-flex flex-column scroll-y me-n7 pe-7 mb-3">
                                <div class="upload-information-container d-flex flex-column">
                                    <div class="row mb-4 mx-0 fv-row">
                                        <label class="required upload-description-title">Department Name</label>
                                        <input type="text" class="form-control" id="department_name" name="name"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="text-center mt-4 modal-action">
                                <button type="reset" class="btn btn-discard me-3" data-bs-dismiss="modal"
                                    data-users-modal-action="cancel">Discard</button>
                                <button type="submit" class="btn btn-submit">
                                    <span class="indicator-label">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

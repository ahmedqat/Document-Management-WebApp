<x-layout>

    <x-departments.add/>

    <div class="content-body-table">
        <div class="body-table-title">
            Departments
        </div>
        <table class="table table-striped table-hover" id="all_department">
            <thead>
                <tr>
                    <th class="column-width-20">Department Name</th>

                    <th class="text-center column-width-5">
                        <img class="btn-icon-more" src="assets/icons/more.png">
                    </th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($departments as $department )


                <tr>
                    <td>{{ $department->name }}</td>


                    {{-- Temporary Disabled --}}
                    {{-- <td>{{ $user->role->name }}</td> --}}


                    <td>
                        <div class="dropdown text-center">
                            <a href class="dropdown-toggle btn btn-more" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="btn-icon-more" src="assets/icons/more.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="content-dropdown-list list-unstyled">
                                    <li>
                                        <a href="#" class="btn btn-danger text-light" data-bs-toggle="modal"
                                        data-bs-target="#modal_delete_{{ $department->id }}">
                                            <img class="dropdown-list-btn-icon" src="{{ asset('assets/icons/delete.png') }}">
                                            <span>Delete</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $department->id }}" >
                                            <img class="dropdown-list-btn-icon" src="{{ asset('assets/icons/pencil.png') }}">
                                            <span>Edit</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>

                {{-- <x-users.edit :department="$department" :modalId="'modal-edit-'. $department->id"/> --}}
                {{-- <x-users.delete :department="$department" :modalId="'modal_delete_' . $department->id"/> --}}


                @endforeach


            </tbody>
        </table>
    </div>

    @if (count($errors->user_update) > 0)
        <script>
            $(document).ready(function() {
            // Retrieve the modal ID from the hidden input field
            var modalId = @json(old('modal_id'));

            // Show the specific modal associated with the retrieved modal ID
            $('#' + modalId).modal('show');
        });
        </script>
        @endif

</x-layout>

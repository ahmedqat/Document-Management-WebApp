<x-layout>

    <x-departments.add />
{{-- Displays the table which has all the departments. --}}
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
                @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
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
                                            <img class="dropdown-list-btn-icon"
                                                src="{{ asset('assets/icons/delete.png') }}">
                                            <span>Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <x-departments.delete :department="$department" :modalId="'modal_delete_' . $department->id" />
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

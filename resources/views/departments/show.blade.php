<x-layout>
    <x-docs.upload />

    {{-- Table goes here --}}

    <div class="content-body-table">
        <div class="body-table-title">
            Documents for {{ $department->name }}
        </div>
        <table class="table table-striped table-hover" id="documentTable">
            <thead>
                <tr>
                    <th class="column-width-20">Name</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th>File</th>
                    <th class="text-center column-width-5">
                        <img class="btn-icon-more" src="{{ asset('assets/icons/more.png') }}">
                    </th>
                </tr>
            </thead>
            <tbody>

                @if (count($documents) == 0)

                <tr>
                    <td>
                        <p>No Documents Uploaded</p>
                    </td>
                    <td>
                        <p>No Documents Uploaded</p>
                    </td>
                    <td>
                        <p>No Documents Uploaded</p>
                    </td>
                    <td>
                        <p>No Documents Uploaded</p>
                    </td>
                    <td>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="content-dropdown-list list-unstyled">
                                <li>
                                    <a href="#" class="btn btn-danger text-light">
                                        <img class="dropdown-list-btn-icon"
                                            src="{{ asset('assets/icons/delete.png') }}">
                                        <span>Delete</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="dropdown-list-btn-icon"
                                            src="{{ asset('assets/icons/pencil.png') }}">
                                        <span>Edit</span>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>


                @endif


                @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->description }}</td>
                    <td>{{ $department->name }}</td>
                    <td>

                        <a href="{{ asset('storage/' . $document->path) }}" download="{{ $document->file_name }}">
                            {{ $document->file_name}}
                        </a>


                    </td>

                    <td>
                        <div class="dropdown text-center">
                            <a href class="dropdown-toggle btn btn-more" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="btn-icon-more" src="{{ asset('assets/icons/more.png') }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="content-dropdown-list list-unstyled">
                                    <li>
                                        <a href="#" class="btn btn-danger text-light" data-bs-toggle="modal"
                                            data-bs-target="#modal_delete_{{ $document->id }}">
                                            <img class="dropdown-list-btn-icon"
                                                src="{{ asset('assets/icons/delete.png') }}">
                                            <span>Delete</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-{{ $document->id }}">
                                            <img class="dropdown-list-btn-icon"
                                                src="{{ asset('assets/icons/pencil.png') }}">
                                            <span>Edit</span>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>


                <x-docs.edit :document="$document" :modalId="'modal-edit-' .$document->id" />
                <x-docs.delete :document="$document" :modalId=" 'modal_delete_' .$document->id " />


                @endforeach
            </tbody>
        </table>

        <script>
            var numColumns = $('#documentTable').find('thead th').length;

            var columnDefinitions = Array(numColumns).fill({ "orderable": false });


            $('#documentTable').DataTable({

            "pageLength":10,
            "columns": columnDefinitions,



        });
        </script>



        @if (count($errors->update) > 0)
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

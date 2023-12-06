<x-layout>


    {{-- Table --}}
    <div class="content-body-table">
        <div class="body-table-title">
            Office Document
        </div>
        <form action="{{ route('access.update') }}" method="post">
            @csrf
            <table class="table table-striped table-hover" id="all_department">
                <thead>
                    <tr>
                        <th class="column-width-19">Group Name</th>
                        @foreach($departments as $department)
                        <th class="column-width-9 text-center">{{ $department->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach($roles as $role)
                    @if (!in_array($role->name, ['Super Admin', 'Default']))
                    <tr>
                        <td>{{ $role->name }}</td>
                        @foreach($departments as $department)
                        <td class="text-center align-middle">
                            @php
                            $permissionName = "modify_{$department->id}";
                            $isChecked = $role->hasPermissionTo($permissionName);
                            @endphp

                            <div class="form-check d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="checkbox" name="permissions[{{ $role->id }}][]"
                                    value="{{ $department->id }}" {{ in_array($department->id,
                                $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>

                        </td>

                        @endforeach
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update Permissions</button>
            </div>
        </form>
    </div>




</x-layout>

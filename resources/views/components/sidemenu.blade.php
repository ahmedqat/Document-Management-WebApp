<!-- Side Menu -->




{{-- @props(['departments']) --}}

<div class="container-fluid side-menu-container overflow-auto">
    <div class="side-menu">
        <!-- Side Menu Top -->
        <div class="side-menu-top">
            <div class="side-menu-title">
                Department
            </div>
            <ul class="side-menu-content">
                {{-- <div>
                    <li class="@if (Route::currentRouteName() == 'department.library')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text"
                            href="{{ route('department.library') }}">Library</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.it')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.it') }}">IT
                            Department</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.admin')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.admin') }}">Admin
                            Department</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.finance')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.finance') }}">Finance
                            Department</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.research')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.research') }}">Research
                            and Innovation</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.hr')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.hr') }}">Human Resource
                            Department</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.asset')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.asset') }}">Procurement
                            and Asset Management
                            Department</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.aa')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.aa') }}">Office of
                            Academic Affairs
                            (Academic Affairs)</a>
                    </li>
                    <li class="@if (Route::currentRouteName() == 'department.qa')
                        active
                    @endif">
                        <a class="side-menu-item side-menu-item-text" href="{{ route('department.qa') }}">Office of
                            Academic Affairs
                            (Quality Assurance)</a>
                    </li>
                </div> --}}

                @foreach ($departments as $department )

                {{-- <li class="{{ (request()->is('departments/' . $department->id . '*')) ? 'active' : ''}}">

                    <a class="side-menu-item side-menu-item-text" href="/departments/{{ $department->id }}">{{
                        $department->name }}</a>
                </li> --}}


                <li class="{{ (request()->is('departments/' . $department->id . '*')) ? 'active' : ''}}">

                    <a class="side-menu-item side-menu-item-text"
                        href="{{ route('documents.show' , ['department' => $department]) }}">{{
                        $department->name }}</a>
                </li>



                @endforeach


            </ul>
        </div>
        <!-- Side Menu Bottom -->
        <div class="side-menu-bottom">
            <div class="side-menu-title">
                Admin
            </div>
            <ul class="side-menu-content">

                <li class="{{ (request()->is('roles')) ? 'active' : '' }}">
                    <a class="side-menu-item side-menu-item-text" href="{{ route('roles.index') }}">Role</a>
                </li>


                <li class="{{ (request() -> is('users')) ? 'active' : '' }}">
                    <a class="side-menu-item side-menu-item-text" href="{{ route('users.index') }}">User</a>
                </li>

                <li>
                    <a class="side-menu-item side-menu-item-text" href="access.html">Access Right</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Side Menu -->

<div class="container-fluid side-menu-container overflow-auto">
    <div class="side-menu">
        <!-- Side Menu Top -->
        <div class="side-menu-top">
            <div class="side-menu-title">
                Department
            </div>
            <ul class="side-menu-content">

                @foreach ($departments as $department )

                <li class="{{ (request()->is('departments/' . $department->id)) ? 'active' : ''}}">

                    <a class="side-menu-item side-menu-item-text"
                        href="{{ route('documents.index' , ['department' => $department]) }}">{{
                        $department->name }}</a>
                </li>

                @endforeach

            </ul>
        </div>
        <!-- Side Menu Bottom -->
        @if (auth()->check() && auth()->user()->hasRole('Super Admin'))


        <div class="side-menu-bottom">
            <div class="side-menu-title">
                Admin
            </div>
            <ul class="side-menu-content">

                <li class="{{ (request() -> is('users')) ? 'active' : '' }}">
                    <a class="side-menu-item side-menu-item-text" href="{{ route('users.index') }}">User</a>
                </li>


                <li class="{{ (request() -> is('departments')) ? 'active' : '' }}">
                    <a class="side-menu-item side-menu-item-text"
                        href="{{ route('departments.index') }}">Departments</a>
                </li>


                <li class="{{ (request() -> is('access')) ? 'active' : '' }}">
                    <a class="side-menu-item side-menu-item-text" href="{{ route('access.index') }}">Access</a>
                </li>
            </ul>
        </div>
        @endif
    </div>
</div>

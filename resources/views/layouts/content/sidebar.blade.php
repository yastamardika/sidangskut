<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-users"></i>
        <p>
            Manajemen Users
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('role.index') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Role</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.roles_permission') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Role Permission</p>
            </a>
        </li>
    </ul>

</li>

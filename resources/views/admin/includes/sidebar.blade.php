<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class=" pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home" style="color: #c3c6d1;"></i>
                    <p>
                        Главная
                    </p>
                </a>
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users" style="color: #c3c6d1;"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-clone" style="color: #c3c6d1;"></i>
                    <p>
                        Посты
                    </p>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list" style="color: #c3c6d1;"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
        </ul>
    </div>

</aside>

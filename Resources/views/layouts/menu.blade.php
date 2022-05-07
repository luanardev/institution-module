
<li class="nav-item">
    <a href="{{route('institution.home')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

@can('view_branch')
    <li class="nav-item">
        <a href="{{route('branch.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Branches</p>
        </a>
    </li>
@endcan

@can('view_campus')
    <li class="nav-item">
        <a href="{{route('campus.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Campuses</p>
        </a>
    </li> 
@endcan

@can('view_faculty')
    <li class="nav-item">
        <a href="{{route('faculty.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Faculties</p>
        </a>
    </li> 
@endcan

@can('view_department')
    <li class="nav-item">
        <a href="{{route('department.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Departments</p>
        </a>
    </li>
@endcan

@can('view_section')
    <li class="nav-item">
        <a href="{{route('section.index')}}" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>Sections</p>
        </a>
    </li>
@endcan

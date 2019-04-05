
<ul class="nav navbar-nav">
    <li class="active">
        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
    </li>
    <li class="menu-title">Site Edit</li><!-- /.menu-title -->
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Menu</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-plus" aria-hidden="true"></i><a href="{{route('menu.add',['Locale'=>$local])}}">Add</a></li>
            <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="{{route('menu.edit',['Locale'=>$local])}}">Edit</a></li>
            <li><i class="fa fa-trash-o" aria-hidden="true"></i><a href="{{route('menu.delete',['Locale'=>$local])}}">Delete</a></li>
        </ul>
    </li>

    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>
            Text</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-plus" aria-hidden="true"></i><a href="{{route('text.add',['Locale'=>$local])}}">Add</a></li>
            <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="{{route('text.edit',['Locale'=>$local])}}">Edit</a></li>
            <li><i class="fa fa-trash-o" aria-hidden="true"></i><a href="{{route('text.delete',['Locale'=>$local])}}">Delete</a></li>
        </ul>
    </li>

    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>
            Galeri</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-plus" aria-hidden="true"></i><a href="{{route('galeri.add',['Locale'=>$local])}}">Add</a></li>
            <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="{{route('galeri.edit',['Locale'=>$local])}}">Edit</a></li>
            <li><i class="fa fa-trash-o" aria-hidden="true"></i><a href="{{route('galeri.delete',['Locale'=>$local])}}">Delete</a></li>
        </ul>
    </li>
</ul>

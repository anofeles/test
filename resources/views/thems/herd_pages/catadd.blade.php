<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="title"><br>
    <textarea name="desc" placeholder="desc"></textarea><br>
    <input type="file" name="image"><br>
    @if (!empty($menu))
        <select name="menu">
            <option value="0">menu item</option>
            @foreach($menu as $menuitem)
                <option value="{{$menuitem->uuid}}">{{$menuitem->name}}</option>
            @endforeach
        </select><br>
    @endif
    <button type="submit">add</button>
</form>

<form action="{{route('galeri.add',['locale'=>$locale])}}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="text" name="galerititle" placeholder="title"><br>
    <label>yda</label><br>
    <input type="file" name="yda"><br>
    <label>img</label><br>
    <input type="file" name="img[]" multiple="multiple"><br>
    <button type="submit">Add</button>
</form>

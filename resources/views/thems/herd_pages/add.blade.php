
<form method="post">
    @csrf
    <input type="text" name="title" placeholder="title"><br>
    <select name="mtav">
        <option value="top">top</option>
        <option value="left">left</option>
    </select><br>
    <button type="submit">add</button>
</form>

<h1>Create book</h1>
<form method="POST" action="{{route('book.store')}}">
    @csrf
    <input type="text" name="name" placeholder="Enter name book">
    <input type="text" name="author" placeholder="Enter author book">
    <input type="submit" value="Add">
</form>


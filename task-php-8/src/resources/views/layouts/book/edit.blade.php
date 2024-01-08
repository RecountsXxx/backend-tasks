<form method="POST" action="{{route('book.update',$book['id'])}}">
    @method('PUT')
    @csrf
    <input type="text" name="name" value="{{$book->name}}" placeholder="Enter book name">
    <input type="text" name="author" value="{{$book->author}}" placeholder="Enter author name">
    <input type="submit" value="Update">
</form>

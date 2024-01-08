<h1>Books</h1>
<ul>
    @foreach($books as $book)
        <li>{{$book->name}}
            <a href="{{route('book.edit',$book['id'])}}">
                <button type=submit class="delete-btn btn btn-danger btn-sm">
                <i class="fas fa-trash"></i> Edit
            </button>
            </a>
            <form action="{{route('book.destroy', $book['id'])}}" method="POST"  style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type=submit class="delete-btn btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
         </li>
    @endforeach
</ul>

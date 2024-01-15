<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
    <style>
        .grid{
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap:50px;
        }
    </style>
</head>
<body>
<div class="grid">
<div class="books">
    <h1>Books</h1>
    <ul id="booksList"></ul>
    <form enctype="multipart/form-data" id="addBookForm">
        <h1>Create book</h1>
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter name book">
        <input type="text" name="author" id="author" placeholder="Enter author book">
        <input type="text" name="cat_id" id="book_cat_id" placeholder="Enter category id">
        <input type="file" name="image" id="image" placeholder="Select a file">
        <button type="button" id="addBookBtn">Add</button>
    </form>
    <form id="editBookForm">
        <h1 id="editBookH1">Edit book id: </h1>
        @csrf
        <input type="text" name="nameEdit" id="nameEdit" placeholder="Enter name book">
        <input type="text" name="authorEdit" id="authorEdit" placeholder="Enter author book">
        <input type="text" name="cat_id" id="book_cat_id_edit" placeholder="Enter category id">
        <button type="button" id="editBookBtn">Edit</button>
    </form>
</div>
    <div class="Category">
        <h1>Category</h1>
        <ul id="categoryList"></ul>
        <form id="addCategoryForm">
            <h1>Create category</h1>
            @csrf
            <input type="text" name="name" id="nameCreate" placeholder="Enter name book">
            <input type="text" name="category" id="nameCategoryCreate" placeholder="Enter name category">
            <button type="button" id="addBookBtnCategory">Add</button>
        </form>
        <form id="editBookForm">
            <h1 id="editCategoryH1">Edit category id: </h1>
            @csrf
            <input type="text" name="nameEditCategory" id="nameEditCategory" placeholder="Enter name book">
            <button type="button" id="editCategoryBtn">Edit</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function (){
        let catId = 0;
        $.ajax({
            url:'/api/category',
            method:'GET',
            datatype:'json',
            success:function (data) {
                data.forEach(function (item){
                    let li = $('<li>').attr('id','cat' + item.id).text('ID: ' + item.id + ', Name: ' + item.name);
                    li.append('<button class="deleteCategoryBtn">Delete</button>');
                    li.append('<button class="editCategoryBtn">Edit</button>');
                    $('#categoryList').append(li);
                })

            },
            error:function (error){
                console.error(error);
            }
        })
        $('#addBookBtnCategory').on('click',function (){
            let name = $('#nameCreate').val();
            $.ajax({
                url:'/api/category',
                method:'POST',
                data:{
                    name: name,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                datatype:'JSON',
                success:function (item){
                    let li = $('<li>').attr('id',item.id).text('ID: ' + item.id + ', Name: ' + item.name);
                    li.append('<button class="deleteCategoryBtn">Delete</button>');
                    li.append('<button class="editCategoryBtn">Edit</button>');
                    $('#categoryList').append(li);
                },
                error: function (error) {
                    console.error('Ошибка при получении данных:', error);
                }
            })
        })
        $('#categoryList').on('click','.deleteCategoryBtn',function(){
            catId = $(this).closest('li').attr('id');
            catId = catId.replace('cat','');
            console.log(catId);
            $.ajax({
                url:'/api/category/' + catId,
                method: 'DELETE',
                data:{
                    id:catId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                datatype:'JSON',
                success:function (item){
                    $('#cat' + catId).remove()
                },
                error:function (error){
                    console.error(error);
                }
            });
        });
        $('#categoryList').on('click','.editCategoryBtn',function(){
            catId = $(this).closest('li').attr('id');
            catId = catId.replace('cat','');
            $('#editCategoryH1').text('Edit category id: ' + catId);
        })
        $('#editCategoryBtn').on('click',function (){
            let name = $('#nameEditCategory').val();
            $.ajax({
                url:'/api/category/' + catId,
                method:'PUT',
                datatype:'JSON',
                data: {
                    id: catId,
                    name:name,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function (item){
                    $('#cat' + catId).remove();
                    let li = $('<li>').attr('id',item.id).text('ID: ' + item.id + ', Name: ' + item.name);
                    li.append('<button class="deleteCategoryBtn">Delete</button>');
                    li.append('<button class="editCategoryBtn">Edit</button>');
                    $('#categoryList').append(li);
                },
                error:function (error){
                    console.error(error);
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function () {
        let liId = 0;
        $.ajax({
            url: '/api/book',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                data.forEach(function (item) {
                   let li = $('<li>').attr('id',item.id).text('ID: ' + item.id + ', Name: ' + item.name + ', Author: ' + item.author + ', Category id: ' + item.category_id                                                 );
                   let img = $('<img>').attr('src',item.image).css('width','50px','height','50px');
                   li.append(img);
                   li.append('<button class="deleteBookBtn">Delete</button>');
                    li.append('<button class="editBookBtn">Edit</button>');
                   $('#booksList').append(li);
               })
                console.log(data);
            },
            error: function (error) {
                console.error('Ошибка при получении данных:', error);
            }
        });

        $('#addBookBtn').on('click', function () {
            let name = $('#name').val();
            let author = $('#author').val();
            let cat_id = $('#book_cat_id').val();

            // Assuming you have an input field for file upload with the id 'image'
            let imageInput = $('#image');
            let image = imageInput[0].files[0];

            let formData = new FormData();
            formData.append('name', name);
            formData.append('author', author);
            formData.append('category_id', cat_id);
            formData.append('image', image);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: '/api/book',
                method: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (item) {
                    console.log(item);
                    let li = $('<li>').attr('id', item.id).text('ID: ' + item.id + ', Name: ' + item.name + ', Author: ' + item.author + ', Category id: ' + item.category_id);
                    li.append('<button class="deleteBookBtn">Delete</button>');
                    li.append('<button class="editBookBtn">Edit</button>');
                    $('#booksList').append(li);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $('#booksList').on('click','.deleteBookBtn',function (){
            liId = $(this).closest('li').attr('id');
            $.ajax({
                url: '/api/book/' + liId,
                method: 'DELETE',
                data: {
                    id:liId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success:function(data){
                    $('#' + liId).remove();
                    console.log(data);
                },
                error:function(error){
                    console.error(error);
                }
            })
        })
        $('#booksList').on('click','.editBookBtn',function(){
            liId = $(this).closest('li').attr('id');
            $('#editBookH1').text('Edit book id: ' + liId);
        })
        $('#editBookBtn').on('click',function (){
            let name = $('#nameEdit').val();
            let author = $('#authorEdit').val();
            let cat_id = $('#book_cat_id').val();
            $.ajax({
                url:'/api/book/' + liId,
                method:'PUT',
                datatype:'JSON',
                data: {
                    id: liId,
                    name:name,
                    author:author,
                    category_id: cat_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function (item){
                    $('#' + liId).remove();
                    let li = $('<li>').text('ID: ' + liId + ', Name: ' + name + ', Author: ' + author + ', Category id: ' + cat_id);
                    li.append('<button class="deleteBookBtn">Delete</button>');
                    li.append('<button class="editBookBtn">Edit</button>');
                    $('#booksList').append(li);
                },
                error:function (error){
                    console.error(error);
                }
            })
        })
    });
</script>
</body>
</html>

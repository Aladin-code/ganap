@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')

<section class="flex justify-center">
        <form action="{{ route('users.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="w-full flex justify-between items-center mb-1 cursor-pointer">
            <h1 class="font-bold text-xl uppercase">New Post</h1>
            <div class="relative bg-black py-2 px-5 rounded-md">
              <i class="fa-solid fa-plus bg-black text-white"></i>
              <input type="submit" value="ADD" class=" text-white ">
            </div>
          </div>
          <hr>
        <div class="w-full my-3">
          <label for="" class="font-semibold">Featured Image</label><br>
          <input type="file" name="img" id="img"class="w-full border rounded-md p-2 mt-2" >
        </div>
        <div class="w-full my-3">
          <label for="" class="font-semibold">Title</label><br>
          <input type="text" name="title" id="title"class="w-full border rounded-md p-2 mt-2" >
        </div>
        <div class="w-full my-3">
    <label for="category" class="font-semibold">Category</label><br>
    <select name="category" id="category" class="w-full border rounded-md p-2 mt-2">
      <option value="" disabled selected>Select a category</option>
      @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
  </select>

</div>

     
        <div class="w-full my-3">
          <label for="" class="font-semibold">Content</label><br>
          <textarea name="content" id="texteditor" class="mt-2"></textarea>
        </div>
        
        </form>
        
</section>
<script>
      tinymce.init({
    selector: '#texteditor',
    height: 350,  // Set the height of the editor
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | code | fontselect fontsizeselect | bullist numlist | link image | forecolor backcolor | formatselect',
    plugins: 'advlist autolink link image lists charmap print preview anchor searchreplace visualblocks code fullscreen',
  });
</script>

@endsection

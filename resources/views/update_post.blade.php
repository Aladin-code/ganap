@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')

<section class="flex justify-center">
        <form action="">
          <div class="w-full flex justify-between items-center mb-1 cursor-pointer">
            <h1 class="font-bold text-xl uppercase">Update Post</h1>
            <div class="relative bg-black py-2 px-5 rounded-md">
              <input type="submit" value="UPDATE" class=" text-white ">
            </div>
           
          </div>
          <hr>
        <div class="w-full my-3">
          <label for="" class="font-semibold">Featured Image</label><br>
          <input type="file" name="title" class="w-full border rounded-md p-2 mt-2" >
        </div>
        <div class="w-full my-3">
          <label for="" class="font-semibold">Title</label><br>
          <input type="text" name="title" class="w-full border rounded-md p-2 mt-2" >
        </div>
        <div class="w-full my-3">
    <label for="category" class="font-semibold">Category</label><br>
    <select name="category" class="w-full border rounded-md p-2 mt-2">
        <option value="" disabled selected>Select a category</option>
        <option value="category1">Daily Life</option>
        <option value="category2">Thoughts</option>
        <option value="category3">Life Experiences</option>
        <option value="category4">Travel</option>
        <option value="category5">Creativity and Hobbies</option>
        <option value="category4">Inspiration and MOtivation</option>
    </select>
</div>

     
        <div class="w-full my-3">
          <label for="" class="font-semibold">Content</label><br>
          <textarea name="" id="texteditor" class="mt-2"></textarea>
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

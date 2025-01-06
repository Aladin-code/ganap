@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')

<section class="flex justify-center">
  <form method="POST" action="{{ route('users.update', $post->id) }}" id="updateForm" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="w-full flex justify-between items-center mb-1 cursor-pointer">
      <h1 class="font-bold text-xl uppercase">Update Post</h1>
      <div class="relative bg-black py-2 px-5 rounded-md">
        <input type="button" id="updateButton" value="UPDATE" class="text-white cursor-pointer">
      </div>
    </div>
    <hr>

    <div class="w-full my-3">
      <label for="featured_image" class="font-semibold">Featured Image</label><br>
      <input type="file" name="featured_image" class="w-full border rounded-md p-2 mt-2">
      @if($post->featured_image)
      <div class="mt-2">
        <img src="{{ asset('assets/' . $post->featured_image) }}" alt="Featured Image" class="w-32 h-32 object-cover">
      </div>
      @endif
    </div>

    <div class="w-full my-3">
      <label for="" class="font-semibold">Title</label><br>
      <input type="text" name="title" class="w-full border rounded-md p-2 mt-2" value="{{old('title', $post->title)}}">
    </div>
    <div class="w-full my-3">
      <label for="category" class="font-semibold">Category</label><br>
      <select name="category" class="w-full border rounded-md p-2 mt-2">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
        @endforeach
      </select>
    </div>


    <div class="w-full my-3">
      <label for="" class="font-semibold">Content</label><br>
      <textarea name="content" id="texteditor" class="mt-2">{{ old('content', $post->content) }}</textarea>
    </div>

  </form>

</section>
<script>
  tinymce.init({
    selector: '#texteditor',
    height: 350, // Set the height of the editor
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | code | fontselect fontsizeselect | bullist numlist | link image | forecolor backcolor | formatselect',
    plugins: 'advlist autolink link image lists charmap print preview anchor searchreplace visualblocks code fullscreen',
  });

  document.getElementById('updateButton').addEventListener('click', function (e) {
    Swal.fire({
      title: "Do you want to save the changes?",
      showCancelButton: true,
      confirmButtonText: "Save",
      customClass: {
            confirmButton: 'bg-black text-white px-4 py-2 rounded',
            cancelButton: 'bg-gray-300 text-black px-4 py-2 rounded'
        }
    }).then((result) => {
      if (result.isConfirmed) {
        // If confirmed, submit the form
        document.getElementById('updateForm').submit();
      } else if (result.isDenied) {
        Swal.fire("Changes are not saved", "", "info");
      }
    });
  });


</script>

@endsection
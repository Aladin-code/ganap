@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')

<section class="flex justify-center">
        <textarea name="" id="texteditor"></textarea>
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

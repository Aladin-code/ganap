@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')

<section class="flex justify-center bg-white">
    <div class=" max-w-[700px] px-2 mt-7">
        <h1 class="font-bold text-3xl capitalize">{{$post->title}}</h1>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
        <input type="hidden" name="post_id" id="user_id" value="{{ auth()->user()->id  }}">
        <hr>
         <!-- Image -->
         @if($post->featured_image)
        <div class="flex justify-center my-4">
            <img src="{{ asset('assets/' . $post->featured_image) }}" 
                 alt="Post Image" 
                 class="rounded-lg max-h-96 object-cover">
        </div>
        @endif
        <hr>
        {!! $post->content !!}
        <hr>
        <div class="flex w-full items-center  p-2 text-xl mt-[20px]">
            <p class="text-2xl">
                <button id="like-btn" data-post-id="{{ $post->id }}" data-user-id="{{ auth()->user()->id }}" class="flex items-center ">
                    <i class=" fa-heart mr-3 "></i>
                </button>
            </p>
            <div class="relative flex flex-grow ">
                <input type="text" class=" bg-none w-full  border border-black focus:outline-none  rounded-3xl py-2 mx-3 text-sm px-5" placeholder="Type your comment here" id="comment">
                <button id="submitComment" class="absolute top-1 right-8" data-post-id="{{ $post->id }}" data-user-id="{{ auth()->user()->id }}"><i class="fa-solid fa-paper-plane"></i></button>
            </div>

            <p><i class="fa-solid fa-share"></i></p>
        </div>
        <p class="px-2 text-sm" id="like-count"></p>

        <p class="px-2 text-xl font-bold mt-3" id="comment-count"></p>
        <hr>
        <div id="comments-container">
            <!-- Comments will be loaded here -->
        </div>

        <!-- <p class="px-2 text-sm my-1"><span class="font-semibold">Aladin Cacho:</span> Exactly</p>
                 <p class="px-2 text-sm my-1"><span class="font-semibold">Paola:</span> You nailed it!</p> -->
    </div>
</section>

<script>
    $(document).ready(function() {
        fetchComments();
        $('#submitComment').hide();
        // Handle comment submission
        $('#submitComment').click(function() {
            let comment = $('#comment').val();
            let postId = $(this).data('post-id');
            let userId = $(this).data('user-id');

            // Check if input has value before submitting
            if (comment.trim() === "") {
                alert('Please enter a comment.');
                return; // Prevent submission if the input is empty
            }

            $.ajax({
                url: '/comment', // Correct endpoint for the store method
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token
                    post_id: postId,
                    user_id: userId,
                    comment: comment
                },
                success: function(response) {
                    if (response.success) {
                        // Clear the input field on success
                        countLikesComments();
                        $('#comment').val('');

                        // Optionally, hide the submit button if the input is cleared
                        $('#submitComment').hide();

                        // Show success message or dynamically update the comment section
                        alert(response.message);
                        fetchComments();
                    } else {
                        alert('Failed to add comment.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr.responseText);
                    alert('Error occurred');
                }
            });
        });

        // Handle input changes to show/hide the submit button
        $('#comment').on('input', function() {
            let comment = $(this).val();

            // Show submit button only if there's text in the input
            if (comment.trim() !== "") {
                $('#submitComment').show();
            } else {
                $('#submitComment').hide();
            }
        });

        function fetchComments() {
            const postId = $('#post_id').val();
            $.ajax({
                url: '/get-comments/' + postId, // Correct URL route
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        const commentsContainer = $('#comments-container');
                        commentsContainer.empty(); // Clear any existing comments

                        // Loop through comments and display them
                        response.comments.forEach(function(comment) {
                            commentsContainer.append(`
                        <div class="comment my-3">
                            <p class="px-2 text-sm my-1"><span class="font-semibold">${comment.user.email}: </span>${comment.comments}</p>
                        </div>
                    `);
                        });
                    } else {
                        alert("Error fetching comments.");
                        console.log('Error fetching comments:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr.responseText);
                }
            });
        }

    });
</script>
<script>
    $(document).ready(function() {
        $('#like-btn').click(function() {
            var postId = $(this).data('post-id');
            var userId = $(this).data('user-id');

            $.ajax({
                url: '/like/' + postId + '/' + userId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        // Toggle the heart class
                        const heartIcon = $('#like-btn i');
                        if (heartIcon.hasClass('fa-regular')) {
                            heartIcon.removeClass('fa-regular').addClass('fa-solid text-gray-700');
                        } else {
                            heartIcon.removeClass('fa-solid text-gray-800').addClass('fa-regular');
                        }
                        countLikesComments();
                    } else {
                        alert('Something went wrong.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr.responseText);
                    alert('Error occurred');
                }
            });
        });

    });

    countLikesComments();

    function countLikesComments() {
        const postId = $('#post_id').val();
        $.ajax({
            url: '/post/' + postId + '/count', // URL to fetch counts
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#like-count').text(response.likeCount + " Likes");
                    $('#comment-count').text("Responses (" + response.commentCount + ")"); // Ensure this matches your markup
                } else {
                    console.log('Error fetching counts:', response);
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
            }
        });
    }
    hasLiked();

    function hasLiked() {
        const userId = $('#user_id').val();
        const postId = $('#post_id').val();

        $.ajax({
            url: '/hasLike/' + postId + '/' + userId, // URL to fetch counts
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    // Add a success class or modify the UI
                    $('#like-btn i').removeClass('fa-regular').addClass('fa-solid text-gray-700'); // Change heart icon to solid red
                } else {
                    // Handle cases where the like status is not true
                    $('#like-btn i').removeClass('fa-solid text-red-500').addClass('fa-regular'); // Change back to regular icon
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
            }
        });

    }
</script>

<script>

</script>


@endsection
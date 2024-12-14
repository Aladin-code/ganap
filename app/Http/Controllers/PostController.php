<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'nullable|image|max:2048',
            'category' => 'required',
            'content' => 'required|string',
        ]);

        // Handle image upload
       
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $featured_img = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets'), $featured_img);
        }

    


        DB::beginTransaction();
        try{
           
            Post::create([
                'title' => $validated['title'],
                'featured_image' => $featured_img,
                'category_id' => $validated['category'],
                'content' => $validated['content'],
                
            ]);
            DB::commit();
            $msg = ['success','Post has been added'];
            return redirect()->route('index')->with(['msg'=>$msg]);
        }catch(\Exception $e){
            
            DB::rollBack();
          
            $msg = ['danger',' Failed to add post ' ];
            
            return redirect()->back()->with(['msg'=>$msg]);
            
        }
        // Redirect with success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the post with its associated category
        $post = Post::find($id);
        
        // Retrieve all categories
        $categories = DB::table('categories')->get();
        
        // Pass the post and categories to the view
        return view('update_post', compact('post', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->content = $request->content;

        // if ($request->hasFile('featured_image')) {
        //     // Store the new image and update the post's image field
        //     $path = $request->file('featured_image')->store('assets', 'public');
        //     $post->featured_image = $path;
        // }

        if ($request->hasFile('featured_image')) {
            $img = $request->file('featured_image');
            $featured_img = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('assets'), $featured_img);
            $post->featured_image = $featured_img;
        }

        $post->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id)->delete();
        // $msg = ['success',' Student Record is Deleted ' ];
        return redirect()->back();
    }

    public function viewPost($id)
        {
            $post = Post::findOrFail($id); // Retrieve the post by ID or show a 404 error if not found

            
            return view('view_post', compact('post'));
        }

        public function likePost($post_id, $user_id)
        {
            try {
                // Check if the user has already liked the post
                $like = Like::where('post_id', $post_id)
                            ->where('user_id', $user_id)
                            ->first();
        
                // If the user already liked the post, remove the like
                if ($like) {
                    $like->delete();
                    return response()->json([
                        'success' => true,
                        'message' => 'Like removed'
                    ]);
                }
        
                // If the user has not liked the post, add a new like
                Like::create([
                    'post_id' => $post_id,
                    'user_id' => $user_id
                ]);
        
                // Return a success response after adding a like
                return response()->json([
                    'success' => true,
                    'message' => 'Like added'
                ]);
        
            } catch (\Exception $e) {
                // Log any errors
                // \Log::error('Error adding or removing like: ' . $e->getMessage());
        
                // Return a failure response with a message
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong'
                ], 500);
            }
        }
        

        public function commentOnPost(Request $request)
        {
            try {
                // Retrieve the data sent via AJAX
                $postId = $request->input('post_id');
                $userId = $request->input('user_id');
                $comment = $request->input('comment');
        
                // Save the comment
                Comment::create([
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'comments' => $comment
                ]);
        
                // Return a success response
                return response()->json([
                    'success' => true,
                    'message' => 'Comment added successfully!'
                ]);
            } catch (\Exception $e) {
                // Log any errors (optional)
                // \Log::error('Error adding comment: ' . $e->getMessage());
        
                // Return a failure response
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong'
                ], 500);
            }
        }

        public function getCounts($postId){
                $likeCount = Like::where('post_id', $postId)->count();
                $commentCount = Comment::where('post_id', $postId)->count();
                return response()->json([
                    'success' => true,
                    'likeCount' => $likeCount,
                    'commentCount' => $commentCount,
                ]);
        }

        public function getCommentsByPost($postId)
        {
            // Fetch the post by ID, or fail with a 404
            $post = Post::findOrFail($postId);
            
            // Load comments along with associated user data
            $comments = $post->comments()->with('user:id,email')->latest()->get(); // Only retrieve the necessary user data (email in this case)
            
            // Return the comments as JSON
            return response()->json([
                'success' => true,
                'comments' => $comments,
            ]);
        }

        public function hasLike($postId, $userId){
              // Check if the user has already liked the post
              $like = Like::where('post_id', $postId)
              ->where('user_id', $userId)
              ->first();

                // If the user already liked the post, remove the like
                if ($like) {
                    return response()->json([
                        'success' => true,
                    ]);
                }
        }
        
        

    }     
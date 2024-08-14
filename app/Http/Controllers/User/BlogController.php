<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function App\Helpers\getDeviceAndOSInfo;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if($request->search_blog) {
            if (session()->get('locale')=='en')
                $field = 'title_english';
            else
                $field = 'title_persian';

            $blogs = Blog::where($field, 'LIKE', '%' . $request->search_blog . '%')->get();
        }
        elseif ($request->tag){
            if (session()->get('locale')=='en')
                $field = 'name_english';
            else
                $field = 'name_persian';
            $blogs = Blog::with('tags')->whereHas('tags', function ($query) use ($request, $field) {
               $query->where($field,$request->tag);
            })->get();
        }
        else
            $blogs = Blog::all();

        return view('user.blog.index', compact('blogs'));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::with('comments', 'images', 'tags')->where('slug_english', $slug)
            ->orWhere('slug_persian', $slug)->first();

        $blogs = Blog::latest()->limit(3)->get();
        return view('user.blog.show', compact('blog','blogs'));
    }

    public function addToLikes(Request $request)
    {

        $userAgent = $request->header('User-Agent');
        $agent = getDeviceAndOSInfo($userAgent);

        $like = Like::create([
                'likeable_type' => Blog::class,
                'likeable_id' => $request->postId,
                'ip_address' => $request->ip(),
                'agent_system' => $agent['os'],
            ]);

        if($like)
            return response()->json(['success' => true], 200);
        else
            return response()->json(['success' => false],200);

    }

    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_fullname' => 'required|max:255|min:3',
            'email' => 'required|email',
            'comment' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            // Return validation errors as a JSON response
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $userAgent = $request->header('User-Agent');
        $agent = getDeviceAndOSInfo($userAgent);

        $comment = Comment::create([
            'commentable_id' => $request->blogId,
            'commentable_type' => Blog::class,
            'user_fullname' => $request->user_fullname,
            'email' => $request->email,
            'comment' => $request->comment,
            'ip_address' => $request->ip(),
            'user_agent' => $agent['os'],
        ]);

        if($comment)
            return response()->json(['success' => true], 200);
        else
            return response()->json(['success' => false],200);


    }
}

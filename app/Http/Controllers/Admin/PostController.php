<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {        
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $category = Category::where('status','1')->get();
        return view('admin.post.create',compact('category'));
    }

    public function store(PostFormRequest $request)
    {
        $fields = $request->validated();
        $posts = new Post;
        $posts->category_id = $request['category_id'];
        $posts->title = $fields['title'];
        $posts->slug = $fields['slug'];
        $posts->description = $fields['description'];
        $posts->article_date = $fields['article_date'];
        $posts->publish_date = $fields['publish_date'];
        $posts->author = $fields['author'];

        $folder = $fields['slug'];
        if( !is_dir(public_path().'/uploads/posts/'.$folder) ):
            File::makeDirectory(public_path().'/uploads/posts/'.$folder, $mode = 0777, TRUE, TRUE);
        endif;
        if( $request->hasFile('thumbnail') ):
            
            $destination = "uploads/posts/".$posts->slug.'/'.$posts->thumbnail;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('thumbnail');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/posts/'.$posts->slug.'/',$filename);
            $posts->thumbnail = $filename;

        endif;

        if( $request->hasFile('filename') ):
            $destination = "uploads/posts/".$posts->slug.'/'.$posts->filename;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/posts/'.$posts->slug.'/',$filename);
            $posts->filename = $filename;
        endif;


        $posts->meta_title = $fields['meta_title'];
        $posts->meta_description = $fields['meta_description'];
        $posts->meta_keyword = $fields['meta_keyword'];
        
        $posts->status = $request->status == true ? '1' : '0';
        $posts->created_by = Auth::user()->id;
    
        $posts->save();
        return redirect('/admin/posts')->with('status','Post added successfully');

    }

    public function edit($post_id)
    {
        $category = Category::where('status','1')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit',compact('post'),compact('category'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $fields = $request->validated();
        $post = Post::find($post_id);
        $post->category_id = $request['category_id'];
        $post->title = $fields['title'];
        $post->slug = $fields['slug'];
        $post->description = $fields['description'];
        $post->article_date = $fields['article_date'];
        $post->publish_date = $fields['publish_date'];
        $post->author = $fields['author'];

        if( $request->hasFile('thumbnail') ):
            
            $destination = "uploads/posts/".$post->slug.'/'.$post->thumbnail;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('thumbnail');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/posts/'.$post->slug.'/',$filename);
            $post->thumbnail = $filename;

        endif;

        if( $request->hasFile('filename') ):
            $destination = "uploads/posts/".$post->slug.'/'.$post->filename;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('filename');
            $filename = $file->getClientOriginalName();
            $file->move('uploads/posts/'.$post->slug.'/',$filename);
            $post->filename = $filename;
        endif;

        $post->meta_title = $fields['meta_title'];
        $post->meta_description = $fields['meta_description'];
        $post->meta_keyword = $fields['meta_keyword'];
        
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->update();
        return redirect('admin/posts')->with('status','Post Update Successfully');
    }
    
    public function destroy(Request $request)
    {
        $post = Post::find($request->post_delete_id);
        if($post){
            
            $destination = "uploads/posts/".$post->thumbnail;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $destination = "uploads/posts/".$post->filename;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $post->delete();
            return redirect('admin/posts')->with('status','Post has been deleted.');
        }else{
            return redirect('admin/posts')->with('status','No Post Found.');
        }
    }

}

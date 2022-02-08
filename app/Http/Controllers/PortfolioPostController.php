<?php

namespace App\Http\Controllers;

use App\Models\PortfolioPost;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
class PortfolioPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PortfolioPost::orderBy('created_at','DESC')->paginate(20);
        return view('admin.portfolio.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:portfolio_posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $post = PortfolioPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category_id,
            'published_at' => Carbon::now(),
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/PortfolioPost',$image_new_name);
            $post->image = '/storage/PortfolioPost/' . $image_new_name;
            $post->save();
        }


        Session::flash('success','Работа была успешно добавлена');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioPost  $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioPost $portfolioPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioPost $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = PortfolioPost::find($id);
       $categories = PortfolioCategory::all();
       return view('admin.portfolio.edit',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioPost  $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = PortfolioPost::find($id);
        $this->validate($request, [
            'title' => "required|unique:posts,title,$post->id",
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post',$image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }
        $post->save();

        Session::flash('success','Работа была успешно обновлена');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioPost  $portfolioPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PortfolioPost::find($id);
        if ($post) {
            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
            $post->delete();
        }
        Session::flash('success','Работа была успешно удалена');
        return redirect()->back();
    }
}

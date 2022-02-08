<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Faq;
use App\Models\PortfolioPost;
use App\Models\PortfolioCategory;
use Session;
class FrontendController extends Controller
{
    public function main(){
        $settings = Setting::first();
        $faqs = Faq::all();
        $posts = Post::orderBy('created_at','DESC')->take(7)->get();
        $portfolioPosts = PortfolioPost::all();
        return view('website.home',compact(['posts','settings','faqs','portfolioPosts']));
    }

    public function blog(){
        $posts = Post::orderBy('created_at','DESC')->paginate(6);
        $recentPosts = Post::orderBy('created_at','DESC')->take(2)->get();
        $categories = Category::all();
        return view('website.blog',compact(['posts','recentPosts','categories']));
    }

    public function post($slug){
        $recentPosts = Post::orderBy('created_at','DESC')->take(2)->get();
        $categories = Category::all();
        $post = Post::with('category','user')->where('slug',$slug)->first();

        $previousPost = Post::where('id', '<', $post->id)->max('id');
        $nextPost = Post::where('id', '>', $post->id)->min('id');

        if($nextPost){
            $next = Post::find($nextPost)->slug;
        }else {
            $next = null;
        }

        if($previousPost){
            $prev = Post::find($previousPost)->slug;
        }else {
            $prev = null;
        }

        if ($post){
            return view('website.single', compact(['post','next','prev','recentPosts','categories']));
        }else {
            return redirect('/');
        }
    }

    public function category($category){
        $category = Category::where('slug',$category)->first();
        $recentPosts = Post::orderBy('created_at','DESC')->take(2)->get();
        $categories = Category::all();
        $posts = Post::orderBy('created_at','DESC')->where('category_id',$category->id)->paginate(6);

        return view('website.category',compact(['category','categories','posts','recentPosts']));
    }

    public function portfolio(){
        $categories = PortfolioCategory::all();
        $posts = PortfolioPost::all();
        return view('website.portfolio',compact(['categories','posts']));
    }

    public function dashboard(){
        return view('admin.dashboard.index');
    }

    public function portfolio_single($slug){
        $category = PortfolioCategory::where('slug',$slug)->first();
        $post = PortfolioPost::where('slug',$slug)->first();

        $previousPost = PortfolioPost::where('id', '<', $post->id)->max('id');
        $nextPost = PortfolioPost::where('id', '>', $post->id)->min('id');

        if($nextPost){
            $next = PortfolioPost::find($nextPost)->slug;
        }else {
            $next = null;
        }

        if($previousPost){
            $prev = PortfolioPost::find($previousPost)->slug;
        }else {
            $prev = null;
        }

        if ($post){
            return view('website.portfolio-single', compact(['post','prev','next','category']));
        }else {
            return redirect('/');
        }
    }

    public function send_message(Request $request){
        $this->validate($request,[
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'message' => 'required|min:100',
            'subject' => 'required',
            'phone' => 'required|string|min:8|max:11'
        ]);
        $contact = Contact::create($request->all());

        Session::flash('message_send','Сообщение успешно отправлено!');
        return redirect()->back();
    }
}

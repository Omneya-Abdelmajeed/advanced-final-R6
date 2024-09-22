<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Topic;

class PublicController extends Controller
{
    public function index()
    {
        // Get the latest 3 published testimonials
        $testimonials = Testimonial::where('published', true)->latest()->take(3)->get();

        // Fetch the top 2 published topics ordered by highest number of views
        $topTopics = Topic::where('published', true)->orderBy('views', 'desc')->take(2)->get();
        $firstTopic = $topTopics->get(0) ?? null;
        $secondTopic = $topTopics->get(1) ?? null;

        //Fetch  categories with up to 3 published topics which have highest number of views each
        $categories = Category::with([
            'topics' => function ($query) {
                $query->where('published', true)->orderBy('views', 'desc')->take(3);
            }
        ])
            ->whereHas('topics', function ($query) {
                $query->where('published', true); // Ensure to show only categories with published topics
            })
        //->latest()
        //->limit(6) // limit to 6 categories
            ->get();
        // dd($categories);

        //Return view of index page with the retrieved data    
        return view('public.index', compact('testimonials', 'categories', 'firstTopic', 'secondTopic'));
    }

    public function contact()
    {
        //Show the contact-us page.
        return view('public.contact');
    }

    //Display a listing of all published testimonials.
    public function testimonial()
    {
        // Retrieve all published testimonials
        $testimonials = Testimonial::where('published', true)->get();

        // Return the testimonials view with the retrieved data
        return view('public.testimonials', compact('testimonials'));
    }

    //Show the details of a specific topic.
    public function detail(string $id)
    {
        // Retrieve a topic with its category by id or fail if not found
        $topic = Topic::with('category')->findOrFail($id);

        // Return the topic details view with the retrieved data
        return view('public.topics-detail', compact('topic'));
    }

    //Increment the view count for a specific topic.
    public function increment(string $id)
    {
        // Find the topic by id or fail if not found
        $topic = Topic::with('category')->findOrFail($id);

        // Increment view count for the topic here
        $topic->increment('views'); 

        // Redirect back to the topic details page
        return redirect()->route('detail', ['id' => $id]);
    }

    public function listing()
    {
        // Retrieve all published topics with pagination ordered from high to low number of views
        $topics = Topic::where('published', true)->orderBy('views', 'desc')->paginate(3);

        // Retrieve the top 2 trending topics which have highest number of views
        $trendTopics = Topic::where('published', true)->where('trending', true)->orderBy('views', 'desc')->take(2)->get();
        $firstTopic = $trendTopics->get(0) ?? null;
        $secondTopic = $trendTopics->get(1) ?? null;
        
        // Return the topics-listing view with the retrieved data
        return view('public.topics-listing', compact('topics', 'firstTopic', 'secondTopic'));
    }
}

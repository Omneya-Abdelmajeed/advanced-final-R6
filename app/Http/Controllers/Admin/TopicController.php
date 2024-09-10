<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use Common;
    /**
     * Display a listing of the topics.
     */
    public function index()
    {
        // Retrieve all topics along with their associated categories.
        $topics = Topic::with('category')->get();

        // Return the view with the list of all topics.
        return view('admin.topics', compact('topics'));
    }

    /**
     * Show the form for creating a new topic.
     */
    public function create()
    {
        // Retrieve all categories for the form.
        $categories = Category::select('id', 'categoryName')->get();

        // Return the view for creating a new topic with the list of categories.
        return view('admin.add_topic', compact('categories'));
    }

    /**
     * Store a newly created topic in database.
     */
    public function store(Request $request)
    {
        // Validate the requested data.
        $data = $request->validate([
            'topicTitle' => 'required|string|max:100',
            'content' => 'required|string',
            'trending' => 'boolean',
            'published' => 'boolean',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        // Handle the image upload.
        $data['image'] = $this->uploadFile($request->image, 'assets/images/topics');
        // Create a new topic using the validated data.
        Topic::create($data);

        // Redirect to the topics index page.
        return redirect()->route('admin.topics.index');
    }

    /**
     * Display the details of specific topic.
     */
    public function show(string $id)
    {
        // Find the topic by id along with its category or fail if not found.
        $topic = Topic::with('category')->findOrFail($id);

        // Return the view with the topic details.
        return view('admin.topic_details', compact('topic'));
    }

    /**
     * Show the form for editing the specified topic.
     */
    public function edit(string $id)
    {
        // Find the topic by id or fail if not found.
        $topic = Topic::findOrFail($id);

        // Retrieve all categories for the form.
        $categories = Category::select('id', 'categoryName')->get();

        // Return the view for editing the topic with the list of categories.
        return view('admin.edit_topic', compact('topic', 'categories'));
    }

    /**
     * Update the specified topic in database.
     */
    public function update(Request $request, string $id)
    {
        // Validate the requested data.
        $data = $request->validate([
            'topicTitle' => 'required|string|max:100',
            'content' => 'required|string',
            'trending' => 'boolean',
            'published' => 'boolean',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        // Handle the image upload if a new image is provided.
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/topics');
        }
        // Update the topic with the specified id.
        Topic::where('id', $id)->update($data);

        // Redirect to the topics index page.
        return redirect()->route('admin.topics.index');
    }

    /**
     * Remove the specified topic from database.
     */
    public function destroy(string $id)
    {
        // Delete the topic with the specified id.
        Topic::where('id', $id)->delete();

        // Redirect to the topics index page.
        return redirect()->route('admin.topics.index');
    }
}

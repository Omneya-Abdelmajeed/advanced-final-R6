<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the testimonials.
     */
    public function index()
    {
        // Retrieve all testimonials from the database.
        $testimonials = Testimonial::get();

        // Return the view with the list of all testimonials.
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        // Return the view for creating a new testimonial.
        return view('admin.add_testimonial');
    }

    /**
     * Store a newly created testimonial in database.
     */
    public function store(Request $request)
    {
        // Validate the requested data.
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'content' => 'required|string',
            'published' => 'boolean',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:5120',
        ]);

        // Handle the image upload.
        $data['image'] = $this->uploadFile($request->image, 'assets/images/testimonials');

        // Create a new testimonial using the validated data.
        Testimonial::create($data);

        // Redirect to the testimonials index page with a success message.
        return redirect()->route('admin.testimonials.index')->with('testimonial', 'A Testimonial is added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(string $id)
    {
        // Find the testimonial by id or fail if not found.
        $testimonial = Testimonial::findOrFail($id);

        // Return the view for editing the testimonial.
        return view('admin.edit_testimonial', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in database.
     */
    public function update(Request $request, string $id)
    {
        // Validate the requested data.
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'content' => 'required|string',
            'published' => 'boolean',
            'image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:5120',
        ]);
        // Handle the image upload if a new image is provided.
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/testimonials');
        }
        //dd($data);
        // Update the testimonial with the specified id.
        Testimonial::where('id', $id)->update($data);

        // Redirect to the testimonials index page.
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Remove the specified testimonial from database.
     */
    public function destroy(string $id)
    {
        // Delete the testimonial with the specified id.
        Testimonial::where('id', $id)->delete();

        // Redirect to the testimonials index page.
        return redirect()->route('admin.testimonials.index');
    }
}

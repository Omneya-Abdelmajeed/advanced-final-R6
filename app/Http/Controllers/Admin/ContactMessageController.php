<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactMessageController extends Controller
{
    // Display all messages
    public function index()
    {
        // Retrieve unread messages.
        $unreadMessages = Contact::where('is_read', false)->get();

        // Retrieve read messages.
        $readMessages = Contact::where('is_read', true)->get();

        // Return the view which contains all messages with unread and read messages.
        return view('admin.messages', compact('unreadMessages', 'readMessages'));
    }

    // Delete a specific message
    public function destroy(string $id)
    {
        // Delete the message with the specified id.
        Contact::where('id', $id)->delete();

        // Redirect to the message index page which contains all messages.
        return redirect()->route('admin.message.index');
    }

    //Show  details of specific message according to its id and mark it as read
    public function show(string $id)
    {
        // Find the message by id or fail if not found.
        $message = Contact::findOrFail($id);

        // Update the message status to 'read'.
        $message->update(['is_read' => true]);

        // Return the view with the message's details.
        return view('admin.message_details', compact('message'));
    }
}

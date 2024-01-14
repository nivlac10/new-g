<?php

namespace App\Http\Controllers;
use App\Models\Contact; // Import the Contact model at the top of your controller file
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display the Contact Us form
    public function index()
    {
        return view('user.contact'); // Replace 'contact.index' with your actual view name
    }

    // Handle form submission
    

    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'help_topic' => 'required|string',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'attachments' => 'file|mimes:docx,doc,pdf,jpg,jpeg,png|max:2048', // Adjust allowed file types and size as needed
            'user_email' => 'required|email',
            'user_id' => 'required|string',
        ]);

        // Store the form data in the contacts table
        $contact = new Contact();
        $contact->help_topic = $request->input('help_topic');
        $contact->subject = $request->input('subject');
        $contact->description = $request->input('description');
        $contact->user_email = $request->input('user_email');
        $contact->user_id = $request->input('user_id');

    // Handle file attachment if provided
        if ($request->hasFile('attachments')) {
            $attachmentPath = $request->file('attachments')->store('attachments', 'public');
            $contact->attachment = $attachmentPath;
        }

        $contact->save();

        // Redirect to a thank-you page or show a success message
        return redirect()->route('user.contactSubmit')->with('success', 'Thanks for reaching out! Your request has been submitted and we’ll be in touch shortly.');
    }


}

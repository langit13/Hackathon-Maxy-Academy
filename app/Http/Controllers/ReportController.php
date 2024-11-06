<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'classification' => 'required',
            'title' => 'required',
            'content' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'institution' => 'required',
            'attachment' => 'nullable|file|mimes:jpg,png,pdf|max:2048'
        ]);
    
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }
    
        Report::create([
            'user_id' => Auth::id(),
            'classification' => $request->classification,
            'title' => $request->title,
            'content' => $request->content,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'institution' => $request->institution,
            'attachment_path' => $attachmentPath, // Store the path to the file
        ]);
    
        return redirect()->back()->with('status', 'Report submitted successfully!');
    }
    
}

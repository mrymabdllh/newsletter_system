<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NewsletterController extends Controller
{
    /**
     * Display all newsletters (including soft-deleted).
     */
    public function index()
    {
        $newsletters = Newsletter::withTrashed()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.newsletter.index', compact('newsletters'));
    }

    /**
     * Show form to create a newsletter.
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }

    /**
     * Store a new newsletter (expires in 2 minutes).
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Newsletter::create([
            'title'      => $request->title,
            'content'    => $request->content,
            'expires_at' => Carbon::now()->addMinutes(2),
        ]);

        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter created successfully.');
    }

    /**
     * Show a single newsletter.
     */
    public function show($id)
    {
        $newsletter = Newsletter::withTrashed()->findOrFail($id);

        return view('admin.newsletter.show', compact('newsletter'));
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return view('admin.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update newsletter.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $newsletter = Newsletter::findOrFail($id);
        $newsletter->update($request->only('title', 'content'));

        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter updated successfully.');
    }

    /**
     * Soft delete newsletter.
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter deleted (can be restored).');
    }

    /**
     * Restore soft-deleted newsletter and extend expiry.
     */
    public function restore($id)
    {
        $newsletter = Newsletter::withTrashed()->findOrFail($id);

        $newsletter->restore();
        $newsletter->expires_at = Carbon::now()->addMinutes(2);
        $newsletter->save();

        return redirect()
            ->route('newsletters.index')
            ->with('success', 'Newsletter restored for 2 more minutes.');
    }

        /**
     * Public view – show active, non-expired newsletters
     */
    public function publicIndex()
    {
        $newsletters = Newsletter::whereNull('deleted_at')
            ->where('expires_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.newsletters', compact('newsletters'));
    }
}





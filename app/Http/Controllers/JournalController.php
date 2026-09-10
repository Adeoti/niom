<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::published()
            ->orderByDesc('year')
            ->orderByDesc('sort_order')
            ->orderByDesc('published_at')
            ->get();

        return view('journals.index', compact('journals'));
    }

    public function download(Journal $journal)
    {
        abort_unless(
            $journal->is_published &&
            (! $journal->published_at || $journal->published_at->isPast()),
            404
        );

        abort_unless(
            Storage::disk('public')->exists($journal->pdf_path),
            404
        );

        return Storage::disk('public')->download(
            $journal->pdf_path,
            str($journal->name)
                ->slug()
                ->append('-', $journal->year)
                ->append('.pdf')
                ->toString()
        );
    }
}
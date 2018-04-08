<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Election;

class ElectionResultsController extends Controller
{
    public function index()
    {
        return view('election-results.index', [
            'elections' => Election::all()
        ]);
    }

    public function show($id)
    {
        $election = Election::findOrFail($id);
        $electionOver = false;
        $now = new \DateTime;
        $pollOptions = $election->pollOptions()->withCount('votes')->orderBy('votes_count', 'desc')->get();
        $pollResults = [];

        if ($election->end_date && new \DateTime($election->end_date) < $now) {
            $electionOver = true;
        }

        foreach($pollOptions as $pollOption) {
            $pollResults[] = [
                'votes' => $pollOption->votes->count(),
                'text' => $pollOption->text
            ] ;
        }

        return view('election-results.show', [
            'election' => $election,
            'electionOver' => $electionOver,
            'pollResults' => $pollResults
        ]);
    }
}

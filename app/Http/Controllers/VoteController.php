<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\ElectionPollOption;
use App\VoteCode;
use App\Vote;

class VoteController extends Controller
{
    /**
     * Display the specified voting form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $electionSlug)
    {
        $election = Election::where('slug', $electionSlug)->first();

        $isValid = true;
        $statusMessage = 'Good to go!';

        if (!$election) {
            return view('errors.404');
        }

        $now = new \DateTime;

        if ($election->start_date && new \DateTime($election->start_date) > $now) {
            $isValid = false;
            $statusMessage = 'This election has yet to begin';
        }

        if ($election->end_date && new \DateTime($election->end_date) < $now) {
            $isValid = false;
            $statusMessage = 'This election has already ended';
        }

        $requestVoteCode = $request->input('code');
        $voteCode = VoteCode::where('text', $requestVoteCode)->first();

        if (!$voteCode) {
            $isValid = false;
            $statusMessage = 'Invalid vote code!';
        } elseif ($voteCode->vote) {
            $isValid = false;
            $statusMessage = 'Vote code already used!';
        } elseif (!$voteCode->election || $voteCode->election->id !== $election->id) {
            $isValid = false;
            $statusMessage = 'Vote code is for a different election!';
        }

        return view('vote.index', [
            'election' => $election,
            'voteCode' => $requestVoteCode,
            'isValid' => $isValid,
            'statusMessage' => $statusMessage,
            'pollOptions' => $election->pollOptions
        ]);
    }

    /**
     * Store the casted vote.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestElectionId = $request->input('electionId');
        $election = Election::find($requestElectionId);

        if (!$election) {
            abort(400, 'Unknown election ID');
        }

        $now = new \DateTime;

        if ($election->start_date && new \DateTime($election->start_date) > $now) {
            abort(400, 'Election has yet to begin');
        }

        if ($election->end_date && new \DateTime($election->end_date) < $now) {
            abort(400, 'Election has already ended');
        }

        $requestPollOptionId = $request->input('pollOptionId');
        $pollOption = ElectionPollOption::find($requestPollOptionId);

        if (!$pollOption) {
            abort(400, 'Unknown poll option ID');
        }

        if (!$pollOption->election || $pollOption->election->id !== $election->id) {
            abort(400, 'Specifiied poll option exists but is not a valid selection for this election');
        }

        $voteCode = VoteCode::where('text', $request->input('voteCode'))->first();

        if (!$voteCode) {
            abort(403, 'Invalid vote code');
        }

        if ($voteCode->vote) {
            abort(403, 'Vote code already used');
        }

        // At this point, the request has been validated

        $vote = new Vote;
        $vote->voteCode()->associate($voteCode);
        $vote->pollOption()->associate($pollOption);

        $vote->save();

        return view('vote.success', [
            'election' => $election,
            'selectedPollOption' => $pollOption
        ]);
    }
}

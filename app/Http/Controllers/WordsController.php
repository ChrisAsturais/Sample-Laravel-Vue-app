<?php

namespace App\Http\Controllers;

use App\Http\Requests\WordsRequest;
use App\Http\Resources\PreviousSearchesResource;
use App\Models\PreviousSearches;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function words(WordsRequest $request) {
        $previousSearches = new PreviousSearches;
        $previousSearches->fill($request->prepared());
        $previousSearches->save();
    }

    public function getWords(Request $request) {
        return PreviousSearchesResource::collection(PreviousSearches::search($request)->latest()->paginate(4));
    }
}

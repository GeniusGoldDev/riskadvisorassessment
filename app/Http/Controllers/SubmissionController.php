<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Request $request)
	{
		return response()->json(['status' => true, 'data' => Submission::with(['products', 'consumer'])->orderByDesc('created_at')->get()]);
	}
}

<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Consumer;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Requests\CreateConsumerRequest;
use App\Http\Requests\UpdateConsumerAddressRequest;

class ConsumerController extends Controller
{
    public function index(Request $request)
	{
		return response()->json(['status' => true, 'data' => Consumer::all()]);
	}

    public function consumerForm(Request $request)
	{
        return Inertia::render('ConsumerForm/Index');
    }

    public function store(CreateConsumerRequest $request)
	{
        //Find existing customer with email
        $consumer = Consumer::where('email', $request->email)->first();

        if(!$consumer){
                // Create a new consumer
                $consumer = Consumer::create($request->validated());
        }
       
        // Create a submission entry for the consumer
        $submission = $consumer->submissions()->create();

        // Return the response with the consumer and the newly created submission
        return response()->json(['status' => true, 'data' => ['consumer' => $consumer, 'submission' => $submission]], 201);
	}

    public function updateAddress(UpdateConsumerAddressRequest $request, $consumer_id)
	{
        // Find the consumer by ID
        $consumer = Consumer::findOrFail($consumer_id);
        
        // Update the consumer's address with the validated data
        $consumer->update($request->validated());

         // Fetch the updated consumer again to include any changes made by the update
        $updatedConsumer = Consumer::find($consumer_id);

        // Return the response with the updated consumer data
        return response()->json(['status' => true, 'data' => $updatedConsumer], 200);

	}

    public function storeProducts(Request $request)
	{
        //Find existing submission with submission ID
        $submission = Submission::findOrFail($request->submission_id);
        $productIds = $request->product_ids;

        // Sync productids with submission
        $submission->products()->sync($productIds);

         // update the form has been completed
         $submission->form_completed = 'yes';
         $submission->save();


        return response()->json(['status' => true, 'message' => "Operation Successful"], 201);
	}

}

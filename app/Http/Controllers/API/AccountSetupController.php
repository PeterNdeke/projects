<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountSetupController extends Controller
{
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'industry' => 'required',
            'jobrole' => 'required',
            'company' => 'required',
            'plan' => 'required',
            'interest' => 'required',
            'image' => 'required',
            'jobtitle' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $plan = $request->plan;

        if ($plan === 'Standard') {
            $interst = $request->interest;
            $user = auth('api')->id();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $media = User::find($user);
                $media->addMedia($file)

                    ->toMediaCollection('images');

            }
            User::where('id', auth('api')->id())

                ->update([
                    'industry' => $request->industry,
                    'job_role' => $request->jobrole,
                    'jobtitle' => $request->jobtitle,
                    'level' => $request->level,
                    'employer' => $request->company,
                    'imageUrl' => $file,
                    'plan' => $request->plan,
                ]);

            foreach ($interst as $value) {
                $request->user()->interests()->create([
                    'interest' => $value,

                ]);

            }
            return response()->json(['message' => 'Account Updated']);
        }

        if ($plan === 'Premium') {
            $user = auth('api')->id();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $media = User::find($user);
                $media->addMedia($file)

                    ->toMediaCollection('images');

            }
            $arrayinterest = $request->interest;
            $interest = implode(',', $arrayinterest);
            $industry = $request->industry;
            $job = $request->job;
            $employer = $request->company;
            return view('paypal', compact('plan', 'interest', 'industry', 'employer', 'file', 'job'));
        }

    }
}

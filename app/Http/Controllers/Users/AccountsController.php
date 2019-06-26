<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function setup(Request $request)
    {

        $this->validate($request, [
            'industry' => 'required',
            'jobrole' => 'required',
            'company' => 'required',
            'plan' => 'required',
            'interest' => 'required',
            'image' => 'required',
            'jobtitle' => 'required',

        ]);

        $plan = $request->plan;

        if ($plan === 'Standard') {
            $interst = $request->interest;
            $user = Auth::user()->id;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $media = User::find($user);
                $media->addMedia($file)

                    ->toMediaCollection('images');

            }
            User::where('id', auth()->id())

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
            return redirect('/feed')->with([
                'flash_message' => 'you have successfully updated your account, Thank you',
            ]);
        }

        if ($plan === 'Premium') {
            $user = Auth::user()->id;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $media = User::find($user);
                $media->addMedia($file)

                    ->toMediaCollection('images');

            }
            $arrayinterest = $request->interest;
            $interest = implode(',', $arrayinterest);
            $industry = $request->industry;
            $job = $request->jobrole;

            $jobtitle = $request->jobtitle;
            $level = $request->level;

            $employer = $request->company;
            return view('paypal', compact('plan', 'jobtitle', 'level', 'interest', 'industry', 'employer', 'file', 'job'));
        }

    }
}

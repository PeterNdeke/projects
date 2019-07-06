<?php

namespace App\Http\Controllers\TimeLime;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Experience;
use App\Education;
use App\Skill;
use App\Overview;
use App\Location;
use App\Post;
use App\Interest;
use App\Friendship;
use App\ViewedProfile;
use App\PeopleWhoViewedProfile;

class TimeLimeController extends Controller
{
    public function index(User $user)
    {
        $profiles = array();
        $overview = Overview::where('user_id', $user->id)->first();
        if (auth()->id()!=$user->id) {
            $this->saveProfile($user->username);
        }
    // dd($this->ViewedFriends());
        $countView = PeopleWhoViewedProfile::where('username',$user->username)->count();
        $viewedProfiles = $this->ViewedFriends();
       
        $experience = Experience::where('user_id', $user->id)->get();
        $skill = Skill::where('user_id', $user->id)->get();
        $location = Location::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->get();
        $interest = Interest::where('user_id', $user->id)->get();
        $connectionCount = count($this->countConnections(auth()->id()));
        $postCount = Post::where('user_id', auth()->id())->count();
        $connectionCount1 = count($this->countConnections($user->id));
        $postCount1 = Post::where('user_id', $user->id)->count();
        if(auth()->id() === $user->id){
            return view('timeline.index', compact('user','connectionCount','postCount','viewedProfiles'));
        }

         return view('timeline.profile', compact('user','connectionCount1','countView','viewedProfiles','postCount1','overview','experience','skill','location','education','interest'));
        

    }
    public function follow1(Request $request)
    {
        $follow = $request->user()->following()->attach($request->id);

        return response()->json([
            'data' => 'successfull',
        ]);

    }
    public function getRequest($id)
    {
        $data = DB::table('follows')->where('user_id', auth()->id())->where('follower_id', $id)->count();
        return (bool) response()->json(['data' => $data]);
    }
    public function follow(Request $request, User $user)
    {

        if ($request->user()->canFollow($user)) {
            $request->user()->following()->attach($user->id);
        }

        return redirect()->back();

    }
    public function unfollow(Request $request, User $user)
    {

        if ($request->user()->canUnFollow($user)) {
            $request->user()->following()->detach($user->id);
        }

        return redirect()->back();

    }

    private function countConnections($userID)
    {
        $friends = array();

        $query = Friendship::where('user_requested', $userID)
            ->orWhere('requester', $userID)
            ->where('status', 1)
            ->get();
        foreach ($query as $friend):
            if ($friend->user_requested !== $userID) {
                $friends[] = $friend->user_requested;
            }

            if ($friend->requester !== $userID) {
                $friends[] = $friend->requester;
            }

        endforeach;

        return $friends;

    }
    public function getUser($userID)
    {
        return User::find($userID);

    }

    private function countViewProfile($id)
    {
        $count = PeopleWhoViewedProfile::where('viewed_profile_id', $id)->count();

        return $count;
    }

    private function ViewedFriends()
    {
      // $user = array();
       $profiles = array();
        $viewedProfiles = ViewedProfile::where('username', '!=', Auth::user()->username)
        ->orderByRaw('RAND()')
        ->take(10)->get();
      // dd($viewedProfiles);
      
        foreach ($viewedProfiles as  $value) {
            $id = $value->user->id;
            $friends = $this->countConnections(auth()->id());

            $count = $this->countViewProfile($id);
            //dd($friends);
            
            
                if (!in_array($id, $friends)) {
                    // $user[] = $this->getUser($friend);
                     array_push($profiles, $this->getUser($id));
                    
                 }
        }
       

        

        return $profiles;

             
               
       

    }


    public function createOverview(Request $request)
    {
        $this->validate($request,[
            'overview'=> 'required'
        ]);
        $overview = $request->user()->overview()->create([
            'overview' => $request->overview,
        ]);

        return response()->json($overview);
    }

    public function createEducation(Request $request)
    {
        $this->validate($request, [
            'degree'=>'required',
            'school'=> 'required',
            'date_from'=> 'required',
            'date_to'=> 'required',
            
        ]);
        $education = $request->user()->education()->create([
            'degree' => $request->degree,
            'description' => $request->description,
            'school' => $request->school,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        return response()->json($education);

    }

    public function createExperience(Request $request)
    {
        $this->validate($request, [
            'job_role' => 'required',
            'company' => 'required',
            'subject' => 'required',
            'experience' => 'required',
            'date_from' => 'required',
            'location' => 'required',
        ]);
        $experience = $request->user()->experiences()->create([
            'job_role' => $request->job_role,
            'company' => $request->company,
            'subject' => $request->subject,
            'experience' => $request->experience,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'location' => $request->location,

        ]);

        return response()->json($experience);
    }
    public function createLocation(Request $request)
    {
        $this->validate($request,[
            'city' => 'required',
            'country'=>'required'
        ]);
        $location = $request->user()->location()->create([
            'city' => $request->city,
            'country' => $request->country,

        ]);

        return response()->json($location);
    }

    public function createSkills(Request $request)
    {
        $this->validate($request, [
            'skill'=>'required'
        ]);
        
            $skills = $request->user()->skills()->create([
                'skill' => $request->skill,
            ]);
        

        return response()->json($skills);
    }

    public function getOverview()
    {
        $overview = Auth::user()->overview;

        return $overview;
    }

    public function getExperience()
    {
        $overview = Auth::user()->experiences()->get();

        return $overview;
    }

    public function getEducation()
    {
        $education = Auth::user()->education()->get();
        return $education;
    }

    public function getLocation()
    {
        $location = Auth::user()->location;
        return $location;
    }

    public function getSkills()
    {
        $skills = Auth::user()->skills()->get();
        return $skills;
    }
    public function removeSkill($id){
        $skil = Skill::findOrFail($id);
        // delete the user
        $skil->delete();
        return ['message' => 'skill Deleted'];
    }

    public function getActivity()
    {  
        $feed = array();
        foreach(Auth::user()->posts as $post):
            array_push($feed, $post);
        endforeach;

        foreach ($feed as $post) {
            $post['comments'] = $post->getThreadedComments();
            $post['commentscount'] = $post->comments()->count();
        }

        usort($feed, function($p1, $p2){
            return $p1->id > $p2->id;
         });

        return response()->json([
            'data'=>$feed

        ]);
    }

    public function updateExperience(Request $request,$id)
    {
        $experience = Experience::findOrFail($id);
        $this->validate($request, [
            'job_role' => 'required',
            'company' => 'required',
            'subject' => 'required',
            'experience' => 'required',
            'date_from' => 'required',
            'location' => 'required',

        ]);
        $experience->update($request->all());
        // $user->update($request->all());
        return response()->json(['data' => $experience]);
        
    }
    public function updateEducation(Request $request,$id)
    {
        $education = Education::findOrFail($id);
        $this->validate($request, [
            'degree'=>'required',
            'school'=> 'required',
            'date_from'=> 'required',
            'date_to'=> 'required',

        ]);
        $education->update($request->all());
        // $user->update($request->all());
        return response()->json(['data' => $education]);
        
    }
    public function getUserActivity($id)
    {  
        $feed = array();
        $posts = Post::where('user_id', $id)->get();
        foreach($posts as $post):
            array_push($feed, $post);
        endforeach;

        foreach ($feed as $post) {
            $post['comments'] = $post->getThreadedComments();
            $post['commentscount'] = $post->comments()->count();
        }

        usort($feed, function($p1, $p2){
            return $p1->id > $p2->id;
         });

        return response()->json([
            'data'=>$feed

        ]);
    }

    private function  saveViewedProfile($username)
    {
        $profile = new ViewedProfile();
        $profile->username = $username;
        $profile->save();
        return $profile;
    }
    private function saveProfile($username)
      {

         $view = ViewedProfile::where('username',$username)->first();
        
         $checkExisting = ViewedProfile::where('username',$username)->count();
         if($checkExisting==0){
            $profile = new ViewedProfile();
            $profile->username = $username;
            $profile->save();
            $profile->peopleWhoViewedProfile()->create([
              'viewed_by' => auth()->id()
            ]);
            return $profile;
       
         }  else {

              return $view->peopleWhoViewedProfile()->create([
                'viewed_by' => auth()->id(),
                'username' => $username
              ]);
             
         }
      }
}

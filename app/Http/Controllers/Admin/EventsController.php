<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private static $folder = 'admin.events.';
    private static $link = 'admin/events';
    private static $mainTitle = "Events";
    private static $flash_message = 'Events saved successfully';
    public function index()
    {
        $events = Post::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        return view(self::$folder . 'index', compact('events'))->withTitle(self::$mainTitle)->with('link', self::$link);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::$folder . 'add')->withTitle(self::$mainTitle)->with('link', self::$link);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'event' => 'required',

        ]);

        $event = $request->input('event');
        $dom = new \DomDocument();
        $dom->loadHtml($event, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        // $event = $dom->saveHTML();

        foreach ($images as $k => $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "/images/$filename.$mimetype";
                Image::make($src)->encode($mimetype, 100)
                    ->save(public_path($filepath));
                // $path = public_path() . $filepath;
                //file_put_contents($path, $src);

                // Storage::disk('public')->putFile('img', $filepath);

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif

        }
        $createdPost = auth()->user()->posts()->create([
            'content' => $dom->saveHTML(),
            'post_type' => 'Event',
        ]);
        $createdPost->postFiles()->create([

            'file' => $filepath,
        ]);
        return redirect(self::$link)->with([
            'flash_message' => self::$flash_message,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Post::find($id);
        return view(self::$folder . 'edit', compact('event'))->with('link', self::$link)->withTitle('Edit Event');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $course = Post::findOrFail($id);
        $this->validate($request, [
            'event' => 'required',

        ]);
        $event = $request->input('event');
        $dom = new \DomDocument();
        $dom->loadHtml($event, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        // $event = $dom->saveHTML();

        foreach ($images as $k => $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "/images/$filename.$mimetype";
                Image::make($src)->encode($mimetype, 100)
                    ->save(public_path($filepath));

                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif

        }
        $course->content = $dom->saveHTML();
        $course->update();

        return redirect(self::$link)->with([
            'flash_message' => 'Event Updated Successfully',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::findOrFail($id);
        $model->delete();
        return redirect(self::$link);
    }
}

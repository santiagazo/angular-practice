<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use App\Http\Requests;
use App\Fireteam;
use App\Document;
use App\User;
use Response;
use Session;
use Image;
use Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('media', ['only' => ['getFirstmedia', 'getMediacollection']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $documents = Document::groupBy('collection')->get();

        return view('documents/index')
        ->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('documents/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(DocumentRequest $request)
    {
        if($request->title && !$request->file){
            $document = Session::put(['title' => $request->title ?: NULL, 'description' => $request->description ?: NULL]);

            return json_encode('success');
        }

        $title = Session::pull('title');
        $description = Session::pull('description');

        $file = $request->file;
        $fileMime = $file->getClientOriginalExtension();
        $name = str_slug($title);
        $description = $description ?: NULL;
        $path = '../storage/app/documents/tmp';
        $collection = Auth::id().'-'.str_random(30);

        if($fileMime == 'pdf'){

            // increase timeout on server for really big files.
            ini_set('default_socket_timeout', 900); // 900 Seconds = 15 Minutes
            ini_set('upload_max_filesize', '30M');
            ini_set('post_max_size', '30M');
            ini_set('max_input_time', 900);
            ini_set('max_execution_time', 900);

            $pdf = new Pdf($file);

            // --------------get the total number of pages-----------------
            $pdfcontent = file_get_contents($file, NULL, NULL, 0, 300);
            preg_match("~Linearized.*?\/N ([0-9]+)~s", $pdfcontent, $pages);
            $totalNumberOfPages = isset($pages[1]) ? $pages[1] : 1;
            // ------------------------------------------------------

            $pdf_token = bcrypt(str_random(30).Auth::id());

            if(isset($totalNumberOfPages)){
                foreach (range(1, $totalNumberOfPages) as $pageNumber) {
                    $pdfPngName = $name.$pageNumber.'.png';
                    $pdfPngPath = $path.'/'.$pdfPngName;
                    $pdf->setPage($pageNumber)
                    ->saveImage($pdfPngPath);
                    $document = $this->documentCreate($pdfPngName, $description, $collection);
                    $document->addMedia($pdfPngPath)->usingFileName($pdfPngName)->toCollection($collection);
                    File::delete($pdfPngPath);
                }
            }

        }else{
            $pdfPngName = $name.'.png';

            $image = Image::make($file);
            $image->save($path.'/'.$pdfPngName);

            $document = $this->documentCreate($pdfPngName, $description, $collection);
            $document->addMedia($path.'/'.$pdfPngName)->usingFileName($pdfPngName)->toCollection($collection);

            File::delete($path.'/'.$pdfPngName);
        }

        return json_encode(['collection' => $collection, 'totalNumberOfPages' => $totalNumberOfPages, 'name' => $name]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($collection)
    {
        $documents = Document::where('collection', $collection)->get();

        return view('documents.show')
        ->with('documents', $documents);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($collection)
    {
        $documents = Document::where('collection', $collection)->paginate(1);
        $allDocuments = Document::where('collection', $collection)->get();
        return view('documents.edit')
        ->with('documents', $documents)
        ->with('allDocuments', $allDocuments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy(DocumentRequest $request)
    {
        $collection = $request->collection ?: NULL;

        $documents = Document::where('collection', $collection)->get();

        $documents->clearMediaCollection($collection);

        $documents->delete();

    }

    public function getFirstmedia($collection)
    {
        $document = Document::where('collection', $collection)->first();
        $mediaItems = $document->getMedia();
        $file = response()->file($mediaItems[0]->getPath());

        return $file;
    }

    public function getMediacollection($collection, $document_id)
    {
        $document = Document::where('id', $document_id)->where('collection', $collection)->first();
        $mediaItems = $document->getMedia();
        $file = response()->file($mediaItems[0]->getPath());

        return $file;
    }

    public function getFireteamselectlist(Request $request){

        $q = $request->q ?: NULL;

        if(empty($q)){
            return response(['msg' => 'Hmmm. Something went wrong. Please refresh the page and try again.'], 422);
        }

        $fireteam = Fireteam::where('title', 'LIKE', '%'.$q.'%')
        ->with('users')
        ->with('leader')
        ->paginate(30);

        return json_encode($fireteam);

    }

    public function getFireteammembers(Request $request)
    {
        $q = $request->q ?: NULL;
        $usersArray = $request->usersArray ?: NULL;

        if(empty($q) || empty($usersArray)){
            return response(['msg' => 'Hmmm. Something went wrong. Please refresh the page and try again.'], 422);
        }

        $users = User::where('name', 'LIKE',  '%'.$q.'%')
        ->with('roles')
        ->whereIn('id', $usersArray)
        ->paginate(30);

        return json_encode($users);
    }

    protected function documentCreate($pngName, $description, $collection)
    {
            $document = Document::create([
                'user_id' => Auth::id(),
                'priority_id' => 4,
                'title' => $pngName,
                'slug' => str_slug($pngName),
                'collection' => $collection,
                'description' => $description ?: NULL
            ]);

            return $document;
    }

}

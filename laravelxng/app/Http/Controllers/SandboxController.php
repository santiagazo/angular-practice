<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Spatie\PdfToImage\Pdf;
use Image;
use Auth;
use App\Document;
use Illuminate\Support\Facades\File;

class SandboxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
    	return view('sandbox/index');
    }

    public function postStore(Request $request)
    {
    	if(!$request->hasFile('file')){
    		return json_encode('The file upload has failed. Try refreshing the page.');
    	}

        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $fileMime = $file->getClientOriginalExtension();
        $name = str_slug(pathinfo($fileName, PATHINFO_FILENAME));
        $pngName = $name.'.png';
        $path = 'documents/'.Auth::id().'/'.str_slug(str_random());
        $destinationPath = public_path($path);
        $publicPath = $path.'/'.$pngName;
        File::makeDirectory($path, 0775, true);

        if($fileMime == 'pdf'){

            // increase timeout on server for really big files.
            ini_set('default_socket_timeout', 900); // 900 Seconds = 15 Minutes
            ini_set('upload_max_filesize', '30M');
            ini_set('post_max_size', '30M');
            ini_set('max_input_time', 900);
            ini_set('max_execution_time', 900);


            $file = $file->move($path, $fileName);
            $pdf = new Pdf($file);

            $pdfcontent = file_get_contents($file, NULL, NULL, 0, 300);
            preg_match("~Linearized.*?\/N ([0-9]+)~s", $pdfcontent, $pages);
            $pdf_token = bcrypt(str_random(30).Auth::id());
            if(isset($pages[1])){
                foreach (range(1, $pages[1]) as $pageNumber) {
                    $pdfPngName = $name.$pageNumber.'.png';
                    $pdfPngPath = $path.'/'.$pdfPngName;
                    $pdf->setPage($pageNumber)
                    ->saveImage($pdfPngPath);
                    $this->documentCreate($pdfPngName, $pdfPngPath, $pdf_token);
                }
            }


        }else{
            $image = Image::make($file);
            $image->save($destinationPath.'/'.$pngName);

            $document = $this->documentCreate($pngName, $publicPath, $pdf_token);
        }


        return $pdf_token;

    }

    public function getSignatureforms(Request $request)
    {
        $document = Document::where('hash', $request->hash)->first();

        if(empty($document)){
            return json_encode("Sorry, There was no document found.");
        }

        return json_encode($document);
    }


    public function getPdf()
    {
        $pdf = new Pdf('documents/1/voe2bvyo7yxq4shp/tester.pdf');
        $savedPDF = $pdf->saveImage('documents/1/voe2bvyo7yxq4shp/page.png');

        return view('sandbox/image');
    }

    protected function documentCreate($pngName, $description)
    {
            $document = Document::create([
                'user_id' => Auth::id(),
                'priority_id' => 4,
                'title' => $pngName,
                'slug' => str_slug($pngName),
                'description' => $description ?: NULL
            ]);

            return $document;
    }

    public function getMediaupload()
    {
        return view('sandbox.mediaupload');
    }


    public function postPdf(Request $request)
    {
        $file = $request->file;
        $fileMime = $file->getClientOriginalExtension();
        $name = str_slug($request->title);
        $description = NULL;
        $path = '../storage/app/documents/tmp';

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
                    $document = $this->documentCreate($pdfPngName, $description);
                    $document->addMedia($pdfPngPath)->usingFileName($pdfPngName)->toMediaLibrary();
                    File::delete($pdfPngPath);
                }
            }

        }else{
            dd('Why am i processing an image?');
            // $image = Image::make($file);
            // $image->save($destinationPath.'/'.$pngName);

            // $document = $this->documentCreate($pngName, $publicPath, $pdf_token);
        }

        return view('sandbox.image');
    }

    public function getMedia($id = 138)
    {
        $documents = Document::findOrFail($id);

        $mediaItems = $documents->getMedia();

        $file = response()->file($mediaItems[0]->getPath());

        $fullPathOnDisk = $mediaItems[0]->getPath();
        $name = $mediaItems[0]->name;

        return $file;
    }

}



<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\AbstractFilepond;
use RahulHaque\Filepond\Facades\Filepond;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*** Get All Files ***/
        $files = DB::table('files')->get();
        return view('app', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**** Get The File Info Like [id ,filename, filepath "in temp folder" , filesize , extension ] ****/

        $fileInfo = Filepond::field($request->file);

        /**** Get The File Name With Extension****/

        $name = $fileInfo->getModel()->filename;

        /**** Get The File Size ****/

        /** Kindly note that the filepond not included the size i have edit the package to get the files size **/

        $file_size = $fileInfo->getModel()->filesize;

        /**** Get The File Name Without Extension****/

        $name_witout_extesion = substr($fileInfo->getModel()->filename, 0, strrpos($fileInfo->getModel()->filename, "."));

        /**** Move The File From Temp to Uploaded Folder In Public Folder Please Find Disks in Filesystem ****/

        $fileInfo->moveTo($name_witout_extesion, 'uploaded');

        /**** Store The File Details In The DB ****/

        $file = new File;
        $file->name = $name;
        $file->size = $file_size;
        $file->save();

        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        /**** Get The File And Delete It ****/

        $fileContent = Storage::disk('uploaded')->delete($file->name);

        /**** Delete The File From The DB ****/

        $file->delete();

        return redirect()->route('files.index');
    }

    public function encrypt(Request $request, File $file)
    {

        /****Get The File Before Operation ****/

        $fileContent = Storage::disk('uploaded')->get($file->name);

        /**** Encrypt ****/

        $encrypt = encrypt($fileContent);

        /**** Replace The File ****/

        Storage::disk('uploaded')->put($file->name, $encrypt);

        /*****Update The File Status*****/

        $update_status = DB::table('files')
            ->where('id', $file->id)
            ->update(['status' => File::Encrypted]);


        return redirect()->route('files.index');
    }

    public function decrypt(Request $request, File $file)
    {

        /****Get The File Before Operation ****/

        $fileContent = Storage::disk('uploaded')->get($file->name);

        /**** Decrypt ****/

        $decrypted_file = decrypt($fileContent);

        /**** Replace The File ****/

        Storage::disk('uploaded')->put($file->name, $decrypted_file);


        /*****Update The File Status*****/

        $update_status = DB::table('files')
            ->where('id', $file->id)
            ->update(['status' => File::Decrypted]);

        return redirect()->route('files.index');
    }
}

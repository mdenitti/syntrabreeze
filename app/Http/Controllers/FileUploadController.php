<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Auth;

class FileUploadController extends Controller
{
    public function store(Request $request)
       {
           // Validate the uploaded file (more on this later)
           $request->validate([
               'my_file' => 'required|file|max:2048', // Example: max 2MB file
           ]);
   
           // Store the file
           $path = $request->file('my_file')->store('uploads'); // Store in 'storage/app/uploads' 
   
           // Optional: Store file details in the database
           // ...
           
           // store to files table using the create method and also store the current logged in user id;
           Files::create([
               'filename' => $path,
               'user_id' => Auth::user()->id,
           ]);
           
           return redirect()->back()->with('success', 'File uploaded successfully!'); 
       }
}

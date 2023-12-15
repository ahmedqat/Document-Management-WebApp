<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditDocumentRequest;
use App\Http\Requests\UploadDocumentRequest;
use App\Models\Department;
use App\Models\Document;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    //

    //shows the documents and takes two variable the current department and its documents.

    public function index(Department $department)
    {
        $documents = $department->documents()->paginate(10);

        return view('documents.index', compact('documents', 'department'));
    }


    //Upload a new Document

    public function upload(Department $department, UploadDocumentRequest $request)
    {

        $departmentID = $request->input('department_id');

        //dd($departmentID);
        if (!Auth::user()->can("modify_$departmentID")) {
            return redirect()->back()->with('error', "You don't have permission to modify this department.");
        }


        $formFields = $request->validated();





        //Append with original file name

        $file = $request->file('path');
        $originalFileName = $file->getClientOriginalName();

        $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $formFields['path'] = $file->storeAs('docs', $newFileName, 'public');

        $formFields['file_name'] = $originalFileName;


        Document::create($formFields);



        return redirect()->back()->with('success','Added Document Successfully.');
    }



    //Update document info

    public function update(Request $request, Document $document)
    {
        $departmentID = $request->input('department_id');

        // Check permission
        if (!Auth::user()->can("modify_$departmentID")) {
            return redirect()->back()->with('error', "You don't have permission to modify this department.");
        }

        // Validate form fields
        $formFields = $request->validateWithBag('update', [
            'edit_title' => 'required',
            'edit_description' => 'required',
            //'path' => 'nullable|file|mimes:pdf,doc,docx', // Adjust file types as needed
        ]);

        // Update document
        $document->title = $formFields['edit_title'];
        $document->description = $formFields['edit_description'];

        // Update file if provided
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $originalFileName = $file->getClientOriginalName();
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $formFields['path'] = $file->storeAs('docs', $newFileName, 'public');
            $document->file_name = $originalFileName;
        }

        $document->save();

        return redirect()->back()->with('success', 'Edit Completed Successfully.');
    }



    //Delete Document from the database.

    public function delete(Document $document, Request $request)
    {

        $departmentID = $request->input('department_id');



        if (!Auth::user()->can("modify_$departmentID")) {
            return redirect()->back()->with('error', "You don't have permission to modify this department.");
        }


        $document->delete();

        return redirect()->back()->with('success','Deleted the document successfully.');
    }
}

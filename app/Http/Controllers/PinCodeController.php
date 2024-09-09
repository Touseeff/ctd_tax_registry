<?php

namespace App\Http\Controllers;

use App\Mail\OldRecordsTaxRegistryMail;
use App\Models\TaxRegistryRecord;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PinCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // dd($request->toArray());
    //     $validation = $request->validate([
    //         'email' => 'required|email',
    //         'phone_number' => ['required', 'regex:/^\+1 \d{3}-\d{3}-\d{4}$/'],
    //     ]);


    //         // Fetch the record based on 'url_pin'
    //         $record = TaxRegistryRecord::where('url_pin', $request->url_pin)->first();


    //         $fileDate = \DateTime::createFromFormat('d-m-Y', $record->file_date);
    //         $record->file_date = $fileDate->format('Ymd');
    //         $record->first = $request->first;



    //         $uploadDate = \DateTime::createFromFormat('d-m-Y', $record->upload_date);
    //         $record->upload_date = $uploadDate->format('Ymd');



    //         if ($record->update()) {

    //     echo "ok";



    //         } else {
    //             echo "Record not found";
    //         }


    // }


    // testing
    public function store(Request $request)
    {

        // just testing
$call = "fdfd";
        $request->validate([
            'email' => 'required|email',
            'phone_number' => ['required', 'regex:/^\+1 \d{3}-\d{3}-\d{4}$/'],
        ]);
        // Fetch the record based on 'url_pin'
        $record = TaxRegistryRecord::where('url_pin', $request->url_pin)->get();
        // $record = TaxRegistryRecord::where('url_pin', $request->url_pin)->first();
        // dd($record->toArray());
        if ($record->isNotEmpty()) {
            $userName = 'John Doe';
            $email = $request->email;
            $phone_number = $request->phone_number;
            $check_box = $request->input('options', []);

            // try {
            // Send the email with an array of records
            Mail::to('tauseefchoohan3@gmail.com')->send(new OldRecordsTaxRegistryMail($userName, $record->toArray(), $email, $phone_number, $check_box, )); // Convert records to array

        }
        //  else {
        //     return 'No records found for the provided URL pin.';
        // }

        // $test = "ali";
// Mail::to("tauseefdevelopment000@gmail.com")->send(new OldRecordsTaxRegistryMail($test));

        // if ($mail_send) {
        //     $fileDate = \DateTime::createFromFormat('d-m-Y', $record->file_date);
        //     $record->file_date = $fileDate->format('Ymd');


        //     $uploadDate = \DateTime::createFromFormat('d-m-Y', $record->upload_date);
        //     $record->upload_date = $uploadDate->format('Ymd');


        //     $record->first = ucfirst(strtolower($request->first_name));
        //     $record->mi = ucfirst(strtolower($request->middle_name));
        //     $record->last = ucfirst(strtolower($request->last_name));
        //     $record->mailing = ucwords(strtolower($request->address_one));
        //     $record->city = ucwords(strtolower($request->city));
        //     $record->state = strtoupper(strtolower($request->state));
        //     $record->zip = $request->post_code;

        //     if ($record->save()) {
        //         return redirect()->route('tr.status')
        //             ->with([
        //                 'status' => 'success',
        //                 'msg' => 'Thank you for your request.'
        //             ]);
        //     } else {
        //         return redirect()->route('tr.status')->with([
        //             'status' => 'error',
        //             'msg' => 'Record not Update. Please Try Again.'
        //         ]);
        //     }
        // } else {
        //     echo "mail not send";
        // }
        // }
        else {
            echo "record not found";
        }


    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validation = $request->validate([
            'pin_code' => [
                'required',
                'regex:/^\d{5}-\d{3}-\d{5}$/',
            ],
        ]);

        $data = TaxRegistryRecord::where('url_pin', $request->pin_code)->first();

        if ($data) {
            return view('user_record')->with(['data' => $data, 'alert' => 'success', 'msg' => 'Success']);
        } else {
            return redirect()->route('tr.home')->with(['alert' => 'danger', 'msg' => 'Record not Found.Please Inter Valid Number']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function record(Request $request)
    {
        $data = TaxRegistryRecord::where('url_pin', $request->url_pin_code)->first();
        if ($data) {
            return view('user_tax_registry_form', compact('data'));
        } else {
            return redirect()->route('tr.home')->with(['alert' => 'danger', 'msg' => 'Record not Found.Please wait..']);
        }
    }

    public function status()
    {
        return view('tax_registry_status');
    }
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

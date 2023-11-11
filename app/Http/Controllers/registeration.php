<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;
use App\Models\register;

class registeration extends Controller
{
    //to view homepage
    public function home()
    {
        $data = register::get();

        return view('userlist', ['data' => $data]);
    }
    //to view register/add user page
    public function add()
    {

        return view('register');
    }

    //to fetch details from register /add user page and store it in the DB
    public function store(Request $request)
    {

        //validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:register,email',
            'phone' => 'required|digits:10|unique:register,phone',
            'address' => 'required|max:80',
            'dob' => 'required',
            'image' => 'required|mimes:jpg,png|max:1000'

        ]);


        //image upload 
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        //individual columns
        $data = new register;
        $data->image = $imageName;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->dob = $request->dob;


        // Calculate days to birthday
        $dob = \Carbon\Carbon::parse($request->dob);
        $currentDate = \Carbon\Carbon::now();

        // Check if the birthday has occurred this year
        $nextBirthday = $dob->copy()->year($currentDate->year);

        if ($currentDate->gt($nextBirthday)) {
            $nextBirthday->addYear(); // Move to next year if the birthday has passed
        }

        $daysToBirthday = $currentDate->diffInDays($nextBirthday);
        $data->days_to_birthday = $daysToBirthday;


        

        $data->save();
        return back()->withSuccess('User Registered!!!!');
    }
    // Delete function
    public function destroy($id)
    {

        $data = register::where('id', $id)->first();
        if (!$data) {
            return back()->withError('User not found!');
        }
        // Get the file path from the database
        $filePath = public_path('uploads/' . $data->image);

        // Check if the file exists before attempting to delete
        if (File::exists($filePath)) {
            // Delete the file
            File::delete($filePath);
        }




        $data->delete();
        return back()->withSuccess('User deleted!!!!');
    }
}

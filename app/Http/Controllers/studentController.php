<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class studentController extends Controller
{
    public function index(){
    	$students = Students::all();
    	return view('welcome',['students'=>$students]);
    }

    // add student

    public function add_student(Request $request){
    	
    	$this->validate($request,[
	        'first_name' => 'required|min:2|max:50',
	        'last_name' => 'required|min:2|max:50',
	        'email' => 'required|email|unique:students',
	        'number' => 'required|numeric'
      	],[
      		'first_name.required' => 'First name is required',
      		'first_name.min' => 'First name should have minimum 2 characters',
      		'first_name.max' => 'First name should have maximum 50 characters',
      		'last_name.required' => 'Last name is required',
      		'last_name.min' => 'Last name should have minimum 2 characters',
      		'last_name.max' => 'Last name should have maximum 50 characters',
      		'email.required' => 'Email is required',
      		'email.email' => 'Please enter a valid email',
      		'email.unique' => 'This email alredy exists',
      		'number.required' => 'Contact number is required',
      		'number.numeric' => 'Please eter valid contact number',
      	]);

      	$student = new Students([
      		'first_name' => $request['first_name'],
      		'last_name' => $request['last_name'],
      		'email' => $request['email'],
      		'phone' => $request['number']
      	]);
      	$student->save();

      	return redirect()->route('home')->with('success', 'Student added successfully !!');
    }

    // edit student

    public function edit_student($id){
    	$student = Students::find($id);

    	return view('pages.edit_students')->with('student',$student);
    }

    // update student 

    public function update_student($id, Request $request){
    	$this->validate($request,[
	        'first_name' => 'required|min:2|max:50',
	        'last_name' => 'required|min:2|max:50',
	        'email' => 'required|email',
	        'number' => 'required|numeric'
      	],[
      		'first_name.required' => 'First name is required',
      		'first_name.min' => 'First name should have minimum 2 characters',
      		'first_name.max' => 'First name should have maximum 50 characters',
      		'last_name.required' => 'Last name is required',
      		'last_name.min' => 'Last name should have minimum 2 characters',
      		'last_name.max' => 'Last name should have maximum 50 characters',
      		'email.required' => 'Email is required',
      		'email.email' => 'Please enter a valid email',
      		'number.required' => 'Contact number is required',
      		'number.numeric' => 'Please eter valid contact number',
      	]);

    	Students::find($id)->update([
      		'first_name' => $request['first_name'],
      		'last_name' => $request['last_name'],
      		'email' => $request['email'],
      		'phone' => $request['number']
      	]);

      	return redirect()->route('home')->with('success', 'Student updated successfully !!');
    }

    // delete student 

    public function delete_student($id){

    	$student = Students::find($id);

    	if($student){
    		$student->delete();
    		return redirect()->route('home')->with('success', 'Student deleted successfully !!');
    	}else{
    		return redirect()->route('home')->with('warning', 'Error 404: Student Not Found !!');
    	}

    }
}

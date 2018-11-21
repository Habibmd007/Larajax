<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allContact()
    {
        $contact = Contact::all();
        return view('laracrud');
    }
   
    public function storeFunc(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        if ($request->email) {
            $contact->save();
        }

        
        $contacts = Contact::all();
        if ($contacts) {
            foreach ($contacts as $key => $contact) {
                echo '<tr>
                        <td>'.$contact->name.'</td>
                        <td>'.$contact->email.'</td>
                        <td>'.$contact->phone.'</td>
                        <td>'.'<button onclick="edit(e'.$contact->id.')" value="'.$contact->id.'" id="e'.$contact->id.'" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal2"><i class="far fa-edit"></i></button><button onclick="del(d'.$contact->id.')" class="btn btn-dark" id="d'.$contact->id.'" value="'.$contact->id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>'.'</td>
                      </tr>';
            }
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $contact =Contact::find($id);
        $contact->delete();
        // echo 'yeh deleted';

        $contacts = Contact::all();
        if ($contacts) {
            foreach ($contacts as $key => $contact) {
                echo '<tr>
                        <td>'.$contact->name.'</td>
                        <td>'.$contact->email.'</td>
                        <td>'.$contact->phone.'</td>
                        <td>'.'<button onclick="edit(e'.$contact->id.')" value="'.$contact->id.'" id="e'.$contact->id.'" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal2"><i class="far fa-edit"></i></button><button onclick="del(d'.$contact->id.')" class="btn btn-dark" id="d'.$contact->id.'" value="'.$contact->id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>'.'</td>
                      </tr>';
            }
        }

        
    }
    //note:- delete howar por db theke all contact load hobe n foreach er vitor print hobe n echo hobe. ja echo hobe ajax er response chole jabe. shekhan theke id dhore html method die print hobe.
    

    public function edit(Request $request)
    {
        $contact = Contact::find($request->id);

       echo'
       <input type="text" name="contact_id" id="contact_id2" class="form-control" value="'.$contact->id.'" style="display:none">
       <input type="text" name="name" id="name2" class="form-control" value="'.$contact->name.'">
        <input type="text" name="email" id="email2" class="form-control" value="'.$contact->email.'">
        <input type="number" name="phone" id="phone2" class="form-control" value="'.$contact->phone.'">
        <button type="reset" id="reset2" style="display:none">Reset</button>
        <button type="submit" class="btn btn-dark" id="addbutton2">Update</button>';

    }

    public function update(Request $request)
    {
        echo $request;
        $contact =Contact::find($request->contact_id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        if ($request->email) {
            $contact->save();
        }

        
        $contacts = Contact::all();
        if ($contacts) {
            foreach ($contacts as $key => $contact) {
                echo '<tr>
                        <td>'.$contact->name.'</td>
                        <td>'.$contact->email.'</td>
                        <td>'.$contact->phone.'</td>
                        <td>'.'<button onclick="edit(e'.$contact->id.')" value="'.$contact->id.'" id="e'.$contact->id.'" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal2"><i class="far fa-edit"></i></button><button onclick="del(d'.$contact->id.')" class="btn btn-dark" id="d'.$contact->id.'" value="'.$contact->id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>'.'</td>
                      </tr>';
            }
        }
    }
   
}

<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\DeleteContactRequest;
use App\Http\Traits\ContactTrait;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    use ContactTrait;
    private $contactModel;
    public function __construct(Contact $contact)
    {
        $this->contactModel = $contact;
    }

    public function index()
    {
        $contacts = $this->getContacts();
        return view('pages.contact.index', compact('contacts'));
    }

    public function delete(DeleteContactRequest $request)
    {
        $this->findContactById($request->id)->delete();
        Alert::toast('Contact Was Created Successfully', 'success');
        return back();
    }
}

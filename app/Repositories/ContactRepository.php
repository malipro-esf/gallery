<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function getAll()
    {
        return Contact::paginate(15);
    }

    public function reply($data)
    {
        $contact = Contact::find($data->contact_id);

        return $contact->update(['replied_message' => $data->replied_message]);
    }

}

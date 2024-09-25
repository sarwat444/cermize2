<?php

namespace App\Repositories\Panel;

use App\Models\ContactUs;
use App\Repositories\Panel\Exception;
use DataTables;

class ContactUsEloquent extends HelperEloquent
{
    public function getDataTable()
    {
        $contact_us = ContactUs::select('*')->get();
        return DataTables::of($contact_us)
            ->addIndexColumn()
            ->addColumn('mobile', function ($contact) {
                return $contact->mobile;
            })->addColumn('email', function ($contact) {
                return $contact->email;
            })->addColumn('subject', function ($contact) {
                return $contact->subject;
            })->addColumn('message', function ($contact) {
                return $contact->message;
            })->addColumn('created at', function ($contact) {
                return date('d.m.y H:i', strtotime($contact->created_at));
            })->rawColumns([])
            ->make(true);
    }
}

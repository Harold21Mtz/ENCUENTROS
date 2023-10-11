<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizingCommitteeController extends Controller
{
    public function showOrganizingCommittee()
    {
        return view('organization.organizingCommittee');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {
        $leads = Lead::paginate(10);
        return view('livewire.lead-index', [
            'leads' => $leads
        ]);
    }

    public function leadDelete($id) {
        permission_check('lead-management'); //this permission check not neccessary because livewire already verifed then send data. But we may use it for double data securities.
        $lead = Lead::findOrFail($id);
        $lead->delete();

        flash()->addSuccess('Lead Deleted Successfully!');
    }
}

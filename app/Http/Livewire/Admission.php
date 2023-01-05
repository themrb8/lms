<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;

use Livewire\Component;
use App\Models\Lead;
use App\Models\Course;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class Admission extends Component
{
    public $search;
    public $leads = [];
    public $lead_id;
    public $course_id;
    public $selectedCourse;


    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission', [
            'courses' => $courses,
        ]);
    }

    public function search() {
        $this->leads = Lead::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWhere('phone', 'like', '%' . $this->search . '%')
        ->get();
    }

    public function selectedCourse()  {
        $this->selectedCourse = Course::find($this->course_id);
    }

    public function admit() {
        $lead = Lead::findOrFail($this->lead_id);
        $user = User::create([
            'name' => $lead->name,
            'email' => $lead->email,
            'password' => Str::random(8),
        ]);

        $lead->delete();

        $invoice = Invoice::create([
            'due_date' => now()->addDays(7),
            'user_id' => $user->id,
        ]);

        InvoiceItem::create([
            'name' => 'Course: '. $this->selectedCourse->name,
            'price' => $this->selectedCourse->price,
            'quantity' => 1,
            'invoice_id' => $invoice->id,
        ]);

        flash()->addSuccess('Admission Added Successfully');
        return redirect()->route('lead.index');
    }
}

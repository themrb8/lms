<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\Course;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Payment;

use Illuminate\Support\Str;
use Livewire\Component;

class Admission extends Component
{
    public $search;
    public $leads = [];
    public $lead_id;
    public $course_id;
    public $selectedCourse;
    public $payment;


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
        $this->selectedCourse = Course::findOrFail($this->course_id);
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

        $this->selectedCourse->students()->attach($user->id);

        if(!empty($this->payment)) {
            Payment::create([
                'amount' => $this->payment,
                'invoice_id' => $invoice->id,
            ]);
        }

        $this->selectedCourse = null;
        $this->course_id = null;
        $this->lead_id = null;
        $this->search = null;
        $this->leads = [];

        flash()->addSuccess('Admission Added Successfully');
        return redirect()->route('lead.index');
    }
}

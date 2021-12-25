<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-list', ['only' => ['index']]);
        $this->middleware('permission:contact-show', ['only' => ['show']]);
        $this->middleware('permission:contact-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
        $this->middleware('permission:contact-update-status', ['only' => ['updateStatus']]);
        $this->middleware('permission:contact-chat', ['only' => ['chat']]);
        $this->middleware('permission:contact-post-chat', ['only' => ['postChat']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->get();

        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Contact::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Contact::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }

    /**
     * Chat
     */
    public function chat(Contact $contact)
    {
        return view('admin.contact.chat', compact('contact'));
    }

    /**
     * Method post chat
     * Reply chat
     * Send reply chat to email customer
     */
    public function postChat(ContactUpdateRequest $request, Contact $contact)
    {
        if (!Auth::guard('admin')->id()) {
            return redirect()->route('admin');
        }

        // Neu da reply roi thi khong gui mail nua
        if ($contact->reply) {
            return redirect()->back()->with('message', 'You cannot update the data once an email has been sent for this record');
        }

        if ($request->validated()) {
            if ($contact->update([
                'rep_id' => Auth::guard('admin')->id(),
                'reply' => $request->reply,
                'status' => 1,
                'is_send_email' => $request->is_send_email
            ])) {
                // Gui email thong bao
                if ($request->is_send_email == 1) {
                }

                return redirect()->back()->with('message', 'Updated successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('dashboard.messages')
            ->with('messages', $messages);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ];

        $ruleMessages = [
            'name.required' => 'Nama harus diisi!',
            'name.min' => 'Nama minimal 3 karakter!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak sesuai!',
            'message.required' => 'Pesan harus diisi!',
            'message.min' => 'Pesan minimal 10 karakter!',
        ];

        $this->validate($request, $rules, $ruleMessages);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        
        DB::beginTransaction();

        try {
            $contact = new Message();

            $contact->name = $name;
            $contact->email = $email;
            $contact->message = $message;

            $contact->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Pesan berhasil terkirim!');
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $message = Message::find($id);

            $message->delete();
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Pesan berhasil dihapus!');
    }
}

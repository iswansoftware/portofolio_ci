<?php

namespace App\Http\Controllers;

use DB;

use App\User;
use App\Option;
use App\Portofolio;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OptionController extends Controller
{
    public function content()
    {
        $portofolio = Portofolio::active()
            ->get();

        $greeting = Option::whereType('navigation')
            ->first();

        $skill = Option::whereType('masthead-subheading')
            ->first();

        $aboutMe = Option::whereType('about-section')
            ->first();

        $location = Option::whereType('footer-location')
            ->first();

        $motivation = Option::whereType('footer-motivation')
            ->first();

        $user = User::first();

        return view('index')
            ->with([
                'portofolio' => $portofolio,
                'greeting' => $greeting,
                'skill' => $skill,
                'aboutMe' => $aboutMe,
                'location' => $location,
                'motivation' => $motivation,
                'user' => $user,
            ]);
    }

    public function index()
    {
        $greeting = Option::where('type', 'navigation')
            ->first();

        $skill = Option::where('type', 'masthead-subheading')
            ->first();

        $aboutMe = Option::where('type', 'about-section')
            ->first();

        $location = Option::where('type', 'footer-location')
            ->first();

        $motivation = Option::where('type', 'footer-motivation')
            ->first();

        return view('dashboard.options')
            ->with([
                'greeting' => $greeting,
                'skill' => $skill,
                'aboutMe' => $aboutMe,
                'location' => $location,
                'motivation' => $motivation
            ]);
    }

    public function greeting(Request $request, $id)
    {
        $rules = [
            'content' => 'required|min:3'
        ];

        $ruleMessages = [
            'content.required' => 'Salam Navigasi tidak boleh kosong!',
            'content.min' => 'Salam Navigasi minimal 3 karakter',
        ];

        $this->validate($request, $rules, $ruleMessages);

        $content = $request->content;
        $greeting = Option::find($id);

        DB::beginTransaction();

        try {
            $greeting->content = Str::upper($content);

            $greeting->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Salam navigasi berhasil diperbarui!');
    }

    public function skill(Request $request, $id)
    {
        $rules = [
            'content' => 'required|min:3'
        ];

        $ruleMessages = [
            'content.required' => 'Keahlian tidak boleh kosong!',
            'content.min' => 'Keahlian minimal 3 karakter',
        ];

        $this->validate($request, $rules, $ruleMessages);

        $content = $request->content;
        $skill = Option::find($id);

        DB::beginTransaction();

        try {
            $skill->content = $content;

            $skill->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Keahlian berhasil diperbarui!');
    }

    public function aboutMe(Request $request, $id)
    {
        $rules = [
            'content' => 'required|min:10'
        ];

        $ruleMessages = [
            'content.required' => 'Tentang Saya tidak boleh kosong!',
            'content.min' => 'Tentang Saya minimal 10 karakter',
        ];

        $this->validate($request, $rules, $ruleMessages);

        $content = $request->content;
        $aboutMe = Option::find($id);

        DB::beginTransaction();

        try {
            $aboutMe->content = $content;

            $aboutMe->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Tentang Saya berhasil diperbarui!');
    }

    public function location(Request $request, $id)
    {
        $rules = [
            'content' => 'required|min:3'
        ];

        $ruleMessages = [
            'content.required' => 'Lokasi tidak boleh kosong!',
            'content.min' => 'Lokasi minimal 3 karakter',
        ];

        $this->validate($request, $rules, $ruleMessages);

        $content = $request->content;
        $location = Option::find($id);

        DB::beginTransaction();

        try {
            $location->content = $content;

            $location->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Lokasi berhasil diperbarui!');
    }

    public function motivation(Request $request, $id)
    {
        $rules = [
            'content' => 'required|min:3'
        ];

        $ruleMessages = [
            'content.required' => 'Motivasi tidak boleh kosong!',
            'content.min' => 'Motivasi minimal 3 karakter',
        ];

        $this->validate($request, $rules, $ruleMessages);

        $content = $request->content;
        $motivation = Option::find($id);

        DB::beginTransaction();

        try {
            $motivation->content = $content;

            $motivation->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Motivasi berhasil diperbarui!');
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;

use App\Portofolio;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PortofolioController extends Controller
{
    /**
     * * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeCount = Cache::remember('active_count', 60, function () {
            return Portofolio::active()
                ->count();
        });

        $portofolioCount = Portofolio::count();

        $portofolio = Portofolio::all();

        return view('dashboard.portofolios.portofolio_index')
            ->with([
                'activeCount' => $activeCount,
                'portofolioCount' => $portofolioCount,
                'portofolio' => $portofolio
            ]);
    }

    /**
     * * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.portofolios.portofolio_create');
    }

    /**
     * * Store a newly created resource in storage.
     *
     *  @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'image' => 'required|image|max:2048',
            'title' => 'required|min:8|unique:portofolios,title',
            'description' => 'required|min:10'
        ];

        $ruleMessages = [
            'image.required' => 'Gambar harus dipilih',
            'image.image' => 'Format tidak sesuai',
            'image.max' => 'Maksimum 2MB',
            'title.required' => 'Judul harus diisi',
            'title.min' => 'Minimal 8 karakter',
            'title.unique' => 'Judul sudah ada',
            'description.required' => 'Deskripsi harus diisi',
            'description.min' => 'Deskripsi minimal 10 karakter'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $title = $request->title;
        $image = $request->image;
        $description = $request->description;

        $userId = Auth::id();

        DB::beginTransaction();

        try {
            if (!empty($image)) {
                $fileName = $image->getClientOriginalName();
                $fileExtension = $image->getClientOriginalExtension();

                $fileName = Str::replaceLast('.' . $fileExtension, '', $fileName);
                $fileName = 'p_' . Str::substr(Str::slug($fileName, '-'), 0, 180) . '.' . $fileExtension;
                $filePath = 'back/uploads/portofolios/';

                $image->move($filePath, $fileName);
            }

            $portofolio = new Portofolio();

            $portofolio->user_id = $userId;
            $portofolio->title = $title;
            $portofolio->image = $fileName;
            $portofolio->description = $description;

            $portofolio->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->route('dashboard.portofolio.index')
            ->with('success', 'Portofolio berhasil ditambah');
    }

    /**
     * * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $portofolio = Portofolio::where('id', $id)
                ->firstOrFail();

            return view('dashboard.portofolios.portofolio_edit')
                ->with('portofolio', $portofolio);
        } catch (ModelNotFoundException $e) {
            Log::error($e);

            return redirect()
                ->back()
                ->with('info', 'Data tidak ditemukan');
        }
    }

    /**
     * * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'image' => 'image|max:2048',
            'title' => 'required|min:8|unique:portofolios,title,' . $id,
            'description' => 'required|min:10'
        ];

        $ruleMessages = [
            'image.image' => 'Format tidak sesuai',
            'image.max' => 'Maksimum 2MB',
            'title.required' => 'Judul harus diisi',
            'title.min' => 'Minimal 8 karakter',
            'title.unique' => 'Judul sudah ada',
            'description.required' => 'Deskripsi harus diisi',
            'description.min' => 'Deskripsi minimal 10 karakter'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $title = $request->title;
        $image = $request->image;
        $description = $request->description;
        $userId = Auth::id();

        $portofolio = Portofolio::find($id);

        DB::beginTransaction();

        try {
            if (!empty($image)) {
                $fileName = $image->getClientOriginalName();
                $fileExtension = $image->getClientOriginalExtension();

                $fileName = Str::replaceLast('.' . $fileExtension, '', $fileName);
                $fileName = 'p_' . Str::substr(Str::slug($fileName, '-'), 0, 180) . '.' . $fileExtension;
                $filePath = 'back/uploads/portofolios/';

                $upload = $image->move($filePath, $fileName);

                if ($upload) {
                    $oldImage = $portofolio->image;
                    File::delete('back/uploads/portofolio/' . $oldImage);

                    $portofolio->image = $fileName;
                }
            }

            $portofolio->user_id = $userId;
            $portofolio->title = $title;
            $portofolio->description = $description;

            $portofolio->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->route('dashboard.portofolio.index')
            ->with('success', 'Portofolio berhasil diperbarui');
    }

    /**
     * * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);

        DB::beginTransaction();

        try {
            File::delete('back/uploads/portofolios/' . $portofolio->image);

            $portofolio->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Portofolio berhasil dihapus');
    }

    public function choose(Request $request)
    {
        $choose = $request->choose;
        $statuses = 0;

        DB::beginTransaction();

        try {
            Portofolio::whereNotIn('id', $choose)
                ->update(['is_choose' => 0]);

            Portofolio::whereIn('id', $choose)
                ->update(['is_choose' => 1]);

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Status berhasil diperbarui');
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);

            return redirect()
                ->back()
                ->with('error', 'Auch, ada yang salah!');
        }
    }
}

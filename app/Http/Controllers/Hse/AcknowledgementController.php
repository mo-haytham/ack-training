<?php

namespace App\Http\Controllers\Hse;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileTrait;
use App\Models\Acknowledgement;
use Illuminate\Http\Request;

class AcknowledgementController extends Controller
{
    use FileTrait;

    public function index()
    {
        $acks = Acknowledgement::with('attachments')->get();
        return view('acknowledgements.index', compact('acks'));
    }

    public function create()
    {
        return view('acknowledgements.create');
    }

    public function save(Request $request)
    {
        // return $request;

        try {
            $request->validate([
                'title' => 'required|string|min:5|max:255',
                'description' => 'nullable|string|min:15',
                'attachments' => 'nullable|array',
                'attachments.*' => 'required|image'
            ], [
                'attachments.*' => 'Attachments should be an image'
            ]);

            $attachment_names = [];
            if (isset($request->attachments) && count($request->attachments) > 0) {
                // dd($request->attachments);
                foreach ($request->attachments as $attachment) {
                    array_push($attachment_names, ['file_name' => $this->save_file('/acks', $attachment, 'acks')]);
                }
            }

            $ack = Acknowledgement::create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            if (count($attachment_names) > 0)
                $ack->attachments()->createMany($attachment_names);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return redirect()->route('ack.index');
    }

    public function view($id)
    {
        $ack = Acknowledgement::where('id', $id)->with('attachments')->first();
        if (!$ack) abort(404);
        return view('acknowledgements.view', compact('ack'));
    }

    public function edit($id)
    {
        $ack = Acknowledgement::where('id', $id)->with('attachments')->first();
        if (!$ack) abort(404);
        return view('acknowledgements.edit', compact('ack', 'id'));
    }

    public function update($id, Request $request)
    {
        return $request;
    }

    public function delete(Request $request)
    {
        return $request;
        // $ack = Acknowledgement::where('id', $request->id)->with('attachments')->first();
    }
}

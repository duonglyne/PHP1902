<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\NewsletterModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $emails = DB::table('newsletters')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['newsletters'] = $emails;
        return view('admin.content.newletter.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        return view('admin.content.newletter.submit', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = NewsletterModel::find($id);
        $data['newsletter'] = $item;


        return view('admin.content.newletter.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = NewsletterModel::find($id);
        $data['newsletter'] = $item;

        return view('admin.content.newletter.delete', $data);
    }


    public function store(Request $request) {

        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();

        $item = new NewsletterModel();

        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/newsletters');
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();

        $item = NewsletterModel::find($id);

        $item->email = $input['email'];
        $item->save();

        return redirect('/admin/newsletters');
    }

    public function destroy($id) {
        $item = NewsletterModel::find($id);

        $item->delete();

        return redirect('/admin/newsletters');
    }
}

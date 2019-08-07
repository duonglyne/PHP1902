<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Frontend\ContentPostModel;
use App\Model\Frontend\ContentTagModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentTagController extends Controller
{
    public function index($id) {

        $data = array();

        $data['tag'] = ContentTagModel::find($id);

        $data['posts'] = ContentPostModel::where('tag_id', $id)->paginate(10);

        return view('frontend.content.tag.index', $data);
    }
}

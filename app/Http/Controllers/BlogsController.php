<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogDetail;
use Illuminate\Http\Request;
use App\Helpers\CRUDHelper;


class BlogsController extends Controller
{
    public function blogs(Request $request, $slug = null, $id = null)
    {
        $title = 'Tin tức';
        $blogs = Blog::all();
        if ($slug == 'delete' && $id) {
            $CRUDHelper = new CRUDHelper();
            $CRUDHelper->Delete(Blog::class, $id);
            return redirect()->back();
        } elseif ($slug == 'update' && $id) {
            if ($request->isMethod('get')) {
                $data = Blog::find($id);

                return view("dashboard.pages.blogs.update", [
                    "title" => $title,
                    "data" => $data,
                ]);
            }
            if ($request->isMethod('put')) {
                $CRUDHelper = new CRUDHelper();
                $data = [
                    "title" => $request->title,
                    "summary" => $request->summary,
                    "img" => $request->img,
                    "hidden" => $request->hidden,
                ];

                $result = $CRUDHelper->Update(Blog::class, $request, $id);

                if ($result->getStatusCode() === 200) {
                    $data = [
                        "parent_id" => $id,
                        "meta_keyword" => $request->meta_keyword,
                        "meta_description" => $request->meta_description,
                        "content" => $request->content,
                    ];
                    $detail = BlogDetail::where('parent_id', $id)->first() ?? null;
                    $detailId = $detail->id ?? null;
                    if ($detailId == null) {
                        $CRUDHelper->Create(BlogDetail::class, $data);
                    } else {
                        $CRUDHelper->Update(BlogDetail::class, $data, $detailId);
                    }
                    return redirect()->route('dashboard.blogs');
                }
            }
        }

        return view('dashboard.pages.blogs.list', [

            "title" => $title,
            "blogs" => $blogs,

        ]);
    }
    public function creBlo(Request $request)
    {
        $title = 'Tin tức';

        if ($request->isMethod('post')) {
            $CRUDHelper = new CRUDHelper();
            $data = [
                "title" => $request->title,
                "summary" => $request->summary,
                "img" => $request->img,
                "hidden" => $request->hidden,
            ];
            $create = $CRUDHelper->Create(Blog::class, $data);
            if ($create) {
                $parent_id = $create->getData()[0];
                $data = [
                    "parent_id" => $parent_id,
                    "meta_keyword" => $request->meta_keyword,
                    "meta_description" => $request->meta_description,
                    "content" => $request->content,
                ];
                $CRUDHelper->Create(BlogDetail::class, $data);

                return redirect()->route('dashboard.blogs');
            }
        }


        return view('dashboard.pages.blogs.create', [
            "title" => $title,
        ]);
    }
}

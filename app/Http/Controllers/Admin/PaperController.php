<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Epaper;
use App\Models\EpaperLink;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

//use Intervention\Image\Facades\Image;

class PaperController extends Controller
{
    public function createPaper(Request $request)
    {
        $input = $request->all();
        $title = $request->paper_title;
        $page_number= $request->page_number;
        $extra1 = $request->extra1;

        if ($request->paper_date){
            $today = $request->paper_date;

        }else{
            $today = date("Y/m/d");

        }

        if (!empty($request->image)) {
            $array_size = (sizeof($request->image));
            foreach ($request->file('image') as $i => $image) {
                if (!empty($image)) {
                    $time = time();
                    $fileName = $time .'_'. $i.'.' . $image->getClientOriginalExtension();
                    $p_img = $image;

                    $filePath_larg = public_path('storage/images/e-paper-larg/');
                    $img_larg = Image::make($image->path());
                    $img_larg->save($filePath_larg.'/'.$fileName);


                    $filePath = public_path('storage/images/e-paper/');
                  $img = Image::make($image->path());
                    $img->resize(950, null, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath.'/'.$fileName);
                    $page_position = $page_number[$i] *1;
                    $status = Epaper::create([
                        'qty' => $page_position,

                        'image' => $fileName,
                        'datetime' => $today,
                        'title' => $title[$i],
                    ]);
                }
            }

        }

        return redirect()->route('showList');
    }

    public function showList(Request $request)
    {
        if ($request->search_date){
            $epaper = Epaper::where('datetime',$request->search_date)->orderBy('qty', 'asc')->paginate(10);
        }else{
            $epaper = Epaper::orderBy('datetime', 'desc')->paginate(10);

        }
//        // dd($request);
//        if ($request->datetime == null) {
//            $date = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
//            $date = $date->format('Y-m-d 00:00:00');
//
//        } else {
//            $date = strtotime($request->datetime);
//            $date = date('Y-m-d 00:00:00', $date);
//            // $date = $date->format('Y-m-d 00:00:00');
//
//        }
        // dd($date);
        //  $images = Epaper::orderBy('id', 'desc')->get();

        return view('admin.pages.paperList', compact('epaper'));
    }

    public function updatePaper(Request $request)
    {
        $paper = Epaper::find($request->paper_id);

        if (!empty($request->image)) {

            $image = $request->image;
            $time = time();
            $fileName = $time . '.' . $image->getClientOriginalExtension();
            $p_img = $image;
//            $p_img->move(public_path('storage/images/e-paper/'), $fileName);
            $filePath_larg = public_path('storage/images/e-paper-larg/');
            $img_larg = Image::make($image->path());
            $img_larg->save($filePath_larg.'/'.$fileName);

            $filePath = public_path('storage/images/e-paper/');
            $img = Image::make($image->path());
            $img->resize(950, null, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$fileName);


            $paper->image = $fileName;
        }
        $paper->datetime = $request->paper_data;
        $paper->title = $request->title;
        $paper->qty = $request->qty;
        $paper->save();
        return redirect()->back();
    }

    public function addLink($id)
    {
        $data = Epaper::with('epaperLinks')->where('id', $id)->first();
        $date = $data->datetime;
        $epapers = Epaper::with('epaperLinks')->where('datetime', $date)->get();
        $message = "sabin";


//
//        if (($data->epaperLinks->count())>0)
//        {
//            $message="";
//
//        }
        return view('admin.pages.addLink', compact('data', 'epapers', 'message'));
    }
    public function del_paper($id){
        $del_paper = Epaper::find($id);

        unlink(public_path('storage/images/e-paper-larg/'.$del_paper->image));
        unlink(public_path('storage/images/e-paper/'.$del_paper->image));

        $del_paper->delete();
        return redirect()->back();
    }
//public function updateLink(Request $request){
//        $id = $request->fileid;
//        $image = $request->img_file;
//        $peper_link = EpaperLink::find($id);
//
//        $time = time();
//        $fileName = $time . '.' . $image->getClientOriginalExtension();
//        $p_img = $image;
//        $p_img->move(public_path('storage/images/e-paper/'), $fileName);
//
//        $peper_link->image = $fileName;
//        $peper_link->save();
//        return response()->back()->with($fileName);
//}
    public function del_link($id){
            $del_link = EpaperLink::find($id)->delete();
            return redirect()->back();
    }
    public function saveLink(Request $request)
    {
        $link = $request->htlmcode;
        $coordinate = $request->img_coords;

//        $file=$request->img_file;
        $epaper_id = $request->epaper_id;

        $epaper = Epaper::find($epaper_id);
        $epaper->map_id = $request->map_id;
        $epaper->save();

        if (!empty($request->img_file)) {
            $array_size = (sizeof($request->img_file));
            foreach ($request->file('img_file') as $i => $image) {
                if (!empty($image) && $coordinate[$i] != null) {

                    $time = time();
                    $fileName = $time . '_' . $i . '_single_news.' . $image->getClientOriginalExtension();
                    $p_img = $image;
                    $p_img->move(public_path('storage/images/single_news/'), $fileName);

//                    $path = public_path() . '/epaperlink_image';
//                    $pimage = uniqid() . '_' . $image->getClientOriginalName();

                    $href = $fileName;
                    $linkhref = route("single_item", $href);
                    $link = '<area shape="rect" alt="" title="" " href="' . $linkhref . '" coords="' . $coordinate[$i] . '"  target="_top"  />';

                    $status = EpaperLink::create([
                        'image' => $fileName,
                        'title' => $image->getClientOriginalName(),
                        'epaper_id' => $request->epaper_id,
                        'map_id' => $request->map_id,
                        'coordinate' => $coordinate[$i],
                        'link' => '$link',


                    ]);

                }

            }

        }


        return redirect()->back();
    }

    public function deletePaper($date){
        $del_paper = Epaper::where('datetime',$date)->get();

        foreach ($del_paper as $del_p){
            unlink(public_path('storage/images/e-paper-larg/'.$del_p->image));
            unlink(public_path('storage/images/e-paper/'.$del_p->image));
        }

        $del_paper_db = Epaper::where('datetime',$date)->delete();

        return redirect()->back();
    }

}

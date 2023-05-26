<?php

namespace App\Http\Controllers;

use App\Models\Epaper;
use App\Models\EpaperLink;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function singlePaper(Request $request){

        $today = date("Y/m/d");
        if($request->id && $request->search_date){
            $day_paper= Epaper::where('id',$request->id)->orderBY('qty','ASC')->first();
            $day_paper_all= Epaper::where('datetime',$request->search_date)->orderBY('qty','ASC')->get();

        }else{
            if ($request->search_date){
                $day_paper= Epaper::where('datetime',$request->search_date)->orderBY('qty','ASC')->first();
                $day_paper_all= Epaper::where('datetime',$request->search_date)->orderBY('qty','ASC')->get();
                if (!$day_paper){
                    return redirect()->route('singlePaper');
                }
            }
            elseif ($request->id){
                $day_paper= Epaper::where('id',$request->id)->orderBY('qty','ASC')->first();
                $day_paper_all= Epaper::where('datetime',$day_paper->datetime)->orderBY('qty','ASC')->get();
            }
            else{
                $day_paper_for_select= Epaper::orderBY('datetime','DESC')->first();
                $day_paper=Epaper::where('datetime',$day_paper_for_select->datetime)->orderBY('qty','ASC')->first();
                $day_paper_all= Epaper::where('datetime',$day_paper->datetime)->orderBY('qty','ASC')->get();

            }
        }

        return view('pages.singlePage',compact('day_paper','day_paper_all'));
    }

    public function single_news($id){
        $single_news = EpaperLink::with('mainPaper')->where('id',$id)->first();
        return view('pages.singleNews',['single_news'=>$single_news]);
    }
    public function pdfPaper($id){

        $day_paper= Epaper::where('id',$id)->orderBY('qty','DESC')->first();
        $day_paper_all= Epaper::where('datetime',$day_paper->datetime)->orderBY('qty','ASC')->get();


        $pdf_name = date('d-m-Y', strtotime($day_paper->datetime )). ' ' . 'Regional Times (ePaper)';
        $pdf = PDF::loadView('pdf.paper', compact('day_paper_all'));
        $customPaper = array(0,0,567.00,1013.80);

        return $pdf->setPaper($customPaper, 'P')->download($pdf_name.'.pdf');
    }
}

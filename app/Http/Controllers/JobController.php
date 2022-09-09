<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return ('job.joblist');
    }

    public function fetch_job(Request $request){
      
        $result=Banner::select('banner.id as id','banner.title','banner.image','status','banner.created_at','banner.created_by')
            ->orderby('id','desc')->get();
            
        return datatables()->of($result)
        ->editColumn('created_at', function($result) {

            return DatatableSettings::showCreatedDate($result->created_at,'d M Y');
        })->editColumn('created_by', function($result) {
             
            if($result->created_by == @Auth::user()->id)
                return 'Me';
            else
                return ucfirst($result->added_by->name);
        })->editColumn('image', function($result) {

            if(isset($result->image))
                return '<img src="'.asset('storage/banner/'.$result->image).'" class="img-fluid img-thumbnail activity-img01 " alt="No image available" height="150px" width="150px" id="img-div">';
            else
                return '<img height="50px"  width="50px" src="'.asset('/assets/images/no-image.png').'" class="text-center img-fluid img-thumbnail activity-img01 " alt="No image available" height="150px" width="150px" id="img-div">';
        })->editColumn('actions', function($result){
            
            return DatatableSettings::tableActionsEditOnly('banner', $result->id);
        })->editColumn('status', function($result){

            return DatatableSettings::dataTableStatusSwitcher($result->status, $result->id, '/admin/change-banner-status');
        })
        ->editColumn('select_booking', static function($result){
            return '<input type="checkbox" name="sel_ids[]" id="manual_entry_'.$result->id.'" class="manual_entry_cb sel_ids" value="'. $result->id.'" />';})
          ->rawColumns(['select_booking','title','status','image','created_at','created_by','actions'])
          ->addIndexColumn()
          ->make(true);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:50',
            'description'=> 'max:1000',
            'image'=> 'required|mimes:jpg,jpeg,png|max:20480',
        ]);

        if($request->image){          
            $fileName = SettingsController::fileUpload($request->file('image'), 'banner', '/banner'); 
        }
        $banner_ =[];
        $banner_['status']= 1;
        $banner_['created_by'] = @Auth::user()->id;
        $banner_['image']= isset($fileName) ? $fileName : null;
        $banner_['title']= $request->title;   
        $banner_['description']= $request->description;

        $banner_data = Banner::create($banner_);

        return redirect()->route('banner')->with('success',trans('messages.success-add'));
    }
}

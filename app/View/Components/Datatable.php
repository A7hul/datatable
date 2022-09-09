<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datatable extends Component
{
 
    public $title;
    public $id;
    public $headers;
    public $hiddenHeaders;
    public $createUrl;
    public $hideAction;
    public $filter;
    public $export;
    public $exportUrl;
    public $create;
    public $checkbox;
    public $bulkaction;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id="", $headers = "", $createUrl = "", $hiddenHeaders = "", $hideAction = false, $filter = false, $export = false, $exportUrl = "",$create = "",$title="",$checkbox=false,$bulkaction=false)
    {
        $this->title = $title;
        $this->headers = rtrim($headers);
        $this->createUrl = $createUrl;
        $this->hiddenHeaders = rtrim($hiddenHeaders);
        $this->hideAction = $hideAction;
        $this->filter = $filter;
        $this->exportUrl = $exportUrl;
        $this->export = $export;
        $this->id = $id ? $id : 'datatable-'.rand(1, 1000);
        $this->create = $create;
        $this->checkbox = $checkbox;
        $this->bulkaction = $bulkaction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $header = [];
        if($this->checkbox){
            $check = "<input type='checkbox' title='Select All'  id='select_all'/>";
            $reSetColumns = array_merge([$check,'SI.No'], explode(',', $this->headers));
        }
        else
        
        $reSetColumns = array_merge(['SI.No'], explode(',', $this->headers));
        $reSetColumns = array_merge($reSetColumns, ['created by', 'status', 'created at', 'actions']);

        // $reSetColumns = array_merge([], explode(',', $this->headers));
        // $reSetColumns = array_merge($reSetColumns, ['status', 'created at']);

        $this->hiddenHeaders = explode(',', $this->hiddenHeaders);
        foreach ($reSetColumns as $key => $value) {

            if(! in_array($value, array_map('trim', $this->hiddenHeaders)))
                $header[] = ucfirst($value);
        };

        $this->headers = $header;

        return view('components.datatable');
    }
    
}

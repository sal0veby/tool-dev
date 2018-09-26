<?php
/**
 * Created by PhpStorm.
 * User: SALOVEBY JOKE
 * Date: 15-Sep-18
 * Time: 21:49
 */

namespace App\Http\Controllers\Traits;


use App\Models\CarRegistration;
use App\Models\Contractor;
use App\Models\JobOrder;
use App\Models\Location;
use App\Models\Owner;
use App\Models\Participants;
use App\Models\Supervisor;
use App\Models\Taskmaster;
use App\Models\Tool;
use App\Models\WorkType;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait ActionJobOrder
{
    public function getLastDocumentNo()
    {
        $last_document = JobOrder::orderBy('id', 'DESC')->limit(1)->first();

        if (!empty($last_document)) {
            $document_no = str_pad(array_get($last_document, 'document_no') + 1, strlen(array_get($last_document, 'document_no')), "0", STR_PAD_LEFT);
            return $document_no;
        } else {
            return '0000001';
        }
    }

    public function getWorkTypeList(Request $request)
    {
        $class_id = $request->get('class_id');
        $location_id = $request->get('location_id');

        return WorkType::where(['location_id' => $location_id, 'class_id' => $class_id])->get();
    }

    public function getLocationList(Request $request)
    {
        $input = $request->get('class_id');

        return Location::where('class_id', $input)->get();
    }

}

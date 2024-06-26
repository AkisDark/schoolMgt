<?php
namespace App\Http\Controllers\Certificate;

use PDF;
use App\Models\Room;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // School Certificate Pdf
    public function getSchoolCertificatePdf($id){

        if(!$this->getStudent($id))

            return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);

        $pdf = PDF::loadView('admin.certificate.school_certificate', $this->getStudent($id));

        return $pdf->download(time()  . '.pdf');

    }

    // Absence Notice Pdf
    public function getAbsenceNoticePdf(Request $request){

        $validated = $request->validate([
            'id' => 'required|numeric',
            'dateStartSel' => 'required|date',
            'typeDate' => 'required|in:1,2'
        ]);

        if(!$validated ){
            return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);
        }

        $id = $request->id;

        $dateStart = $request->dateStartSel;

        $type = $request->typeDate;

        $pdf = PDF::loadView('admin.certificate.absence_notice', $this->getStudentAbs($id, $dateStart, $type));
       
        return $pdf->download(time()  . '.pdf');

    }

    // Work Certificate Pdf
    public function getWorkCertificatePdf($id){

        $teacher = Teacher::where('id', $id);

        if($teacher->exists()){

            $teacher = $teacher->with('wilaya')->first();

            $school = School::with('wilaya')->find(1);

            $data = [
                'first_name' => $teacher->first_name,
                'last_name' => $teacher->last_name,
                'date_of_birth' => $teacher->date_of_birth,
                'joining_date' => $teacher->joining_date,
                'location' => $teacher->wilaya->name,
                'name_school' => $school->name,
                'location_school' => $school->wilaya->name,
                //'img_qr_code' => $this->qrCode($teacher->id),
                'data_now' => date('Y-m-d')
            ];

            $pdf = PDF::loadView('admin.certificate.work_certificate', $data );

            return $pdf->download(time()  . '.pdf');
        }

        return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);
    }

    // list students by room
    public function getListStudentsByRoom(Request $request){

        $validated = $request->validate([
            'levelId' => 'required|numeric',
            'specializationId' => 'required|numeric',
            'roomId' => 'required|numeric'
        ]);

        if($validated){

            $levelId = $request->levelId;

            $specializationId = $request->specializationId;

            $roomId = $request->roomId;

            $rooms = Room::with(['students' => function($q){
                            $q->select('first_name', 'last_name', 'date_of_birth', 'gender', 'wilaya_id','room_id')
                              ->with('wilaya')
                              ->orderBy('first_name', 'DESC');
                        }])
                            ->with('level', 'specialization')
                            ->where('name', $roomId) 
                            ->where('level_id', $levelId)
                            ->where('specialization_id', $specializationId)
                            ->get();                   

        
            

            $data = [

                'students' => $rooms ?? '',

            ];


            $pdf = PDF::loadView('admin.certificate.list_students', $data );

            return $pdf->download(time() . '.pdf');
        }

        return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);
    }


    // get QrCode
    private function qrCode($id){

        try{

            $name_img = public_path('qrCode/'.time().'.png');

            \QrCode::size(100)->format('png')->generate($id, $name_img);

            return $name_img;

        } catch(\Exception $ex){

            return '';

        }
    }


    // get Student by Id
    private function getStudent($id){

        $student = Student::where('id', $id);

        if($student->exists()){

            $student = $student->with(['level', 'wilaya'])->first();

            $school = School::with('wilaya')->find(1);

            $data = [
                'first_name' => $student->first_name ?? '',
                'last_name' => $student->last_name ?? '',
                'date_of_birth' => $student->date_of_birth ?? '',
                'location' => $student->wilaya->name ?? '',
                'name_school' => $school->name ?? '',
                'location_school' => $school->wilaya->name ?? '',
                //'img_qr_code' => $this->qrCode($student->identity_card) ?? '',
                'img_qr_code' => '',
                'level' => $student->level->name ?? '',
                'data_now' => date('Y-m-d')
            ];

            return $data;
        }

        return false;

    }

    // get Student by Id
    private function getStudentAbs($id, $dateStart, $type){

        $student = Student::where('id', $id);

        if($student->exists()){

            $student = $student->with(['level', 'specialization', 'room', 'wilaya', 'absences'])->first();

            $school = School::with('wilaya')->find(1);

            if($type === "1")
                $notice = 'الاشعار الأول بالغياب';
            else
                $notice = 'الاشعار الثاني بالغياب';
            $data = [
                'notice' => $notice , 
                'first_name' => $student->first_name ?? '',
                'last_name' => $student->last_name ?? '',
                'date_of_birth' => $student->date_of_birth ?? '',
                'location' => $student->wilaya->name ?? '',
                'name_school' => $school->name ?? '',
                'location_school' => $school->wilaya->name ?? '',
                //'img_qr_code' => $this->qrCode($student->identity_card) ?? '',
                'img_qr_code' => '',
                'level' => $student->level->name . ' ' . 
                           $student->specialization->name . ' ' . 
                           $student->room->name ?? '',
                //'reason_of_absences' => $student->absences->reason_of_absences ?? '',
                'date_start' => $dateStart ?? '',
                'data_now' => date('Y-m-d')
            ];

            return $data;
        }

        return false;

    }

}

<?php
namespace App\Http\Controllers\Certificate;

use PDF;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    // School Certificate Pdf
    public function getSchoolCertificatePdf($id){

        if(!$this->getStudent($id))

            return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);

        $pdf = PDF::loadView('admin.certificate.school_certificate', $this->getStudent($id));

        return $pdf->download(time()  . '.pdf');

    }

    // Absence Notice Pdf (1)
    public function getFirstAbsenceNoticePdf($id){

        if(!$this->getStudent($id))

            return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);

        $pdf = PDF::loadView('admin.certificate.second_absence_notice', $this->getStudent($id));

        return $pdf->download(time()  . '.pdf');

    }

    // Absence Notice Pdf (2)
    public function getSecondAbsenceNoticePdf($id){

        if(!$this->getStudent($id))

            return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);

        $pdf = PDF::loadView('admin.certificate.second_absence_notice', $this->getStudent($id));

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
    public function getListStudentsByRoom($category_id){

        $students = Student::where('category_id', $category_id);

        if(!$students->exists()){

            return redirect()->back()->withInput()->with(['error'=> __('messages.msg_error')]);

        }

        $students = $students->with('category')->orderBy('first_name', 'ASC')->get();

        $data = [

            'students' => $students ?? '',

        ];

        $pdf = PDF::loadView('admin.certificate.list_students', $data );

        return $pdf->download(time() . '.pdf');
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
    private function getStudentAbs($id){

        $student = Student::where('id', $id);

        if($student->exists()){

            $student = $student->with(['level', 'wilaya', 'absences'])->first();

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
                'reason_of_absences' => $student->absences->reason_of_absences ?? '',
                'date_start' => $student->absences->date_start ?? '',
                'date_end' => $student->absences->date_end ?? '',
                'data_now' => date('Y-m-d')
            ];

            return $data;
        }

        return false;

    }

}

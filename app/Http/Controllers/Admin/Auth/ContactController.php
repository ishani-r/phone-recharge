<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\DataTables\ContactDatatable;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Replay;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Mail\ReplayMail;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\DataTables\ReplayDatatable;
use App\Http\Requests\Admin\ReplayRequest;

class ContactController extends Controller
{
   public function contactUs(ContactDatatable $ContactDatatable)
   {
      return $ContactDatatable->render('admin.dashboard.contactus');
   }

   public function replay($id)
   {
      $data = Contact::find($id);
      return view('admin.dashboard.replay', compact('data'));
   }

   public function replayUser(ReplayRequest $request)
   {
      $data = Contact::find($request->id);
      $email = $data['email'];
      $a = new Replay();
      $a->subject = $data->subject;
      $a->email = $data->email;
      $a->message = $data->message;
      $a->replay = $request->replay;
      $a->save();
      $message = $data->message;
      $replay = $request->replay;
      Mail::to($data['email'])->send(new Replaymail($replay, $message));
      return redirect()->route('admin.showreplay');
   }

   public function showreplay(ReplayDatatable $ReplayDatatable)
   {
      return $ReplayDatatable->render('admin.dashboard.listreplay');
   }

   public function destroyReplayList($id)
   {
      $replay = Replay::find($id);
      $replay->delete();
      return $replay;
   }

   public function deleteReplay($id)
   {
      dd("deleteReplay");
   }
}

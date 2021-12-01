<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\NotificationDatatable;
use App\Models\Notification;

class LikeController extends Controller
{
    public function like()
    {
        dd("like");
    }

    public function notification(NotificationDatatable $NotificationDatatable)
    {
        return $NotificationDatatable->render('admin.dashboard.notification');
    }

    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return $notification;
    }
}
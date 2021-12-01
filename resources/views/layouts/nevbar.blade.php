<div class="logo">
   <a href="{{route('admin.main')}}" class="simple-text logo-normal"><img class="rounded-circle" src="{{asset('storage/admin/'.Auth::guard('admin')->user()->image)}}" width="50px" /> {{Auth::Guard('admin')->user()->name}}</a>
</div>
<div class="sidebar-wrapper">
   <ul class="nav">
      <li class="nav-item {{ request()->is('*admin/dashboard/content*') ? 'active' : '' }}">
         <a class="nav-link" href="{{route('admin.main')}}">
            <i class="material-icons">dashboard</i>
            <p>{{ trans('Dashboard') }}</p>
         </a>
      </li>
      <!-- <li class="nav-item {{ request()->is('*profile*') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.showprofile')}}">
            <i class="material-icons">person</i>
            <p>Admin Profile</p>
        </a>
    </li> -->
      @can('view-admin-table')
    <li class="nav-item {{ request()->is('*adminuser*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.adminuser.index') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ trans('Admin User') }}</p>
         </a>
      </li>
      @endcan
      @can('view-user-table')
      <li class="nav-item {{ request()->is('*admin/dashboard*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ trans('User Table List') }}</p>
         </a>
      </li>
      @endcan
      @can('view-userdetail-table')
      <li class="nav-item {{ request()->is('*details*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.details.index') }}">
            <i class="material-icons">content_paste</i>
            <p style="word-wrap: break-word;">{{ trans('User Persnal Details') }}</p>
         </a>
      </li>
      @endcan
      @can('create-package')
      <li class="nav-item {{ request()->is('*package*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.package') }}">
            <i class="material-icons">library_books</i>
            <p>{{ trans('Add Package') }}</p>
         </a>
      </li>
      @endcan
      @can('create-package')
      <li class="nav-item {{ request()->is('*premium*') ? 'active' : '' }}">
         <a class="nav-link" href="{{ route('admin.premium.index') }}">
            <i class="material-icons">content_paste</i>
            <p>{{ trans('Package Table List') }}</p>
         </a>
      </li>
      @endcan
      <!-- <li class="nav-item {{ request()->is('*notification*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.notification') }}">
            <i class="material-icons">notifications</i>
            <p>{{ trans('Notifications') }}</p>
        </a>
    </li> -->
      <!-- ------------------------------------------------------------------------------  -->
      @can('create-terms')
      <ul class="nav">
         <li class="nav-item menu-items {{ request()->is('*setting*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
               <span class="menu-icon">
                  <i class="fa fa-cog fa-2x"> </i>
               </span>
               <span class="menu-title">{{ trans('Settings') }}</span>
               <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
               <ul class="nav flex-column sub-menu">
                  @can('view-notification')
                  <li class="nav-item menu-items {{ request()->is('*notification*') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('admin.notification') }}"><i class="material-icons">notifications</i>{{ trans('Notifications') }}</a></li>
                  @endcan
                  @can('view-language')
                  <li class="nav-item menu-items {{ request()->is('*index*') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('admin.language') }}"><i class="fa fa-language" aria-hidden="true"></i>{{ trans('Language') }}</a></li>
                  @endcan
                  @can('create-question-answer')
                  <li class="nav-item menu-items {{ request()->is('*helps*') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('admin.help')}}"><i class="fa fa-question-circle" aria-hidden="true"></i>{{ trans('Help') }}</a></li>
                  @endcan
                  @can('create-terms')
                  <li class="nav-item menu-items {{ request()->is('*settings*') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('admin.addteams') }}"><i class="fa fa-sticky-note" aria-hidden="true"></i>{{ trans('Terms And Conditions/Privacy Policy') }}</a></li>
                  @endcan
                  @can('view-contacts-replay')
                  <li class="nav-item menu-items {{ request()->is('*contactus*') ? 'active' : '' }}"> <a class="nav-link" href="{{ route('admin.contactus') }}"><i class="fa fa-address-book" aria-hidden="true"></i> {{ trans('Contact Us') }}</a></li>
                  @endcan
               </ul>
            </div>
         </li>
      </ul>
      @endcan
      <!-- ------------------------------------------------------------------------------  -->
      @can('view-access')
      <ul class="nav">
         <li class="nav-item menu-items {{ request()->is('*setting*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basics">
               <span class="menu-icon">
                  <i class="fa fa-universal-access" aria-hidden="true"></i>
               </span>
               <span class="menu-title">{{ trans('Access') }}</span>
               <i class="menu-arrow"></i>

            </a>
            <div class="collapse" id="ui-basics">
               <ul class="nav flex-column sub-menu">
                  @can('view-permission-table')
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.permission.index') }}"><i class="fa fa-user-secret text-yellow"></i>{{ trans('Permission Management') }}</a></li>
                  @endcan
                  @can('view-role-table')
                  <li class="nav-item"> <a class="nav-link" href="{{ route('admin.role.index') }}"><i class="fa fa-user-secret text-yellow"></i>{{ trans('Role Management') }}</a></li>
                  @endcan
               </ul>
            </div>
         </li>
      </ul>
      @endcan
   </ul>
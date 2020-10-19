<?php $user = Auth::user();?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="{{url('storage/userimg.jpeg')}}" style="
    height: 92px;
    width: 114px;
"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">Admin</span>
                            <span class="text-muted text-xs block">Admin<b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
<!--                            <li><a class="dropdown-item" href="change_password.html">Change Password</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>-->
                            <li class="dropdown-divider"></li>
                            
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                 <?php //$role_id= Auth::user()->role_id; ?>;
                
                
                <li class="{{ (request()->is('home')) ? 'active' : '' }}">
                    <a href="{{route('home')}}<?php // echo base_url("admin"); ?>"><i class="fa fa-desktop"></i> <span class="nav-label">Dashboard</span> </a>
                    
                </li>
                <li class="{{ (request()->is('address')) ? 'active' : '' }}">
                    <a href="{{route('address.index')}}"><i class="fa fa-user"></i> <span class="nav-label">Address-Book</span> </a>

                </li>
                
                
                
                
                
                
                 
                
            </ul>

        </div>
    </nav>
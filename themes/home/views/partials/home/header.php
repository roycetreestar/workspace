<!-- Header -->

<header id="header" class="navbar navbar-fixed-top navbar-inverse">
<div class="navbar-inner">
<div class="container">

<!-- Nav Toggle on Smartphone --> 
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> 
<!-- Nav Toggle on Smartphone END --> 

<!-- Logo --> 
<a class="brand" href="{{ url:base }}"></a> 
<!-- Logo END --> 

<!-- Nav -->
<nav class="nav-collapse collapse">
<ul class="nav pull-right">
<li><a href="#about"><i class="icon-tasks icon-white"></i>About Fluorish</a></li>
<li class="divider-vertical"></li>
<li><a href="#reagentsearch"><i class="icon-search icon-white"></i>Search Reagents</a></li>
<li class="divider-vertical"></li>
<li><a href="#download"><i class="icon-download icon-white"></i>Panel Builder<span class="badge ">Download</span></a></li>
<li class="divider-vertical"></li>
<li><a href="#contact"><i class="icon-comment icon-white"></i>Contact</a></li>
<li class="divider-vertical"></li>
<li><a href="register"><span class="register btn"> Join Fluorish</span></a></li>
<li class="divider-vertical"></li>
<!-- {{ navigation:links group="header" }} --> 
{{ if user:logged_in }}
<ul class="nav pull-right">
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li> {{ if settings:enable_profiles }} <a href="{{ url:site uri='my-profile' }}">{{ helper:gravatar email=user:email size="16" }} {{ user:display_name }}</a> {{ else }}
      {{ helper:gravatar email=user:email size="20" }} {{ user:display_name }}
      {{ endif }} </li>
    {{ if settings:enable_profiles }}
    <li><a href="{{ url:site uri='edit-profile' }}">{{ helper:lang line="edit_profile_label" }}</a></li>
    {{ endif }}
    
    {{ if user:has_cp_permissions }}
    <li><a href="{{ url:site uri='admin' }}" target="_blank">{{ helper:lang line="global:control-panel" }}</a></li>
    {{ endif }}
    <li><a href="{{ url:site uri='users/logout' }}">{{ helper:lang line="logout_label" }}</a></li>
  </ul>
  <!-- Nav END --> 
  {{ else }}
<li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
  <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;"> 
    <!-- Login form here -->
    
    <form action="{{ url:site uri='users/login' }}" class="navbar-search pull-right" method="post" accept-charset="utf-8" id="login-small">
      <input type="hidden" name="redirect_to" value="{{ url:current }}" />
      <label>Email Address</label>
      <input type="text" id="email" name="email" maxlength="120" placeholder="{{ helper:lang line="global:email" }}" />
      <label>Password</label>
      <input type="password" id="password" name="password" maxlength="20" placeholder="{{ helper:lang line="global:password" }}" /> 
      <input type="submit" value="{{ helper:lang line='user:login_btn' }}" name="btnLogin" class="btn" id="login_nav" />
      <div id="login"><p><input type="checkbox" id="remember-checksidebar" name="remember" value="1"  /> {{ helper:lang line="user:remember" }} <hr />
 <a href="{{ url:site }}users/reset_pass">Reset Password</a> |  <a href="{{ url:site }}register">Join Fluorish</a></p></div>
       
    </form>
   
  </div>
</li>
</nav>
{{ endif }}
</div>
<!-- End user meta -->
</div>
</div>
</header>
<!-- Header END -->

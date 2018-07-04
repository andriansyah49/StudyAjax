<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel Ajax</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class=""><a href="/">Home</a></li>
            <li class="@stack('jabatan')"><a href="{{ url('jabatan') }}">Jabatan</a></li>
            <li class="@stack('pegawai')"><a href="{{ url('pegawai') }}">Pegawai</a></li>
        </ul>
        <ul id="navbar" class="nav navbar-nav navbar-right">
            <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="label label-pill lable-danger count"></span><i class="fa fa-bell"></i> Notification</a>
                <ul class="dropdown-menu"></ul>
              </li>
        </ul>
    </div>
    </div>
</nav>
<br><br><br>
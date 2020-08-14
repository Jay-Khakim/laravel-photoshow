 <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
 <a class="navbar-brand" href=" {{ route("album-index",  app()->getLocale())}}">{{__("Photoshow")}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link {{Request::is('/',app()->getLocale() )? 'active': ''}}" href="{{ route("album-index",  app()->getLocale())}}">{{__("Home")}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::is('/album/create', app()->getLocale())? 'active': ''}}" href="{{ route("album-create",  app()->getLocale())}}">{{__("Create Album")}}</a>
      </li>
    </ul>
    
  </div>
</nav>
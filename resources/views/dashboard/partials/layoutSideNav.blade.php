<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
    <div class="nav">
      <div class="sb-sidenav-menu-heading">Core</div>
      <a class="nav-link" href="{{url('dashboard')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard
      </a>
      <div class="sb-sidenav-menu-heading">Stock</div>
      <a class="nav-link" href="{{url('stock')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-cubes fa-lg"></i></div>
          Stock
      </a>
      <div class="sb-sidenav-menu-heading">Commands</div>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCommandes" aria-expanded="false" aria-controls="collapseCommandes">
        <div class="sb-nav-link-icon">
            <i class="fas fa-columns"></i>
        </div>
        <div>
            Commands <span class="badge bg-danger"> 
               {{$newCommandes}}
            </span>
        </div>
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseCommandes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{route('commande.create')}}">Add Command</a>
            <div>
                <a class="nav-link d-inline" href="{{route('commande.standby.list')}}">Standby</a> <span class="badge bg-danger">{{$newCommandes}}</span>
            </div>
              <a class="nav-link" href="{{route('commande.approved.list')}}">Approved</a>
              <a class="nav-link" href="{{route('commande.rejected.list')}}">Rejected</a>
          </nav>
      </div>
      <div class="sb-sidenav-menu-heading">Reclamations</div>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReclamation" aria-expanded="false" aria-controls="collapseReclamation">
          <div class="sb-nav-link-icon">
              <i class="fas fa-columns"></i>
          </div>
          <div>
              Reclamations <span class="badge bg-danger">{{$newReclamation}}</span>
          </div>
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapseReclamation" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href={{route('reclamation.create')}}>Add Reclamation</a>
              <div>
                <a class="nav-link d-inline" href="{{route('reclamation.index')}}">Standby</a> <span class="badge bg-danger">{{$newReclamation}}</span>
              </div>
              <a class="nav-link" href="{{route('reclamation.resolved.list')}}">Resolved</a>
              <a class="nav-link" href="{{route('reclamation.rejected.list')}}">Rejected</a>
          </nav>
      </div>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
          Pages
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="login.html">Login</a>
                      <a class="nav-link" href="register.html">Register</a>
                      <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
              </div>
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="401.html">401 Page</a>
                      <a class="nav-link" href="404.html">404 Page</a>
                      <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
              </div>
          </nav>
      </div>
      <div class="sb-sidenav-menu-heading">Addons</div>
      <a class="nav-link" href="charts.html">
          <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
          Charts
      </a>
      <a class="nav-link" href="tables.html">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
          Tables
      </a>
    </div>
  </div>
  <div class="sb-sidenav-footer">
      <div class="small">Logged in as:</div>
      Super Adminstrator <i class="fas fa-user-cog"></i>
  </div>
</nav>

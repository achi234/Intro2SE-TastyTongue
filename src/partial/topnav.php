<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            <img src="./assets/image/logo-with-text.png" height=60%vh width="70%vw">
          </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav navbar-user" style="font-weight: 700;">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">

              <!-- Reservation_Choices -->
              <div class="user_option custom_reservation">
                <ul class="navbar-nav align-items-start d-none d-md-flex">
                  <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <div class="media align-items-center">
                        <div class="media-body ml-2 d-none d-lg-inline-block">
                          <span class="mb-0"> Reservation</span>
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right custom_dropdown-menu">
                      <a href="login.php" class="custom_dropdown-item">
                        <span>New reservation </span>
                      </a>
                      <div class="custom_dropdown-divider"></div>
                      <a href="login.php" class="custom_dropdown-item">
                        <span class="align-items-center">Current reservation</span>
                      </a>
                      <div class="custom_dropdown-divider"></div>
                      <a href="login.php" class="custom_dropdown-item">
                        <span>Receipts</span>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- User -->
          <div class="user_option">
            <ul class="navbar-nav align-items-center d-none d-md-flex">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="login.php" role="button">
                  <span class="mb-0 d-lg-inline-block">
                    Login
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->
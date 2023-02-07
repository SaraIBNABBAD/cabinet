@extends('admin.templateAd')
@section('title','dash')
@section('content')

<main class="main users chart-page" id="skip-target">
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span
                            class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span
                            class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span
                            class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span
                            class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span
                            class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-light text-black shadow">
                        <div class="card-body">
                            Light
                            <div class="text-black-50 small">#f8f9fc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark text-white shadow">
                        <div class="card-body">
                            Dark
                            <div class="text-white-50 small">#5a5c69</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a
                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div>

</div>
    {{-- <div class="container">
      <h2 class="main-title">Dashboard</h2>
      <div class="row stat-cards">
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon primary">
              <i data-feather="bar-chart-2" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num">1478 286</p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit success">
                  <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                </span>
                Last month
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon warning">
              <i data-feather="file" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num">1478 286</p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit success">
                  <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                </span>
                Last month
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon purple">
              <i data-feather="file" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num">1478 286</p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit danger">
                  <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                </span>
                Last month
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon success">
              <i data-feather="feather" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num">1478 286</p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit warning">
                  <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                </span>
                Last month
              </p>
            </div>
          </article>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9">
          <div class="chart">
            <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
          </div>
          <div class="users-table table-wrapper">
            <table class="posts-table">
              <thead>
                <tr class="users-table-info">
                  <th>
                    <label class="users-table__checkbox ms-20">
                      <input type="checkbox" class="check-all">Thumbnail
                    </label>
                  </th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="category"></picture>
                      </div>
                    </label>
                  </td>
                  <td>
                    Starting your traveling blog with Vasco
                  </td>
                  <td>
                    <div class="pages-table-img">
                      <picture><source srcset="./img/avatar/avatar-face-04.webp" type="image/webp"><img src="./img/avatar/avatar-face-04.png" alt="User Name"></picture>
                      Jenny Wilson
                    </div>
                  </td>
                  <td><span class="badge-pending">Pending</span></td>
                  <td>17.04.2021</td>
                  <td>
                    <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="##">Edit</a></li>
                        <li><a href="##">Quick edit</a></li>
                        <li><a href="##">Trash</a></li>
                      </ul>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="./img/categories/02.webp" type="image/webp"><img src="./img/categories/02.jpg" alt="category"></picture>
                      </div>
                    </label>
                  </td>
                  <td>
                    Start a blog to reach your creative peak
                  </td>
                  <td>
                    <div class="pages-table-img">
                      <picture><source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name"></picture>
                      Annette Black
                    </div>
                  </td>
                  <td><span class="badge-pending">Pending</span></td>
                  <td>23.04.2021</td>
                  <td>
                    <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="##">Edit</a></li>
                        <li><a href="##">Quick edit</a></li>
                        <li><a href="##">Trash</a></li>
                      </ul>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="./img/categories/03.webp" type="image/webp"><img src="./img/categories/03.jpg" alt="category"></picture>
                      </div>
                    </label>
                  </td>
                  <td>
                    Helping a local business reinvent itself
                  </td>
                  <td>
                    <div class="pages-table-img">
                      <picture><source srcset="./img/avatar/avatar-face-02.webp" type="image/webp"><img src="./img/avatar/avatar-face-02.png" alt="User Name"></picture>
                      Kathryn Murphy
                    </div>
                  </td>
                  <td><span class="badge-active">Active</span></td>
                  <td>17.04.2021</td>
                  <td>
                    <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="##">Edit</a></li>
                        <li><a href="##">Quick edit</a></li>
                        <li><a href="##">Trash</a></li>
                      </ul>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="./img/categories/04.webp" type="image/webp"><img src="./img/categories/04.jpg" alt="category"></picture>
                      </div>
                    </label>
                  </td>
                  <td>
                    Caring is the new marketing
                  </td>
                  <td>
                    <div class="pages-table-img">
                      <picture><source srcset="./img/avatar/avatar-face-05.webp" type="image/webp"><img src="./img/avatar/avatar-face-05.png" alt="User Name"></picture>
                      Guy Hawkins
                    </div>
                  </td>
                  <td><span class="badge-active">Active</span></td>
                  <td>17.04.2021</td>
                  <td>
                    <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="##">Edit</a></li>
                        <li><a href="##">Quick edit</a></li>
                        <li><a href="##">Trash</a></li>
                      </ul>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="category"></picture>
                      </div>
                    </label>
                  </td>
                  <td>
                    How to build a loyal community online and offline
                  </td>
                  <td>
                    <div class="pages-table-img">
                      <picture><source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name"></picture>
                      Robert Fox
                    </div>
                  </td>
                  <td><span class="badge-active">Active</span></td>
                  <td>17.04.2021</td>
                  <td>
                    <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="##">Edit</a></li>
                        <li><a href="##">Quick edit</a></li>
                        <li><a href="##">Trash</a></li>
                      </ul>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="users-table__checkbox">
                      <input type="checkbox" class="check">
                      <div class="categories-table-img">
                        <picture><source srcset="./img/categories/03.webp" type="image/webp"><img src="./img/categories/03.jpg" alt="category"></picture>
                      </div>
                    </label>
                  </td>
                  <td>
                    How to build a loyal community online and offline
                  </td>
                  <td>
                    <div class="pages-table-img">
                      <picture><source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name"></picture>
                      Robert Fox
                    </div>
                  </td>
                  <td><span class="badge-active">Active</span></td>
                  <td>17.04.2021</td>
                  <td>
                    <span class="p-relative">
                      <button class="dropdown-btn transparent-btn" type="button" title="More info">
                        <div class="sr-only">More info</div>
                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                      </button>
                      <ul class="users-item-dropdown dropdown">
                        <li><a href="##">Edit</a></li>
                        <li><a href="##">Quick edit</a></li>
                        <li><a href="##">Trash</a></li>
                      </ul>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-3">
          <article class="customers-wrapper">
            <canvas id="customersChart" aria-label="Customers statistics" role="img"></canvas>
            <!--              <p class="customers__title">New Customers <span>+958</span></p>
            <p class="customers__date">28 Daily Avg.</p>
            <picture><source srcset="./img/svg/customers.svg" type="image/webp"><img src="./img/svg/customers.svg" alt=""></picture> -->
          </article>
          <article class="white-block">
            <div class="top-cat-title">
              <h3>Top categories</h3>
              <p>28 Categories, 1400 Posts</p>
            </div>
            <ul class="top-cat-list">
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    Lifestyle <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Dailiy lifestyle articles <span class="purple">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    Tutorials <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Coding tutorials <span class="blue">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    Technology <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Dailiy technology articles <span class="danger">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    UX design <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    UX design tips <span class="success">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    Interaction tips <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Interaction articles <span class="warning">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    App development <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Mobile development articles <span class="warning">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    Nature <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Wildlife animal articles <span class="warning">+472</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="top-cat-list__title">
                    Geography <span>8.2k</span>
                  </div>
                  <div class="top-cat-list__subtitle">
                    Geography articles <span class="primary">+472</span>
                  </div>
                </a>
              </li>
            </ul>
          </article>
        </div>
      </div>
    </div> --}}
  </main>
@endsection
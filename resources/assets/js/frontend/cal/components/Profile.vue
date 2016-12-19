<template>
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User Profile</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Report <small>Activity report</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                </div>
              </div>
              <h3>Samuel Doe</h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                </li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-external-link user-profile-icon"></i>
                  <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                </li>
              </ul>

              <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
              <br>

              <!-- start skills -->
              <h4>Skills</h4>
              <ul class="list-unstyled user_data">
                <li>
                  <p>Web Applications</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                  </div>
                </li>
                <li>
                  <p>Website Design</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                  </div>
                </li>
                <li>
                  <p>Automation &amp; Testing</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" aria-valuenow="29" style="width: 30%;"></div>
                  </div>
                </li>
                <li>
                  <p>UI / UX</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                  </div>
                </li>
              </ul>
              <!-- end of skills -->

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="profile_title">
                <div class="col-md-6">
                  <h2>User Activity Report</h2>
                </div>
                <div class="col-md-6">
                  <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>November 20, 2016 - December 19, 2016</span> <b class="caret"></b>
                  </div>
                </div>
              </div>
              <!-- start of user-activity-graph -->
              <div id="graph_bar" style="width: 100%; height: 280px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="280" version="1.1" width="1132" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël @@VERSION</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="34.84375" y="201.207564890125" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M47.34375,201.207564890125H1107" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.84375" y="157.15567366759376" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.01504866759376" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#aaaaaa" d="M47.34375,157.15567366759376H1107" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.84375" y="113.1037824450625" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.010032445062507" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">200</tspan></text><path fill="none" stroke="#aaaaaa" d="M47.34375,113.1037824450625H1107" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.84375" y="69.05189122253125" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.005016222531253" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">300</tspan></text><path fill="none" stroke="#aaaaaa" d="M47.34375,69.05189122253125H1107" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.84375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">400</tspan></text><path fill="none" stroke="#aaaaaa" d="M47.34375,25H1107" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="1054.0171875" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,336.7636,1032.6686)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Oct</tspan></text><text x="948.0515625" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,283.1152,941.7765)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Sep</tspan></text><text x="842.0859375" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,229.6308,849.1389)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Aug</tspan></text><text x="736.1203125" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,178.6464,754.7692)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jul</tspan></text><text x="630.1546875" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,124.662,664.7296)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jun</tspan></text><text x="524.1890625" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,70.8495,574.9742)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">May</tspan></text><text x="418.2234375" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,18.3652,482.3501)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Apr</tspan></text><text x="312.2578125" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-34.6114,391.4445)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Mar</tspan></text><text x="206.2921875" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-87.5958,299.1045)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Feb</tspan></text><text x="100.3265625" y="213.707564890125" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-140.252,205.885)"><tspan dy="4.004439890125013" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Jan</tspan></text><rect x="60.589453125" y="165.9660519121" width="38.237109375" height="35.241512978025014" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="166.555078125" y="146.14270086196095" width="38.237109375" height="55.06486402816407" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="272.52070312499995" y="123.67623633847" width="38.237109375" height="77.53132855165501" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="378.486328125" y="102.53132855165501" width="38.237109375" height="98.67623633847" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="484.451953125" y="84.47005315041719" width="38.237109375" height="116.73751173970783" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="590.417578125" y="62.884626451376874" width="38.237109375" height="138.32293843874814" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="696.383203125" y="48.34750234794157" width="38.237109375" height="152.86006254218344" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="802.348828125" y="74.77863708146032" width="38.237109375" height="126.4289278086647" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="908.314453125" y="95.48302595605" width="38.237109375" height="105.72453893407501" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="1014.280078125" y="108.25807441058407" width="38.237109375" height="92.94949047954094" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
              <!-- end of user-activity-graph -->

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <!-- start recent activity -->
                    <ul class="messages">
                      <li>
                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                        <div class="message_date">
                          <h3 class="date text-info">24</h3>
                          <p class="month">May</p>
                        </div>
                        <div class="message_wrapper">
                          <h4 class="heading">Desmond Davison</h4>
                          <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                          <br>
                          <p class="url">
                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                          </p>
                        </div>
                      </li>
                      <li>
                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                        <div class="message_date">
                          <h3 class="date text-error">21</h3>
                          <p class="month">May</p>
                        </div>
                        <div class="message_wrapper">
                          <h4 class="heading">Brian Michaels</h4>
                          <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                          <br>
                          <p class="url">
                            <span class="fs1" aria-hidden="true" data-icon=""></span>
                            <a href="#" data-original-title="">Download</a>
                          </p>
                        </div>
                      </li>
                      <li>
                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                        <div class="message_date">
                          <h3 class="date text-info">24</h3>
                          <p class="month">May</p>
                        </div>
                        <div class="message_wrapper">
                          <h4 class="heading">Desmond Davison</h4>
                          <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                          <br>
                          <p class="url">
                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                          </p>
                        </div>
                      </li>
                      <li>
                        <img src="images/img.jpg" class="avatar" alt="Avatar">
                        <div class="message_date">
                          <h3 class="date text-error">21</h3>
                          <p class="month">May</p>
                        </div>
                        <div class="message_wrapper">
                          <h4 class="heading">Brian Michaels</h4>
                          <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                          <br>
                          <p class="url">
                            <span class="fs1" aria-hidden="true" data-icon=""></span>
                            <a href="#" data-original-title="">Download</a>
                          </p>
                        </div>
                      </li>

                    </ul>
                    <!-- end recent activity -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                    <!-- start user projects -->
                    <table class="data table table-striped no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Project Name</th>
                          <th>Client Company</th>
                          <th class="hidden-phone">Hours Spent</th>
                          <th>Contribution</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">18</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="35" aria-valuenow="35" style="width: 35%;"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>New Partner Contracts Consultanci</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">13</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-danger" data-transitiongoal="15" aria-valuenow="15" style="width: 15%;"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Partners and Inverstors report</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">30</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="45" aria-valuenow="45" style="width: 45%;"></div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>New Company Takeover Review</td>
                          <td>Deveint Inc</td>
                          <td class="hidden-phone">28</td>
                          <td class="vertical-align-mid">
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" data-transitiongoal="75" aria-valuenow="75" style="width: 75%;"></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                      photo booth letterpress, commodo enim craft beer mlkshk </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
    export default {

    }
  </script>

<!-- Content
<!-- Black block starts -->
<div class="blue-block">
    <div class="page-title">
        <h3 class="pull-left"><i class="fa fa-desktop"></i> Candidates <span>Search your wishes</span></h3>

        <div class="breads pull-right">
            <a href="#">Home </a>/ <a href="#">Pages </a>/ Title
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Black block ends -->
<!-- Content starts -->

<div class="container">
    <div class="page-content page-tables">

        <div class="widget">
            <h4>Cabdidate Search</h4>

            <div class="row">

                <div class="col-md-7">
                    <!-- Make post Widget -->
                    <div class="widget">

                        <!-- Advanced search -->
                        <h5><i class="fa fa-search"></i> Advanced Search</h5>

                        <p>Search users by name, email, phone, etc.,</p>

                        <form role="form">


                            <div class="form-group">
                                <label for="email">Email age</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter age">
                            </div>


                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control">
                                    <option>USA</option>
                                    <option>India</option>
                                    <option>Canada</option>
                                    <option>South Africa</option>
                                    <option>China</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1"> xxxx
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" value="option2"> xxxx
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" value="option3"> xxxx
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Include Banned Users?
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Search</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>

                    </div>
                </div>

                <div class="col-md-5">
                    <!-- Make post Widget -->


                    <strong>Category</strong>

                    <div class="check-box">
                        <label><input type='checkbox' value='check1'/> xxxx</label>
                    </div>
                    <div class="check-box">
                        <label><input type='checkbox' value='check2'/> xxxxxxxx</label>
                    </div>
                    <div class="check-box">
                        <label><input type='checkbox' value='check3'/> xxxxx</label>
                    </div>

                    <hr/>
                    <strong>Tags</strong>
                    <input class="col-lg-12 form-control" type="text" placeholder="Tags"><br/>

                    <div class="clearfix"></div>
                </div>


            </div>

        </div>


        <div class="widget">
            <div class="widget-head">
                <h5>Table #1</h5>
            </div>
            <div class="widget-body no-padd">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Age</th>
                            <th>Education</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo $this->Html->link('Ashok',array('action'=>'detail'));?></td>
                            <td>India</td>
                            <td>23</td>
                            <td>B.Tech</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kumarasamy</td>
                            <td>USA</td>
                            <td>22</td>
                            <td>BE</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Babura</td>
                            <td>UK</td>
                            <td>43</td>
                            <td>PhD</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ravi Kumar</td>
                            <td>China</td>
                            <td>73</td>
                            <td>PUC</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Santhosh</td>
                            <td>Japan</td>
                            <td>43</td>
                            <td>M.Tech</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="widget-foot">

                <ul class="pagination pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>

                <div class="clearfix"></div>
            </div>

        </div>

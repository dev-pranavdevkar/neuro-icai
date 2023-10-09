@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Our Success Stories</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Our Success Stories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="choose mt-5 spad ">
        <div class="container">

            {{-- ======================================================================================= --}}
            <div class="">
                <div class="card successStoriesCard">


                    <div class="card-body">
                        <table class="table table-bordered ">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">From</th>
                                    <th scope="col">Award Details</th>
                                    <th scope="col">Chairman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-center">01</th>
                                    <td class="text-center">1985-86</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch of Regional Council</td>
                                    <td>CA. Shashikant Barve</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">02</th>
                                    <td class="text-center">1989-87</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch of Regional Council</td>
                                    <td>CA. Shashikant Barve</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">03</th>
                                    <td class="text-center">1989-90</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch of Regional Council</td>
                                    <td>CA. Vardhaman Jain</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">04</th>
                                    <td class="text-center">1992-93</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Ashokkumar Pagaria</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">05</th>
                                    <td class="text-center">1992-93</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch of WIRC</td>
                                    <td>CA. Ashokkumar Pagaria</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">06</th>
                                    <td class="text-center">1993-94</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Prakash Agashe</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">07</th>
                                    <td class="text-center">1994-95</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch of WIRC</td>
                                    <td>CA. Santosh Gandhi</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">08</th>
                                    <td class="text-center">1999-00 </td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch of WIRC</td>
                                    <td>CA. Sudhir Tidke</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">09</th>
                                    <td class="text-center">2008-09</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Dinesh Gandhi</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">10</th>
                                    <td class="text-center">2010-11</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Certificate of Appreciation-organizing a Unique Programme</td>
                                    <td>CA. Narendra Agarwal</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">11</th>
                                    <td class="text-center">2012-13</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Sanjay Pawar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">12</th>
                                    <td class="text-center">2012-13</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch of WIRC</td>
                                    <td>CA. Sanjay Pawar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">13</th>
                                    <td class="text-center">2013-14</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Jagdeesh Dhongde</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">14</th>
                                    <td class="text-center">2013-14</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Highly Commended Performance Certificate</td>
                                    <td>CA. Rajeshkumar Patil</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">15</th>
                                    <td class="text-center">2014-15</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Rajeshkumar Patil</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">16</th>
                                    <td class="text-center">2014-15</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Highly Commended Performance Certificate</td>
                                    <td>CA. Yashwant Kasar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">17</th>
                                    <td class="text-center">2015-16</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch of Regional Council</td>
                                    <td>CA. Yashwant Kasar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">18</th>
                                    <td class="text-center">2015-16</td>
                                    <td class="text-center">ICAI</td>
                                    <td>WICASA-Best Branch of Regional Council</td>
                                    <td>CA. Anand Jakhotiya</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">19</th>
                                    <td class="text-center">2015-16</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch of Regional Council</td>
                                    <td>CA. Yashwant Kasar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">20</th>
                                    <td class="text-center">1985-86</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Highly Commended Performance Certificate</td>
                                    <td>CA. Shashikant Barve</td>
                                <tr>
                                <tr>
                                    <th scope="row" class="text-center">21</th>
                                    <td class="text-center">2016-17</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch at National Level – 2nd Prize</td>
                                    <td>CA. Rekha Dhamankar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">22</th>
                                    <td class="text-center">2016-17</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch at Regional Level – 1st Prize</td>
                                    <td>CA. Rekha Dhamankar</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">23</th>
                                    <td class="text-center">2016-17</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Best Branch at Regional Level – 2nd Prize</td>
                                    <td>CA. Charuhas Upasani</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-center">24</th>
                                    <td class="text-center">2017-18</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch at Regional Level – 2nd Prize</td>
                                    <td>CA. Arun Anandagiri</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">25</th>
                                    <td class="text-center">2017-18</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Best Branch at Regional Level – 2nd Prize</td>
                                    <td>CA. Rajesh Agrawal</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">26</th>
                                    <td class="text-center">2018-19</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch at National Level - 2nd Prize</td>
                                    <td>CA. Anand Jakhotiya</td>
                                </tr>
                               <th scope="row" class="text-center">27</th>
                                <td class="text-center">2018-19</td>
                                <td class="text-center">ICAI</td>
                                <td>WICASA-Best Branch at National Level - 1st Prize</td>
                                <td>CA. Rajesh Agrawal</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">28</th>
                                    <td class="text-center">2018-19</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Anand Jakhotiya</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">29</th>
                                    <td class="text-center">2018-19</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Rajesh Agrawal</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">30</th>
                                    <td class="text-center">2019-20</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch at National Level - 1st Prize</td>
                                    <td>CA. Ruta Chitale</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">31</th>
                                    <td class="text-center">2019-20</td>
                                    <td class="text-center">ICAI</td>
                                    <td>WICASA-Best Branch at National Level - 1st Prize</td>
                                    <td>CA. Abhishek Dhamne</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">32</th>
                                    <td class="text-center">2019-20</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Ruta Chitale</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">33</th>
                                    <td class="text-center">2019-20</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Abhishek Dhamne</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">34</th>
                                    <td class="text-center">2020-21</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch at National Level - 2nd Prize</td>
                                    <td>CA. Abhishek Dhamne</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">35</th>
                                    <td class="text-center">2020-21</td>
                                    <td class="text-center">ICAI</td>
                                    <td>WICASA-Best Branch at National Level - 2nd Prize</td>
                                    <td>CA. Sameer Ladda</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">36</th>
                                    <td class="text-center">2020-21</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Abhishek Dhamne</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">37</th>
                                    <td class="text-center">2020-21</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Sameer Ladda</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">38</th>
                                    <td class="text-center">2021-22</td>
                                    <td class="text-center">ICAI</td>
                                    <td>Best Branch at National Level - 2nd Prize</td>
                                    <td>CA. Sameer Ladda</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">39</th>
                                    <td class="text-center">2021-22</td>
                                    <td class="text-center">ICAI</td>
                                    <td>WICASA-Best Branch at National Level - 2nd Prize</td>
                                    <td>CA. Kashinath Pathare</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">40</th>
                                    <td class="text-center">2021-22</td>
                                    <td class="text-center">WIRC</td>
                                    <td>Best Branch at Regional Level - 2nd Prize</td>
                                    <td>CA. Sameer Ladda</td>
                                </tr>
                                <tr>
                                   <th scope="row" class="text-center">41</th>
                                    <td class="text-center">2021-22</td>
                                    <td class="text-center">WIRC</td>
                                    <td>WICASA-Best Branch at Regional Level - 1st Prize</td>
                                    <td>CA. Kashinath Pathare</td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            {{-- ======================================================================================= --}}

        </div>
    </section>
@endsection

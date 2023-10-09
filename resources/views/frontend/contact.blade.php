@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option contact-breadcrumb set-bg"
        data-setbg="{{ url('frontend/img/breadcrumb/contact-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__text">
                            <div class="contact__form__title">
                                <h2>Get In Touch</h2>
                                <p>Please contact us or send us an email or go to our forum.</p>
                            </div>
                            <form action="#">
                                <div class="input-list">
                                    <input type="text" placeholder="Your name">
                                    <input type="text" placeholder="Your email">
                                </div>
                                <textarea placeholder="Your Message"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="contact__address__item">
                        <h4>Pune Branch</h4>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> <a class=""
                                    href="https://goo.gl/maps/asVSnzzd8GKHVHhe8"> ICAI Bhawan, Plot No. 8,<br />
                                    Near Mahavir Electronics,<br />
                                    Parshwanath Nagar, Bibwewadi,<br />
                                    Pune - 411 037</a>
                            </li>
                            <li><i class="fa fa-phone"></i><a href="tel:+918237166002"> (+91) 823-716-6002</a></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:pune@icai.org">pune@icai.org</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="contact__address__item">
                        <h4>Extension Counter</h4>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><a class="" href=""> Shree Shankar, 2nd Floor,
                                    <br />
                                    CTC No 6674, Mitramandal Colony,<br />Above Reliance Smart Point, <br />
                                    Parvati,
                                    Pune 411009</a>
                            </li>
                            <li><i class="fa fa-phone"></i><a href="tel:+918237166002"> (+91) 823-716-6002</a></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:pune@icai.org">pune@icai.org</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="contact__address__item">
                        <h4>Coaching Classes</h4>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><a class="" href="">Kumar Prestige Point, Gate
                                    No. 4,<br />
                                    1st Floor, Office No. 5A, Shukrawar Peth, <br />
                                    Pune –411002</a></li>
                            <li><i class="fa fa-phone"></i><a href="tel:+918237166002"> (+91) 823-716-6002</a></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:pune@icai.org">pune@icai.org</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container pb-5">
            <div class=" card organisation-chart-card">
                <div class="card-body">
                    <div class="section-title">
                        <h2>Organisation Chart</h2>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Sr. No</th>
                                <th scope="col">Particulars</th>
                                <th scope="col">Phone / Cell Number</th>
                                <th scope="col">Email Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="srno" scope="row">1</th>
                                <td class="particular"><b>Ms.Meenakshi</b><br />
                                    Help Desk For Branch office/Information about CA Course etc.
                                </td>
                                <td class="phone-number"><a href="tel:+918237166002">+91 82371 66002</a></td>
                                <td class="emailid"><a href="mailto:pune@icai.org">pune@icai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">2</th>
                                <td class="particular"><b>Ms.Shraddha</b><br />
                                    Prestige Point - Coaching Classes & <br>Help Desk For Extension Counter - Reading Room
                                    etc
                                </td>
                                <td class="phone-number"><a href="tel:+918237266002">+91 82372 66002</a> <br /> <a
                                        href="tel:+918237266002">+91 82372 66002</a></td>
                                <td class="emailid"><a
                                        href="mailto:admincoaching@puneicai.org">admincoaching@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">3</th>
                                <td class="particular"><b>Ms.Rohini</b><br />
                                    SSP & General Issues of Members & Students
                                </td>
                                <td class="phone-number"><a href="tel:+918237266114">+91 82372 66114</a></td>
                                <td class="emailid"><a href="mailto:student@puneicai.org">student@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">4</th>
                                <td class="particular"><b>Ms.Swati</b><br />
                                    Student Section- GMCS, Orientation Section, Career Counselling Sessions, SSP Issues,
                                    Firm Registration, Exam Forms Queries &<br />
                                    Administration at Prestige Point
                                </td>
                                <td class="phone-number"><a href="tel:+918237166004">+91 82371 66004</a></td>
                                <td class="emailid"><a href="mailto:student@puneicai.org">student@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">5</th>
                                <td class="particular"><b>Ms.Shwetali</b><br />
                                    Student Section- WICASA (Students) Seminars, ITT & Advance ITT Section, SSP Issues.
                                </td>
                                <td class="phone-number"><a href="tel:+918237166003">+91 82371 66003</a><br /><a
                                        href="tel:+918237166005">+91 82371 66005</a></td>
                                <td class="emailid"><a href="mailto:wicasa@puneicai.org">wicasa@puneicai.org</a><br /><a
                                        href="mailto:ssp@puneicai.org">ssp@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">6</th>
                                <td class="particular"><b>Ms.Swati / Ms.Shwetali</b><br />
                                    Seminar Section- Programmes for Members & Students, CPE Hrs. Related queries, etc.<br />
                                    Newsletter– Articles, Advertisements etc.
                                </td>
                                <td class="phone-number"><a href="tel:+918237166006">+91 82371 66006</a></td>
                                <td class="emailid"><a href="mailto:cpe@puneicai.org">cpe@puneicai.org</a><br /><a
                                        href="mailto:editor@puneicai.org">editor@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">7</th>
                                <td class="particular"><b>Mr.Mayur</b><br />
                                    Queries from Members about COP, Membership Fees, Certificate Courses, Convocation,
                                    Campus Placement etc.
                                </td>
                                <td class="phone-number"><a href="tel:+918237166114">+91 82371 66114</a></td>
                                <td class="emailid"><a href="mailto:punedco@icai.org">punedco@icai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">8</th>
                                <td class="particular"><b>Ms.Suvarna / Mr.Ramesh</b><br />
                                    Accounts Section, GST Invoice, Sponsorship etc.
                                </td>
                                <td class="phone-number"><a href="tel:+918237166113">+91 82371 66113</a></td>
                                <td class="emailid"><a href="mailto:accounts@puneicai.org">accounts@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">9</th>
                                <td class="particular"><b> Mr.Deepak</b><br />
                                    Branch General Administration & If any of the above numbers not responding in the
                                    working hours.
                                </td>
                                <td class="phone-number"><a href="tel:+918237166008">+91 82371 66008</a></td>
                                <td class="emailid"><a href="mailto:admin@puneicai.org">admin@puneicai.org</a></td>
                            </tr>


                        </tbody>
                    </table>


                    <div class="section-title mt-5">
                        <h3>Office Bearers of Branch Managing Committee</h3>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Sr.No</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Email Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="srno" scope="row">1</th>
                                <td class="particular">Chairman of Pune ICAI</td>
                                <td class="emailid"><a href="mailto:chairman@puneicai.org">chairman@puneicai.org</a></td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">2</th>
                                <td class="particular">Vice Chairman of Pune ICAI</td>
                               
                                <td class="emailid"><a
                                        href="mailto:vicechairman@puneicai.org">vicechairman@puneicai.org</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">3</th>
                                <td class="particular">Secretary of Pune ICAI</td>
                             
                                <td class="emailid"><a
                                        href="mailto:secretary@puneicai.org">secretary@puneicai.org</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="srno" scope="row">4</th>
                                <td class="particular">Treasurer of Pune ICAI</td>
                            
                                <td class="emailid"><a href="mailto:	treasurer@puneicai.org">treasurer@puneicai.org</a>
                                </td>
                            </tr>




                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->
@endsection

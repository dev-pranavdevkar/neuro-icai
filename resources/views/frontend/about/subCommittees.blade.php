@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sub Committees</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.html">About Us</a>
                            <span>Sub Committees</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <section class="choose mt-5 spad ">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Newsletter</h2>
                        <p>This question should make the viewer want to open the brochure to learn more.</p>
                    </div>
                </div>
            </div> --}}








            {{-- ======================================================================================= --}}
            <div class="services__details__faq">
                <div class="accordion " id="accordionExample">
                    <div class="card">
                        <div class="card-heading active">
                            <a data-toggle="collapse" data-target="#collapseOne">
                                <span>CPE Committee</span>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Rajesh Agrawal</td>
                                            <td>Chairman</td>
                                            <td class="text-center"><a href="tel:+919823975174">+91 9823975174</a></td>
                                            <td><a href="mailto:carragrawal@gmail.com">carragrawal@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
                                            <td>CA. Amruta Kulkarni</td>
                                            <td>Vice Chairman</td>
                                            <td class="text-center"><a href="tel:+919881434468">+91 9881434468</a></td>
                                            <td><a href="mailto:amrutamkulkarni@gmail.com">amrutamkulkarni@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Pranav Apte</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919881132594">+91 9881132594</a></td>
                                            <td><a href="mailto:capranav85@gmail.com">capranav85@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Pritesh Munot</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919860656291">+91 9860656291</a></td>
                                            <td><a href="mailto:pritesh_munot@rediffmail.com">pritesh_munot@rediffmail.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>CA. Meghnand Dungarwal</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919850047411">+91 9850047411</a></td>
                                            <td><a href="mailto:meghnand.dungarwal@gmail.com">meghnand.dungarwal@gmail.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">06</th>
                                            <td>CA. Parag Rathi</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919689947699">+91 9689947699</a></td>
                                            <td><a href="mailto:parag@rathiandrathi.com">parag@rathiandrathi.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">07</th>
                                            <td>Ms. Reshma Shinde</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166006">+91 8237166006</a></td>
                                            <td><a href="mailto:carragrawal@gmail.com">cpe@puneicai.org</a></td>
                                        </tr>
    
    
                                    </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading ">
                            <a data-toggle="collapse" data-target="#collapseTwo">
                                Direct Taxation Committee
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse " data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Pranav Apte</td>
                                            <td>Chairman</td>
                                            <td class="text-center"><a href="tel:+919881132594">+91 9881132594</a></td>
                                            <td><a href="mailto:capranav85@gmail.com">capranav85@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
                                            <td>CA. Moushmi Shaha</td>
                                            <td>Vice Chairman</td>
                                            <td class="text-center"><a href="tel:+919822818188">+91 9822818188</a></td>
                                            <td><a href="mailto:moushmimehata@gmail.com">moushmimehata@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Sachin Miniyar</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919422016303">+91 9422016303</a></td>
                                            <td><a href="mailto:miniyarsachin@gmail.com">miniyarsachin@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Ajinkya Ranadive</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919850718194">+91 9850718194</a></td>
                                            <td><a href="mailto:ca.ajinkya@capra.co.in">ca.ajinkya@capra.co.in</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>CA. Apoorva Chandakkar</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919930180886">+91 9930180886</a></td>
                                            <td><a href="mailto:apoorv@caayc.in">apoorv@caayc.in</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">06</th>
                                            <td>CA. Narendra Joshi</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919881536977">+91 9881536977</a></td>
                                            <td><a href="mailto:parag@rathiandrathi.com">parag@rathiandrathi.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">07</th>
                                            <td>Ms. Swati khule</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166004">+91 8237166004</a></td>
                                            <td><a href="mailto:student@puneicai.org"> student@puneicai.org</a></td>
                                        </tr>
    
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseThree">
                                Indirect Taxation Committee
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Ajinkya Ranadive</td>
                                            <td>Convenor</td>
                                            <td class="text-center"><a href="tel:+919850718194">+91 9850718194</a></td>
                                            <td><a href="mailto:ca.ajinkya@capra.co.in">ca.ajinkya@capra.co.in</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
                                            <td>CA. Rajesh Agrawal</td>
                                            <td>Deputy Convenor</td>
                                            <td class="text-center"><a href="tel:+919823975174">+91 9823975174</a></td>
                                            <td><a href="mailto:carragrawal@gmail.com">carragrawal@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Pritesh Munot</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919860656291">+91 9860656291</a></td>
                                            <td><a href="mailto:pritesh_munot@rediffmail.com">pritesh_munot@rediffmail.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Kashinath Pathare</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919890625758">+91 9890625758</a></td>
                                            <td><a href="mailto:kbpathare@gmail.com">kbpathare@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>Ms. Meenakshi Shinde</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166002">+91 8237166002</a></td>
                                            <td><a href="mailto:pune@icai.org">pune@icai.org</a></td>
                                        </tr>
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseFour">
                                Information Technology Committee
                            </a>
                        </div>
                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                              
                            <table class="table table-bordered ">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Email Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center">01</th>
                                        <td>CA. Pritesh Munot</td>
                                        <td>Chairman</td>
                                        <td class="text-center"><a href="tel:+919860656291">+91 9860656291</a></td>
                                        <td><a href="mailto:pritesh_munot@rediffmail.com">pritesh_munot@rediffmail.com</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">02</th>
                                        <td>CA. Pranav Apte</td>
                                        <td>Vice Chairman</td>
                                        <td class="text-center"><a href="tel:+919881132594">+91 9881132594</a></td>
                                        <td><a href="mailto:capranav85@gmail.com">capranav85@gmail.com</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">03</th>
                                        <td>CA. Rajesh Agrawal</td>
                                        <td>Member</td>
                                        <td class="text-center"><a href="tel:+919823975174">+91 9823975174</a></td>
                                        <td><a href="mailto:carragrawal@gmail.com">carragrawal@gmail.com</a></td>

                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">04</th>
                                        <td>CA. Ajinkya Ranadive</td>
                                        <td>Member</td>
                                        <td class="text-center"><a href="tel:+919850718194">+91 9850718194</a></td>
                                        <td><a href="mailto:ca.ajinkya@capra.co.in">ca.ajinkya@capra.co.in</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">05</th>
                                        <td>Mr. Deepak Korgaonkar</td>
                                        <td>Secretary, (Branch Staff)</td>
                                        <td class="text-center"><a href="tel:+918237166008">+91 8237166008</a></td>
                                        <td><a href="mailto:admin@puneicai.org">admin@puneicai.org</a></td>
                                    </tr>

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseFive">
                                Newsletter Committee
                            </a>
                        </div>
                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Hrishikesh Badve</td>
                                            <td>Chairman</td>
                                            <td class="text-center"><a href="tel:+918087797657">+91 8087797657</a></td>
                                            <td><a href="mailto:h.badve@mbandasso.com">h.badve@mbandasso.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
                                            <td>CA. Sachin Miniyar</td>
                                            <td>Vice Chairman</td>
                                            <td class="text-center"><a href="tel:+919422016303">+91 9422016303</a></td>
                                            <td><a href="mailto:miniyarsachin@gmail.com">miniyarsachin@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Amruta Kulkarni</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919881434468">+91 9881434468</a></td>
                                            <td><a href="mailto:amrutamkulkarni@gmail.com">amrutamkulkarni@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Kashinath Pathare</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919890625758">+91 9890625758</a></td>
                                            <td><a href="mailto:kbpathare@gmail.com">kbpathare@gmail.com</a></td>
    
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>CA. Sarika Dindokar</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919765265588">+91 9765265588</a></td>
                                            <td><a href="mailto:ca.work789@gmail.com">ca.work789@gmail.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">06</th>
                                            <td>CA.Nupura Rawal</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919767390894">+91 9767390894</a></td>
                                            <td><a href="mailto:nupura.rawal@gmail.com">nupura.rawal@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">07</th>
                                            <td>Ms. Reshma Shinde</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166006">+91 8237166006</a></td>
                                            <td><a href="mailto:editor@puneicai.org">editor@puneicai.org</a></td>
                                        </tr>
    
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseSix">
                                Library Committee
                            </a>
                        </div>
                        <div id="collapseSix" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Kashinath Pathare</td>
                                            <td> Chairman</td>
                                            <td class="text-center"><a href="tel:+919890625758">+91 9890625758</a></td>
                                            <td><a href="mailto:kbpathare@gmail.com">kbpathare@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
                                            <td>CA. Ajinkya Ranadive</td>
                                            <td>Vice Chairman</td>
                                            <td class="text-center"><a href="tel:+919850718194">+91 9850718194</a></td>
                                            <td><a href="mailto:ca.ajinkya@capra.co.in">ca.ajinkya@capra.co.in</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Sachin Miniyar</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919422016303">+91 9422016303</a></td>
                                            <td><a href="mailto:miniyarsachin@gmail.com">miniyarsachin@gmail.com</a></td>
    
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Hrishikesh Badve</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+918087797657">+91 8087797657</a></td>
                                            <td><a href="mailto:h.badve@mbandasso.com">h.badve@mbandasso.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>Ms. Swati khule</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166004">+91 8237166004</a></td>
                                            <td><a href="mailto:student@puneicai.org"> student@puneicai.org</a></td>
                                        </tr>
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseSeven">
                                Committee for Members in Industry
                            </a>
                        </div>
                        <div id="collapseSeven" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Moushmi Shaha</td>
                                            <td>Chairman</td>
                                            <td class="text-center"><a href="tel:+919822818188">+91 9822818188</a></td>
                                            <td><a href="mailto:moushmimehata@gmail.com">moushmimehata@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
                                            <td>CA. Pritesh Munot</td>
                                            <td>Vice Chairman</td>
                                            <td class="text-center"><a href="tel:+919860656291">+91 9860656291</a></td>
                                            <td><a href="mailto:pritesh_munot@rediffmail.com">pritesh_munot@rediffmail.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Rajesh Agrawal</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919823975174">+91 9823975174</a></td>
                                            <td><a href="mailto:carragrawal@gmail.com">carragrawal@gmail.com</a></td>
    
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Sachin Miniyar</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919422016303">+91 9422016303</a></td>
                                            <td><a href="mailto:miniyarsachin@gmail.com">miniyarsachin@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>CA. Ambarish Vaidya</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919764002484">+91 9764002484</a></td>
                                            <td><a href="mailto:ambarish.vaidya@outlook.com">ambarish.vaidya@outlook.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">06</th>
                                            <td>CA.Shripad Inamdar</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919623380380">+91 9623380380</a></td>
                                            <td><a href="mailto:inamdar.shripad@gmail.com">inamdar.shripad@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">07</th>
                                            <td>Ms. Shwetali Shelar</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166005">+91 8237166005</a></td>
                                            <td><a href="mailto:ssp@puneicai.org">ssp@puneicai.org</a></td>
                                        </tr>
    
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseEight">
                                Students Co-ordination Committee
                            </a>
                        </div>
                        <div id="collapseEight" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                              
                            <table class="table table-bordered ">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Email Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center">01</th>
                                        <td>CA. Sachin Miniyar</td>
                                        <td>Chairman</td>
                                        <td class="text-center"><a href="tel:+919422016303">+91 9422016303</a></td>
                                        <td><a href="mailto:miniyarsachin@gmail.com">miniyarsachin@gmail.com</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">02</th>
                                        <td>CA. Hrishikesh Badve</td>
                                        <td>Vice Chairman</td>
                                        <td class="text-center"><a href="tel:+918087797657">+91 8087797657</a></td>
                                        <td><a href="mailto:h.badve@mbandasso.com">h.badve@mbandasso.com</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">03</th>
                                        <td>CA. Moushmi Shaha</td>
                                        <td>Member</td>
                                        <td class="text-center"><a href="tel:+919822818188">+91 9822818188</a></td>
                                        <td><a href="mailto:moushmimehata@gmail.com">moushmimehata@gmail.com</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">04</th>
                                        <td>CA. Amruta Kulkarni</td>
                                        <td>Member</td>
                                        <td class="text-center"><a href="tel:+919881434468">+91 9881434468</a></td>
                                        <td><a href="mailto:amrutamkulkarni@gmail.com">amrutamkulkarni@gmail.com</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">05</th>
                                        <td>CA. Vishal Rathi</td>
                                        <td>Co-Opted Member</td>
                                        <td class="text-center"><a href="tel:+918830096462">+91 8830096462</a></td>
                                        <td><a href="mailto:vishalnrathi@gmail.com">vishalnrathi@gmail.com</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">06</th>
                                        <td>CA.Vilesh Dalya</td>
                                        <td>Co-Opted Member</td>
                                        <td class="text-center"><a href="tel:+919970095287">+91 9970095287</a></td>
                                        <td><a href="mailto:vilesh@icai.org">vilesh@icai.org</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-center">07</th>
                                        <td>Ms. Shwetali Shelar</td>
                                        <td>Secretary, (Branch Staff)</td>
                                        <td class="text-center"><a href="tel:+918237166005">+91 8237166005</a></td>
                                        <td><a href="mailto:wicasa@puneicai.org">wicasa@puneicai.org</a></td>
                                    </tr>


                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-heading">
                            <a data-toggle="collapse" data-target="#collapseNine">
                                Purchase/Finance Committee
                            </a>
                        </div>
                        <div id="collapseNine" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Contact No.</th>
                                            <th scope="col">Email Id</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">01</th>
                                            <td>CA. Amruta Kulkarni</td>
                                            <td>Chairperson</td>
                                            <td class="text-center"><a href="tel:+919881434468">+91 9881434468</a></td>
                                            <td><a href="mailto:amrutamkulkarni@gmail.com">amrutamkulkarni@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">02</th>
    
                                            <td>CA. Kashinath Pathare</td>
                                            <td>Vice Chairman</td>
                                            <td class="text-center"><a href="tel:+919890625758">+91 9890625758</a></td>
                                            <td><a href="mailto:kbpathare@gmail.com">kbpathare@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">03</th>
                                            <td>CA. Moushmi Shaha</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919822818188">+91 9822818188</a></td>
                                            <td><a href="mailto:moushmimehata@gmail.com">moushmimehata@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">04</th>
                                            <td>CA. Pranav Apte</td>
                                            <td>Member</td>
                                            <td class="text-center"><a href="tel:+919881132594">+91 9881132594</a></td>
                                            <td><a href="mailto:capranav85@gmail.com">capranav85@gmail.com</a></td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">05</th>
                                            <td>CA. Aditya Kulkarni</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919881046481">+91 9881046481</a></td>
                                            <td><a href="mailto:"></a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">06</th>
                                            <td>CA.Dhiraj Dandagaval</td>
                                            <td>Co-Opted Member</td>
                                            <td class="text-center"><a href="tel:+919881818106">+91 9881818106</a></td>
                                            <td><a href="mailto:dhiraj.dandgaval@outlook.com">dhiraj.dandgaval@outlook.com</a>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <th scope="row" class="text-center">07</th>
                                            <td>Ms. Suvarna Marne</td>
                                            <td>Secretary, (Branch Staff)</td>
                                            <td class="text-center"><a href="tel:+918237166113">+91 8237166113</a></td>
                                            <td><a href="mailto:accounts@puneicai.org">accounts@puneicai.org</a></td>
                                        </tr>
    
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ======================================================================================= --}}

























          
        </div>
    </section>
@endsection

@extends('frontend.layouts.main')
@section('main-container')
    <section class="">
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-option set-bg" data-setbg="{{ url('frontend/img/breadcrumb/breadcrumb-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Tenders</h2>
                            <div class="breadcrumb__links">
                                <a href="#">Home</a>
                                <span>Tenders</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->
        <div class="container py-5">
            <div class="row">





                <div class="col-lg-12 col-12">
                    <div class="">
                        <h4 class="mb-3">Tenders:</h4>
                        {{-- @if (isset($studentNoticeBoard) && count($studentNoticeBoard) > 0)
                            <ul class="text-left  px-lg-5 px-4 fa-list-notice">
                                @foreach ($studentNoticeBoard as $studentNotice)
                                    <li>
                                        <a href={{ $studentNotice['notice_board_pdf'] }}>
                                            {{ $studentNotice['title'] }}</a>

                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h1>No Tenders available.</h1>
                        @endif --}}

                        <ul class="fa-list-tender">
                            <li><a href="/images/pdf/RFP-Study-Tour-2023.pdf" target="_blank" rel="noopener noreferrer">ICAI, Pune Branch-Request for Proposal (RFP)- Terms &amp; Condition for 8th International Study Tour-2023.</a></li>
                            <li><a href="/images/pdf/Opening-Proposal-EOI-10072023-3.00pm.pdf" target="_blank" rel="noopener noreferrer">Opening of Proposal-EOI, 10th July,2023 at 3.00 pm</a></li>
                            <li><a href="/images/pdf/Pre-Bid-Response.pdf" target="_blank" rel="noopener noreferrer">Pre-bid meeting clarifications held on Saturday, 17th June, 2023 at 3 pm in virtual mode</a></li>
                            <li><a href="/images/pdf/Pre-bid-meeting-17062023-3pm.pdf" target="_blank" rel="noopener noreferrer">Virtual Link for Pre-bid meeting scheduled on Saturday, 17th June,2023 at 3 pm</a></li>
                            <li><a href="/images/pdf/Advertisement for building,premises, land for Pune Branch of WIRC of ICAI-28th May,2023.pdf" target="_blank" rel="noopener noreferrer">Advertisement for building,premises, land for Pune Branch of WIRC of ICAI-28th May,2023</a></li>
                            <li><a href="/images/pdf/Advertisement-building,premises-land-Pune-Branch-WIRC--27th-May-2023.pdf" target="_blank" rel="noopener noreferrer">Advertisement for building,premises, land for Pune Branch of WIRC of ICAI-27th May,2023</a></li>
                            <li><a href="/images/pdf/EOI-Purchase-Building-Premises-Land-Pune-Branch-27th-May-2023.pdf" target="_blank" rel="noopener noreferrer">EOI for Purchase of Building or Premises or Land-Pune Branch-27th May,2023</a></li>
                            <li><a href="/images/pdf/Advertisement-Rent-Premise-Pune-Branch-WIRC-ICAI.pdf" target="_blank" rel="noopener noreferrer">Advertisement Rent Premise-Pune Branch of WIRC of ICAI</a></li>
                            <li><a href="/images/pdf/EOI for Premise on Rent with Offer Document I and II.pdf" target="_blank" rel="noopener noreferrer">EOI for Premise on Rent with Offer Document I and II </a></li>
                            <li>For Empanelment of Printers for Printing, Storing and Distribution of Study Material and Member Publications (Priced Publications) of ICAI, Tender No. - PP/22-23/002. Link - <a href="https://www.icai.org/post/publication-tender-ppsd-nov2022" target="_blank" rel="noopener noreferrer">https://www.icai.org/post/publication-tender-ppsd-nov2022</a></li>
                            <li>Outsourcing Centralised Distribution Services to Dispatch/ Distribute ICAI Study Materials/ Publications to its Students, Members and Other Stakeholders Including Online Sales Thereof in Zone 3 &amp; 7 – CDS/22-23/001. Link - <a href="https://www.icai.org/post/publication-tender-ocds-nov2022" target="_blank" rel="noopener noreferrer">https://www.icai.org/post/publication-tender-ocds-nov2022</a></li>
                            <li><a href="/images/pdf/RFP-Terms-Conditions-International-RRC-2022-Standard-Format-International-RRC-2022.pdf">ICAI, Pune Branch-Request for Proposal (RFP)- Terms &amp; Condition for 7th International Study Tour-2022.</a></li>
                            <li><a href="/images/pdf/Notice-ITT-Labs-Old-Chairs-Sale-Proposals-ICAI-Bhawan-11th-Jan-2022.pdf">Notice for ITT Labs Old Chairs Sale Proposals at ICAI Bhawan-11th Jan,2022</a></li>
                            <li><a href="/images/pdf/Notice-ITT-Labs-New-Chairs-Buyback-Proposals-ICAI-Bhawan-3rd-Dec-2021.pdf">Notice- ITT Labs New Chairs &amp; Buyback Proposals at ICAI Bhawan-3rd Dec,2021</a></li>
                            <li><a href="/images/pdf/Notice-Proposals-Rented-Premises-Coaching-Clsaees-OP-GMCS-Courses-Pune-1-12-2021.pdf">Notice Proposals Rented Premises at Pune for Coaching Classes, OP GMCS Courses Pune-1-12-2021</a></li>
                            <li><a href="/images/pdf/Opening-Proposal-EOI-10th-July-2021-9.30-am.pdf">Opening of Proposal-EOI, 10th July,2021 at 9.30 am</a></li>
                            <li><a href="/images/pdf/Pre-bid-meeting-clarifications-Pune.pdf">Pre-bid meeting clarifications-Pune held on Friday, 25th June,2021 at 3 pm in virtual mode</a></li>
                            <li><a href="/images/pdf/Pre-bid-meeting-25th-June-2021-3-pm.pdf">Virtual Link for Pre-bid meeting scheduled on Friday, 25th June,2021 at 3 pm</a></li>
                            <li><a href="/images/pdf/Advertisement-land-building-premises-Pune-Branch-WIRC-ICAI.pdf">Advertisement for Land, Building, Premises for Pune Branch of WIRC of ICAI</a></li>
                            <li><a href="/images/pdf/Annexure-21-EOI-Purchase-Land-Building-6th-June-2021.pdf">Annexure -21 EOI for Purchase of Land or Building[10617]-6th June,2021</a></li>
                            <li><a href="/images/pdf/Tender-Notice-for-Internal-Painting-15052021.pdf">Tender Notice for Internal Painting 15.05.2021</a></li>
                            <li><a href="/images/pdf/Notice-for-Quotation-of-Fixed-Assets-Scrap-Stock-13052021.pdf">Notice for Quotation of Fixed Assets Scrap Stock 13.05.2021</a></li>
                            <li><a href="/images/pdf/Tender-Notice-External-Painting-30032021.pdf">Tender Notice for External Painting 30.03.2021</a></li>
                            <li><a href="/images/Inviting-Quotations-Security-Services-Pune-20032021.pdf">Inviting Quotations for “Security Services” at ICAI Bhawan, Bibwewadi, Pune 20.03.2021</a></li>
                            <li><a href="/images/Notice for Quotation of Pulping of ICAI-Obsolete Publication Stock-18.03.2021.pdf">Inviting Quotations for Pulping of ICAI-Obsolete Publication Stock</a></li>
                            <li><a href="/images/pdf/Inviting-Quotations-Display-Kiosk-Camera-Steaming-Solutions-Pune-Branch-WIRC.pdf">Inviting Quotations for Display Kiosk &amp; Camera-Steaming Solutions at Pune Branch of WIRC of ICAI, Bibwewadi, Pune</a></li>
                            <li><a href="/images/pdf/Inviting-Quotations-Painting-Work-Pune-Branch.pdf">Inviting Quotations for Painting Work at Pune Branch of WIRC of ICAI, Bibwewadi, Pune</a></li>
                            <li><a href="/images/pdf/Invite-Quotations-Solar-Rooftop-Systems-Pune-Branch.pdf">Invite Quotations for Solar Rooftop Systems at Pune Branch of WIRC of ICAI, Bibwewadi, Pune</a></li>
                            <li><a href="http://www.puneicai.org/wp-content/uploads/Revised-Final-Catering-Menu-14th-15th-Dec2019.xlsx">Revised Catering Menu 14th &amp; 15th Dec, 2019</a></li>
                            <li><a href="/images/pdf/Catering-Menu-14th-15th-Dec2019.pdf">Catering Menu 14th &amp; 15th Dec, 2019</a></li>
                            <li><a href="/images/pdf/Revised-Notice-for-Catering-Quotation-for-International-Conference-of-CA-Students-at-Pune.pdf">Revised Notice for Catering Quotation for International Conference of CA Students at Pune</a></li>
                            <li><a href="/images/pdf/Notice-for-Bags-Quotation-for-International-Conference-of-CA-Students-at-Pune.pdf">Notice for Catering Quotation for International Conference of CA Students at Pune</a></li>
                            <li><a href="/images/pdf/Notice-for-Catering-Quotation-for-International-Conference-of-CA-Students-at-Pune.pdf">Notice for Bags Quotation for International Conference of CA Students at Pune</a></li>
                            </ul>

                    </div>
                </div>

            </div>
        </div>
        <section>
        @endsection



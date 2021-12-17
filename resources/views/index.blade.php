@extends('layouts.default')
@section('content')

    <div class="hero-wrap js-fullheight" style="background-image: url('vendor/technext/vacation-rental/images/bg_1.svg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        {{-- <div class="container">
           <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
             <div class="col-md-7 ftco-animate">
                 <h2 class="subheading">Selamat datang di Pinjam Ruang</h2>
                 <h1 class="mb-4">Pinjam ruangan mudah dan cepat</h1>
               <p><a href="#" class="btn btn-primary">Pelajari lebih lanjut</a> <a href="#" class="btn btn-white">Hubungi kami</a></p>
             </div>
           </div>
         </div>--}}
    </div>

    <section id="form-pinjam-ruang" class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <form method="POST" action="{{ route('api.v1.borrow-room-with-college-student', []) }}" class="appointment-form">
                        @csrf
                        <h4 class="mb-3">Technician Schedule Request</h4>
                        {{-- Show any errors --}}
                        @if ($errors->isNotEmpty())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $message)
                                    @if ($message == 'login_for_more_info')
                                        <a href="{{ route('admin.login') }}">Masuk</a> untuk meilihat aktivitas peminjaman.
                                    @else
                                        {{ $message }}<br>
                                    @endif
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Pinjam ruang berhasil, silahkan cek status peminjaman <a href="{{ route('admin.login') }}">disini</a>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="full_name" value="{{ old('full_name') }}" type="text" class="form-control" placeholder="User ID">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input name="borrow_at" value="{{ old('borrow_at') }}" type="text" class="form-control appointment_date-check-in" placeholder="Tanggal  Kunjungan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{--			    					    <div class="input-wrap">--}}
                                    {{--			            		            <div class="icon"><span class="ion-md-clock"></span></div>--}}
                                    {{--			            		                <input name="until_at" value="{{ old('until_at') }}" type="text" class="form-control appointment_date-check-out" placeholder="Tgl Selesai">--}}
                                    {{--		            		            </div>--}}
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-clock"></span></div>
                                        <input name="start_time_at" value="{{ old('start_time_at') }}" type="time" class="form-control" placeholder="Jam Kunjungan" onfocus="(this.type='time')">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                 <div class="form-group">
                                     <div class="input-wrap">
                                         <div class="icon"><span class="ion-md-clock"></span></div>
                                         <input name="start_time_at" value="{{ old('start_time_at') }}" type="time" class="form-control" placeholder="Jam Kunjungan" onfocus="(this.type='time')">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <div class="input-wrap">
                                         <div class="icon"><span class="ion-md-time"></span></div>
                                         <span>Jam Selesai</span>
                                         <input name="end_time_at" value="{{ old('end_time_at') }}" type="time" class="form-control" placeholder="Jam Selesai">
                                     </div>
                                 </div>
                             </div>--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="room" id="" class="form-control">
                                                <option value="" selected disabled>Permasalahan</option>
                                                @forelse ($data['rooms'] as $room)
                                                    <option value="{{ $room->id }}" @if(old('room') == $room->id) selected @endif>
{{--                                                        {{ $room->room_type->name . ' - ' . $room->name }}--}}
                                                        {{ $room->room_type->name}}
                                                    </option>
                                                @empty
                                                    <option value="" disabled>Belum ada ruangan yang tersedia</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="lecturer" id="" class="form-control">
                                                <option value="" selected disabled>Pilih dosen</option>
                                                @forelse ($data['lecturers'] as $lecturer)
                                                    <option value="{{ $lecturer->id }}" @if(old('lecturer') == $lecturer->id) selected @endif>
                                                        {{ $lecturer->name }}
                                                    </option>
                                                @empty
                                                    <option value="" disabled>Belum ada dosen yang terdaftar</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="study_program" id="" class="form-control">
                                                <option value="" selected disabled>Customer Type</option>
                                                <option value="teknik-informatika" @if(old('study_program') == 'teknik-informatika') selected @endif>VVIP</option>
                                                <option value="teknik-multimedia-dan-jaringan" @if(old('study_program') == 'teknik-multimedia-dan-jaringan') selected @endif>Highest Priority</option>
                                                <option value="teknik-geomatika" @if(old('study_program') == 'teknik-geomatika') selected @endif>High</option>
                                                <option value="animasi" @if(old('study_program') == 'animasi') selected @endif>Normal</option>
                                                <option value="rekayasa-keamanan-siber" @if(old('study_program') == 'rekayasa-keamanan-siber') selected @endif>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-md-6">
                                <div class="form-group">
                                    <input name="nim" value="{{ old('nim') }}" type="text" class="form-control" placeholder="NIM">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="study_program" id="" class="form-control">
                                                <option value="" selected disabled>Customer Type</option>
                                                <option value="teknik-informatika" @if(old('study_program') == 'teknik-informatika') selected @endif>VVIP</option>
                                                <option value="teknik-multimedia-dan-jaringan" @if(old('study_program') == 'teknik-multimedia-dan-jaringan') selected @endif>Highest Priority</option>
                                                <option value="teknik-geomatika" @if(old('study_program') == 'teknik-geomatika') selected @endif>High</option>
                                                <option value="animasi" @if(old('study_program') == 'animasi') selected @endif>Normal</option>
                                                <option value="rekayasa-keamanan-siber" @if(old('study_program') == 'rekayasa-keamanan-siber') selected @endif>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary mt-4 py-3 px-4" style="background-color: #deb512; border-color: #deb512">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--    <section class="ftco-section testimony-section bg-light">--}}
    {{--        <div class="container">--}}
    {{--          <div class="row justify-content-center pb-5 mb-3">--}}
    {{--            <div class="col-md-7 heading-section text-center ftco-animate">--}}
    {{--              <h2>Tata Cara Peminjaman</h2>--}}
    {{--            </div>--}}
    {{--          </div>--}}
    {{--          <div class="row ftco-animate">--}}
    {{--            <div class="col-md-12 wrap-about">--}}
    {{--                <div class="text-center">--}}
    {{--                    <img src="{{ asset('vendor/vonso/FlowchartV1.jpg') }}" class="img-fluid" alt="...">--}}
    {{--                  </div>--}}
    {{--               </div>--}}
    {{--          </div>--}}
    {{--        </div>--}}
    {{--      </section>--}}

    {{-- <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(vendor/technext/vacation-rental/images/services-1.jpg);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading">Map Direction</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                <p><a href="#" class="btn btn-primary">Baca selengkapnya</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(vendor/technext/vacation-rental/images/services-2.jpg);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading">Accomodation Services</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                <p><a href="#" class="btn btn-primary">Baca selengkapnya</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
            <div class="d-block services-wrap text-center">
              <div class="img" style="background-image: url(vendor/technext/vacation-rental/images/services-3.jpg);"></div>
              <div class="media-body py-4 px-3">
                <h3 class="heading">Great Experience</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                <p><a href="#" class="btn btn-primary">Baca selengkapnya</a></p>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section> --}}

    {{--<section class="ftco-section bg-light">
			<div class="container-fluid px-md-0">
				<div class="row no-gutters justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Ruangan</h2>
            <p class="justify-content-center"><a href="{{ route('rooms') }}">Lihat lebih banyak ruangan disini.</a></p>
          </div>
        </div>
				<div class="row no-gutters">
                @for ($i = 0; $i < 4; $i++)
                @php
                    // Get Random rooms
                    $room = $data['rooms'][rand(0, $data['rooms']->count() -1)];

                    $room_status = $room->status;
                    $borrower_status = [];

                    // Check if any borrow rooms
                    if ($room->borrow_rooms->isNotEmpty()) {
                        // Check each borrow_rooms
                        foreach ($room->borrow_rooms as $key => $borrow_room) {
                            // Show details if not finished yet by checking status first
                            if (
                                $borrow_room->returned_at == null
                                && $borrow_room->admin_approval_status == App\Enums\ApprovalStatus::Disetujui
                            ) {
                                $room_status = 1; // Set status room to Booked
                                $borrower_first_name = ucfirst(strtolower(explode(' ', Encore\Admin\Auth\Database\Administrator::find($borrow_room->borrower_id)->name)[0]));

                                $borrow_at = Carbon\Carbon::parse($borrow_room->borrow_at);
                                $until_at = Carbon\Carbon::parse($borrow_room->until_at);
                                $count_days = $borrow_at->diffInDays($until_at) + 1;

                                if ($count_days == 1)
                                    $borrower_status[] = $borrower_first_name . ' - ' . $borrow_at->format('d M Y\TH:i');
                                else
                                    $borrower_status[] = $borrower_first_name . ' - ' . $borrow_at->format('d M Y\TH:i') . ' s.d ' . $until_at->format('d M Y\TH:i');
                            }
                        }
                    }
                @endphp
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img" style="background-image: url({{ asset('vendor/technext/vacation-rental/images/room-'. rand(1, 6) . '.jpg') }});"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0">{{ $room->room_type->name }}</p>
                                <h3 class="mb-3"><a href="javascript:void(0)">{{ $room->name }}</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Maks:</span> {{ $room->max_people }} Orang</li>
                                    <li><span>Status:</span> {{ App\Enums\RoomStatus::getDescription($room->status) }}</li>
                                    <li>{!! implode('<br>', $borrower_status) !!}</li>
                                </ul>
                                <!-- Button trigger modal -->
                                <p class="pt-1"><a href="javascript:void(0)" id="buttonBorrowRoomModal" class="btn-custom px-3 py-2" data-toggle="modal" data-target="#borrowRoomModal" data-room-id="{{ $room->id }}" data-room-name="{{ $room->name }}">Pinjam Ruang Ini <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
    		</div>
			</div>
		</section>--}}


    {{--<section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Penilaian &amp; Umpan Balik</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
							<div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(vendor/technext/vacation-rental/images/person_1.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(vendor/technext/vacation-rental/images/person_2.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(vendor/technext/vacation-rental/images/person_3.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(vendor/technext/vacation-rental/images/person_4.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img" style="background-image: url(vendor/technext/vacation-rental/images/person_1.jpg)">
                  </div>
                  <div class="text pl-4">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="fa fa-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Businesswoman</span>
                  </div>
                </div>
              </div>
						</div>
          </div>
        </div>
      </div>
    </section>--}}

    {{-- <section class="ftco-section bg-light">
             <div class="container">
                 <div class="row no-gutters">
                     <div class="col-md-6 wrap-about">
                         <div class="img img-2 mb-4" style="background-image: url(vendor/technext/vacation-rental/images/about.jpg);">
                         </div>
                         <h2>The most recommended vacation rental</h2>
                         <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                     </div>
                     <div class="col-md-6 wrap-about ftco-animate">
               <div class="heading-section">
                   <div class="pl-md-5">
                     <h2 class="mb-2">Apa yang kami tawarkan</h2>
                 </div>
               </div>
               <div class="pl-md-5">
                             <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                             <div class="row">
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-diet"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Tea Coffee</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-workout"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Hot Showers</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-diet-1"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Laundry</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-first"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Air Conditioning</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-first"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Free Wifi</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-first"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Kitchen</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-first"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Ironing</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                     <div class="services-2 col-lg-6 d-flex w-100">
                       <div class="icon d-flex justify-content-center align-items-center">
                             <span class="flaticon-first"></span>
                       </div>
                       <div class="media-body pl-3">
                         <h3 class="heading">Lovkers</h3>
                         <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                       </div>
                     </div>
                   </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <section class="ftco-intro" style="background-image: url(vendor/technext/vacation-rental/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
             <div class="overlay"></div>
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-md-9 text-center">
                         <h2>Siap untuk memulai</h2>
                         <p class="mb-4">Mudah dan cepat pinjam ruangan secara online! Pinjam ruangan dalam satu klik atau kirim pertanyaan anda kepada kami.</p>
                         <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Pinjam sekarang</a> <a href="#" class="btn btn-white px-4 py-3">Kontak kami</a></p>
                     </div>
                 </div>
             </div>
         </section>--}}

    {{-- <section class="ftco-section bg-light">
       <div class="container">
         <div class="row justify-content-center pb-5 mb-3">
           <div class="col-md-7 heading-section text-center ftco-animate">
             <h2>Berita terbaru dari blog kami</h2>
             <span class="subheading">Berita &amp; Blog</span>
           </div>
         </div>
         <div class="row d-flex">
           <div class="col-md-4 d-flex ftco-animate">
             <div class="blog-entry align-self-stretch">
               <a href="blog-single.html" class="block-20 rounded" style="background-image: url('vendor/technext/vacation-rental/images/image_1.jpg');">
               </a>
               <div class="text p-4 text-center">
                 <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a></h3>
                 <div class="meta mb-2">
                   <div><a href="#">January 30, 2020</a></div>
                   <div><a href="#">Admin</a></div>
                   <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                 </div>
                 <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
               </div>
             </div>
           </div>
           <div class="col-md-4 d-flex ftco-animate">
             <div class="blog-entry align-self-stretch">
               <a href="blog-single.html" class="block-20 rounded" style="background-image: url('vendor/technext/vacation-rental/images/image_2.jpg');">
               </a>
               <div class="text p-4 text-center">
                 <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a></h3>
                 <div class="meta mb-2">
                   <div><a href="#">January 30, 2020</a></div>
                   <div><a href="#">Admin</a></div>
                   <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                 </div>
                 <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
               </div>
             </div>
           </div>
           <div class="col-md-4 d-flex ftco-animate">
             <div class="blog-entry align-self-stretch">
               <a href="blog-single.html" class="block-20 rounded" style="background-image: url('vendor/technext/vacation-rental/images/image_3.jpg');">
               </a>
               <div class="text p-4 text-center">
                 <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a></h3>
                 <div class="meta mb-2">
                   <div><a href="#">January 30, 2020</a></div>
                   <div><a href="#">Admin</a></div>
                   <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                 </div>
                 <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>--}}

    <!-- Modal -->
    <div class="modal fade" id="borrowRoomModal" tabindex="-1" role="dialog" aria-labelledby="borrowRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrowRoomModalLabel">Pinjam Ruang - Nama Ruang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('api.v1.borrow-room-with-college-student', []) }}" class="appointment-form">
                        @csrf
                        <div class="row">
                            {{-- Hidden input for room_id --}}
                            <input id="room" name="room" type="hidden" value="{{ old('room') }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="full_name" type="text" class="form-control" placeholder="User ID">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input name="borrow_at" type="text" class="form-control appointment_date-check-in" placeholder="Tanggal  Kunjungan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input name="until_at" type="text" class="form-control appointment_date-check-out" placeholder="Tgl Selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <select name="lecturer" id="" class="form-control">
                                                <option value="" selected disabled>Pilih dosen</option>
                                                @forelse ($data['lecturers'] as $lecturer)
                                                    <option value="{{ $lecturer->id }}">
                                                        {{ $lecturer->name }}
                                                    </option>
                                                @empty
                                                    <option value="" disabled>Belum ada dosen yang terdaftar</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="nim" type="text" class="form-control" placeholder="NIM">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <select name="study_program" id="" class="form-control">
                                                <option value="" selected disabled>Customer Type</option>
                                                <option value="teknik-informatika">Teknik Informatika (D3)</option>
                                                <option value="teknik-multimedia-dan-jaringan">Teknik Multimedia & Jaringan (D4)</option>
                                                <option value="teknik-geomatika">Teknik Geomatika (D3)</option>
                                                <option value="animasi">Animasi (D4)</option>
                                                <option value="rekayasa-keamanan-siber">Rekayasa Keamanan Siber (D4)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Pinjam Ruang Sekarang" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        //triggered when modal is about to be shown
        $(document).on('click', '#buttonBorrowRoomModal', function() {

            var roomName = $(this).data('room-name');
            var roomId = $(this).data('room-id');

            // Change value room
            $('input[name="room"]').val(roomId);

            // change title modal
            $('#borrowRoomModalLabel').text('Pinjam Ruang - ' + roomName);

            // Rest form modal
            resetBorrowRoomModalForm()
        });

        function resetBorrowRoomModalForm(){
            $('#borrowRoomModal').find('input[name="full_name"]').val('');
            $('#borrowRoomModal').find('input[name="borrow_at"]').val('');
            $('#borrowRoomModal').find('input[name="until_at"]').val('');
            $('#borrowRoomModal').find('select[name="lecturer"]').val($('select[name="lecturer"] option:first').val());
            $('#borrowRoomModal').find('input[name="nim"]').val('');
            $('#borrowRoomModal').find('select[name="study_program"]').val($('select[name="study_program"] option:first').val());
        }
    </script>

    {{-- If any error scroll to form --}}
    @if ($errors->isNotEmpty())
        <script>
            $(document).ready(function(){
                // Scroll only in mobile device
                if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                    document.getElementById("form-pinjam-ruang").scrollIntoView();
                }
            });
        </script>
    @endif
@endsection
@endsection

<div class="container-fluid px-1 py-5 mx-auto">
<div class="row d-flex justify-content-center">
<div class="col-xl-6 col-lg-6 col-md-7">
<div class="card b-0 " style="border-radius: 20px">
<h3 class="heading mx-auto p-2 text-center" style="background-color: darkgreen;border-radius: 15px;color:white; width:200px">طلب خدمة</h3>
<p class="desc mx-auto" style="color:red">* الرجاء ادخال التفاصيل بشكل دقيق تجنب لحدوث اي مشكلة </p>


    <div class="progress-container mx-auto " style="color:blue">
        <div class="progress" id="progress" style="width:{{$barLength}}%; height: 5px; background-color:green;"></div>
        <div class="circle {{ $Steps >= 4 ? 'active' : '' }} " style="border-color:green;color:green"><i class="fa-solid fa-4"></i></div>
        <div class="circle {{ $Steps >= 3 ? 'active' : '' }} " style="border-color:green;color:green"><i class="fa-solid fa-3"></i></div>
        <div class="circle {{ $Steps >= 2 ? 'active' : '' }} " style="border-color:green;color:green"><i class="fa-solid fa-2"></i></div>
        <div class="circle {{ $Steps >= 1 ? 'active' : '' }} " style="border-color:green;color:green"><i class="fa-solid fa-1"></i></div>
    </div>          



   
<div class="show" style="{{ $Steps != 1 ? 'display:none' : '' }}">
<h5 class="sub-heading"><i class="fa-solid fa-list " style="color:darkgreen"></i> قم بتحديد الخدمات المطلوبة </h5>

{{-- step 1 --}}
<div class="row ">
<div class="service-1 pt-2 container  text-black form-card">
<div class="col-row   ">   

@forelse ($services as $service)


<div class="row row1 text-center pb-1 text-black  ">


    <div class="col-2 p-0">
        <img class="serv-img" src="{{ asset('storage/' . $service->image) }}">
    </div>
   
  

    <div class="col-2  p-0 text-center">
        @if ($cart->where('id', $service->id)->count())
        <button type="button" class="btn serv-btn btn-delete " wire:click="removeFromCart({{ $service->id }})">ازالـة</button>
        @else
        <button type="button" class="btn serv-btn btn-warning  " wire:click="addToCart({{ $service }})"> <span>
                اضافه
            </span> </button>
        @endif
    </div>
    
    <div class="col-2  p-0">
        <h5>
            {{$service->price * $quantity[$service->id]}}
            <span style="color:black">﷼</span>
        </h5>
    </div>
    <div class="col-3  p-0">
            <a  wire:click="increment({{ $service->id }})"><i class="fa-solid fa-circle-plus" style="width:20px;height: 20px;"></i></a>
            <input type="text" wire:model="quantity.{{ $service->id }}" class="  serv-input  px-2   py-0 " style="" readonly/>
            <a class="button-plus    " wire:click="decrease({{ $service->id }})"><i class="fa-solid fa-circle-minus" style="width:20px;height: 20px;"></i></a>
    </div>
    <div class="col-3  p-0 text-center ">
        <div>
            <h5 class="sub-heading text-start"><i class="fa-sharp fa-solid fa-circle-small"></i> {{ $service->name }} </h5>
        </div>
    </div>

</div>
<hr class=" serv-hr  text-black">
@empty
@endforelse
</div>
</div>

</div>
    <button class="btn btn-primary form-control col-5" id="next"  wire:click="Next">التالي</button>
</div>
{{-- end steps 1 --}}



{{-- steps 2 --}}
<div class="show" style="{{ $Steps != 2 ? 'display:none' : '' }}" >
      <div class="row" >
         <div class="service-1  form-card">
            <div class="col-row"> 
            
              
                    <div class="row col-12 text-black  p-4">
                        <div class="col-2" style="color: black;">
                            <h5>التاريخ</h5>
                        </div>
                        <div class="col-4">
                            <input class=" input-group date form-control" type="date" name="date" wire:model="date" value="dd/mm/yy">
                        </div>

                        <div class="col-2  " style="color: black;" id='datetimepicker3'>
                            <h5>الوقت</h5>
                        </div>
                        <div class="col-4 ">
                            <select class="form-select" aria-label="Default select example">
                                <option selected> الاوقات المتاحة </option>
                                <option value="10:30 صباحاً">10:30 صباحاً</option>
                                <option value="11:30 صباحاً">11:30 صباحاً</option>
                                <option value="12:30 مساءً">12:30 مساءً</option>
                              </select>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker3').datetimepicker({
                                    format: 'LT'
                                });
                            });
                         </script>
                    </div>

                    <!--
                    <div class="col-5 position-relative ms-auto me-4 mt-3  text-end  " style="color:  black;">
                        <h5> حدد الفترة الزمنيه </h5>
                    </div>

                    <div class="col-11  ms-auto me-4 text-end text-black " style=" height: 0.6px; top: -7px; position: relative;">
                        <hr class="  text-black">
                    </div>

                    <div class="position-relative ms-auto me-4 mb-2  pb-3 text-end  ">


                        <div class="row-date row text-center mx-2 me-0">

                            <div class="col-4 col-md-3 my-1 px-2"  >
                            
                                <div type="button" class="button cell py-1 " style="{{ $time != '9:50' ? '' :  'background-color:#2215da'}}" wire:click="$set('time','9:50')">
                                     9:50AM
                                </div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" style="{{ $time != '10:00' ? '' :  'background-color:#2215da'}}" wire:click="$set('time','10:00')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2 ">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>


                            <div class="col-4 col-md-3 my-1 px-2 d   ">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>


                            <div class="col-4 col-md-3 my-1 px-2 ">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>


                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>

                            <div class="col-4 col-md-3 my-1 px-2">
                                <div type="button" class="button cell py-1" wire:click="$set('time','10:00AM')">
                                    10:00AM</div>
                            </div>


                        </div>
                    </div>-->
                </div>
              </div>
           </div>
           <hr style="margin-bottom: 1px;">

         <button class="btn btn-primary form-control col-5 " id="next"  wire:click="Next">التالي</button>
         <button class="btn btn-primary form-control col-5 " id="prev"  wire:click="Previous">الخلف</button>

   </div>
  {{-- end steps 2 --}}



  {{-- steps 3 --}}
  <div class="show" style="{{ $Steps != 3 ? 'display:none' : '' }}">
    <div class="dital row " >
        <div class="row " style=" flex-direction: row-reverse">
            <div class="col-12  text-center   " style="    color: rgb(70 70 70);">
                <h5> تفاصيل الطلب</h5>
            </div>
        </div>
                <div class="row dital row" style="background-color: rgba(73, 161, 30, 0.315);">
                    <div class="col-6   text-end  " style="    ">
                        <h6 class="" style="color:black;padding-top:5px"> الطلب : </h6>
                    </div>
                    <div class="col-6   text-end  " style="">
                        @foreach ($cart as $item)
                        <div class="col  salla-item  ">
                            <h6 class="" style="color:wblackhite;padding-top:5px">{{ $item->name }}</h6>
                        </div>

                        @endforeach

                    </div>
                </div>
               

         
                <div class=" row text-black text-center mt-2 p-2" style="">
                    <div class="col-4  text-end" style="color: rgb(70 70 70);">
                        <h6> التاريخ</h6>
                    </div>
                    <div class="col-4 m-0 ps-1" style=" background-color: #ffffff;">
                        <h6 style="  border-bottom: 1px solid rgba(84, 184, 84, 0.429);">{{ $date ?? 'لم يتمم التحديد'}} </h6>
                    </div>
                    <div class="col-4 m-0 pe-1  " style="background-color: #ffffff;">
                        <h6 style=" border-bottom: 1px solid rgba(84, 184, 84, 0.429);"> {{ $time ?? 'لم يتم التحديد'}} </h6>
                    </div>
                    
                </div>
                <div class="row col-12 text-black  text-black text-center mt-2 p-2">
                    <div class="col-4  text-end" style="color: rgb(70 70 70);">
                        <h6> الموقع</h6>
                    </div>
                    
                    <div class="col-4 m-0 pe-1 text-black ">
                        <select class="form-select" aria-label="Default select example" wire:model="state" style="width:100% ; background-color: #f9f9f9;border-radius:3px;">
                            <option value="السنينة">السنينة</option>
                            <option value="حدة">حدة</option>
                            <option value="مذبح">مذبح</option>
                            <option value="شميلة">شميلة</option>
                            <option value="الحصبة">الحصبة</option>
                        </select>
                    </div>
                    <div class=" col-4  m-0 ps-1 text-black">
                        <select class="form-select" aria-label="Default select example" wire:model="city" style="width:100% ; background-color: #f9f9f9;   border-radius: 3px;">
                            <option value="صنعاء" ><h5>صنعاء </h5></option>
                        </select>
                    </div>
                </div>
                <div class="row  mt-3 mb-2 " style="">
                
                    <div class="col-4   text-end  " style="color: rgb(70 70 70);">
                        <h6>اضافه صوره </h6>
                    </div>
                        
                    <div class=" col-8   text-end  text-black " style="color: rgba(84, 184, 84, 0.429);">
                        <div class="dropzone" style="border:solid 1px rgba(0, 128, 0, 0.612)"> 
                        <input type="file" wire:model="photo" class="form-control " style="border:none" >
                        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-4   text-end  " style="    color: rgb(70 70 70);">
                        <h6> ملاحظه للفني </h6>
                    </div>
                    <div class="col-8   text-end  text-black p-4" style="color: rgba(84, 184, 84, 0.429);">
                        <textarea name="notes" wire:model="note" placeholder="ملاحظات..." style=" overflow-wrap: break-word; resize: horizontal; width:100%; background-color: #f9f9f9; border-radius: 5px;"></textarea>
                    </div>
                   
                    

                </div>

                <hr style="margin-bottom: 1px;">
                <div class="row col-12 text-black  text-black text-center p-4">

                    <div class="col-4  ms-auto me-1 mt-2 text-end  " style="color: rgb(70 70 70);">
                        <h5>طريقة الدفع </h5>
                    </div>
                        <div class="col-4 "class="form-select">
                                <select style="width:100% ; background-color: #f9f9f9;    border-radius: 3px;">
                                    <option> كاش </option>
                                    <option>الكريمي </option>
                                </select>
                        </div>
                </div>
            </div>
            <hr style="margin-bottom: 1px;">

            <button class="btn btn-primary form-control col-5" id="next"  wire:click="Next">التالي</button>
            <button class="btn btn-primary form-control col-5" id="prev"  wire:click="Previous">الخلف</button>

     </div>      
    {{-- end steps 3 --}}

     <div class="show" style="{{$Steps != 4 ? 'display:none' : ''}}">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <div class="container profile-page">
        <div class="row">
            @foreach ($providers as $provider)
                <div class="col-xl-6 col-lg-7 col-md-12 " >
                    <div class="card1 profile-header ">
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="profile-image"> <img src="{{asset('storage/'.$provider->user->image)}}" alt=""> </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <h6 class="m-t-0 m-b-0"><strong>{{$provider->user->name}}</strong></h6>
                                    <span class="job_post"><strong>{{$provider->phone}}</strong><span>
                                    <p> {{$provider->description}}</p>
                                    <div>
                                        @if($provid != '')
                                            <button class="btn btn-primary text-center" style="width:75px;height:30px ; padding:0%" wire:click="$set('provid',null)">ازالـة</button>
                                        @else
                                        <button class="btn btn-primary text-center" style="width:75px;height:30px ; padding:0%" wire:click="$set('provid',{{$provider->id}})">اختيار</button>
                                        @endif
                                    </div>
                                </div>                
                            </div>
                        </div>                    
                    </div>
                </div>
            @endforeach
        
	    </div>
    </div>
    <button class="btn btn-primary form-control col-5 " id="prev"  wire:click="createOrder">ارسال</button>
    <button class="btn btn-primary form-control col-5" id="prev"  wire:click="Previous">الخلف</button>

     </div>
<!-- <button id="next1" class="btn-block btn-primary mt-3 mb-1 next">NEXT<span class="fa fa-long-arrow-right"></span></button> -->


</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>

<script>
    $(document).ready(function () {
        
    $('.cell').click(function () {
        $('.cell').removeClass('select');
        $(this).addClass('select');
    });
    
    });
    </script>




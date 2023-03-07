<div class="container py-5">
  <div class="row text-center text-white mb-5">
      <div class="col-lg-7 mx-auto">
          <h1 class="display-4">Product List</h1>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-8 mx-auto">
          <!-- List group-->
          <ul class="list-group shadow">
              <!-- list group item -->
              <li class="list-group-item">
                  <!-- Custom content-->
                  <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                      <div class="media-body order-2 order-lg-1">
                        <h5 class="mt-0 font-weight-bold mb-2 text-right"> تفاصيل الطلب</h5>
                        <h6 class="mt-0 font-weight-bold mb-2 text-right"> رقم الطلب</h6>
                        <p class="font-italic text-muted mb-0 small text-left">اسم الفني </p>
                          <div class="d-flex align-items-center justify-content-between mt-1">
                              <h6 class="font-weight-bold my-2">السعر ريال</h6>
                              <ul class="list-inline small">
                                تقييم 
                                  <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                  <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                  <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                  <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                  <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                              </ul>
                          </div>
                      </div><img src="https://i.imgur.com/6IUbEME.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                  </div> <!-- End -->
              </li> <!-- End -->
          </ul> <!-- End -->
      </div>
  </div>
</div>
<div class="service-1">
  <div class="container">
      <div class=" text-center p-4 pb-2">
          <h3>الخدمـــات</h3>
      </div>
      <div class="text-white">
    @foreach ($categories as $category)
        <!--item-->
        <div class="single-service col-3 col-lg-3  text-center "  >
     
          <a href="{{route('select_services',[$category->id])}}" style="text-decoration: none; color:mediumblue" >
              <div class=" text-black-20 ">
                  <img src="{{asset('storage/'.$category->image)}}" style="margin-block: 0px">
                  <h5>{{$category->name}}</h5>
              </div>
          </a>
        </div>
        <!-- End-->
    @endforeach
     </div>
    </div>
  </div>
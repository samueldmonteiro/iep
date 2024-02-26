<div class="col-lg-4 course_box">

                        <a href="{{route('courses.show', ['course'=>$course->slug])}}" class="card">
                            <img class="card-img-top" src="{{Storage::url($course->image)}}"
                                alt="https://unsplash.com/@kellybrito">
                            <div class="card-body text-center">
                                <div class="card-title"><a href="{{route('courses.show', ['course'=>$course->slug])}}">{{$course->title}}</a></div>
                                <div class="card-text">{{$course->mini_description}}.</div>
                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img class="logoiep" src="{{Vite::asset('resources/images/logo2.jpg')}}" alt="https://unsplash.com/@mehdizadeh">
                                </div>
                                <div class="course_author_name">Presencial</div>
                                <div class="course_price d-flex flex-column align-items-center justify-content-center">
                                    <span>IEP</span></div>
                            </div>
                        </a>
                    </div>
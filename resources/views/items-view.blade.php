@extends('master')

@section('body')
<div class="row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-10 my-5">
        <style>
            * {
                box-sizing: border-box
            }

            /* Slideshow container */
            .slideshow-container {
                max-width: 1000px;
                position: relative;
                margin: auto;
            }

            /* Hide the images by default */
            .mySlides {
                display: none;
            }

            /* Next & previous buttons */
            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto;
                margin-top: -22px;
                padding: 16px;
                color: white;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
                right: 0;
                border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover,
            .next:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            /* Caption text */
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }

            /* Fading animation */
            .fade {
                animation-name: fade;
                animation-duration: 0.5s;
            }

            .fade:not(.show) {
                opacity: 1 !important;
            }

            @keyframes fade {
                from {
                    opacity: .4
                }

                to {
                    opacity: 1
                }
            }
        </style>

        <div class="container mt-4">
            <div class="row row-cols-lg-1 row-cols-md-1 row-cols-1">
                <div class="col">
                    <div class="card mb-3 " style="border-radius:10px">
                        <div class="card-header d-flex">
                            <span id="seller" class="h3 card-title justify-content-start">Seller</span>
                            <button class="ms-auto btn">Contacte</button>
                        </div>
                        <div class="d-flex justify-content-center" style="background-color: #1a1a1a;">
                            <!-- <img class="product-img img-fluid" id="product-img" src="https://estaticos-cdn.elperiodico.com/clip/c0f28253-cee9-4301-8e24-5e7032beb153_alta-libre-aspect-ratio_default_0.jpg" class="card-img-top" alt="..."> -->

                            <!-- Slideshow container -->
                            <div class="slideshow-container">

                                <!-- Full-width images with number and caption text -->

                                @foreach ($imatges as $imatge)
                                @if ($imatge->id_item == $items->id)
                                <div class="mySlides fade">
                                    <img src="../../{{$imatge->url}}" style="width:100%; max-height: 366.233px !important;">
                                </div>
                                @endif
                                @endforeach
                                <!-- Next and previous buttons -->
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <br>



                        </div>
                        <div class="card-body">
                            <h5 class="h1 card-title product-title" id="product-price">50€</h5>
                            <h1 class="h2 card-title product-title" id="product-title">Bici</h1>
                            <p class="card-textproduct-description" id="product-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod in a voluptatem ut et maxime assumenda recusandae illo ea, possimus fuga culpa deleniti, sunt aut explicabo dolore, mollitia distinctio eveniet. Totam provident nobis non expedita neque repudiandae nisi inventore natus maxime dignissimos ipsum dolorum officiis, quam modi delectus architecto corrupti nemo corporis omnis amet sunt nulla voluptatem! Aut autem libero eligendi odio dolorum minus molestias iure inventore? Molestias blanditiis autem eaque minima animi perspiciatis itaque repudiandae a velit? Ducimus tempora quos quaerat laboriosam! Dignissimos ratione, consequuntur dolor exercitationem unde iusto modi aspernatur, ab repudiandae vel maxime velit labore blanditiis natus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</div>
@endsection
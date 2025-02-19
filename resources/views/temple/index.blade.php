<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temple Carousel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<section id="temple" class="templeall">
    <div class="container">
        <h2 class="carousel-title text-center">TEMPLE BY REGION</h2>
        <p class="text-center">ค้นหาข้อมูลวัดตามภูมิภาค</p>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="{{ asset('images/temple.jpg') }}" class="wat">
                        <div class="image-text">ภาคเหนือ</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="{{ asset('images/temple.jpg') }}" class="wat">
                        <div class="image-text">ภาคกลาง</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="{{ asset('images/temple.jpg') }}" class="wat">
                        <div class="image-text">ภาคตะวันออกเฉียงเหนือ</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="{{ asset('images/temple.jpg') }}" class="wat">
                        <div class="image-text">ภาคตะวันตก</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="{{ asset('images/temple.jpg') }}" class="wat">
                        <div class="image-text">ภาคใต้</div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>

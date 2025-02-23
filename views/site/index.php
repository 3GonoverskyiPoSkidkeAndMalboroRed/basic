<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Carousel;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"><span class="fs-2">Портал клининговых услуг</span> <span class=" fw-medium">«Мой Не Сам»</span> </h1>


    </div>

    <div class="body-content">
        <h2 class='text-center border-bottom'>
            Мы всю работу сделаем за ВАС!!!
        </h2>
        <div id="carouselExampleCaptions" class="carousel slide mb-5">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/home.jpeg" class="img-slide d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-opacity-50 bg-dark">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/milk.jpg" class="img-slide d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block  bg-opacity-50 bg-dark">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/milk2.jpg" class="img-slide d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-opacity-50 bg-dark">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/home2.jpeg" class="img-slide d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-opacity-50 bg-dark">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <?php
            echo Carousel::widget([
                'items' => [
                    // the item contains only the image
                    // '<img class="img-slide d-block w-100" src="img/home.jpeg"/>',
                    // '<img class="img-slide d-block w-100" src="img/milk.jpg"/>',
                    // '<img class="img-slide d-block w-100" src="img/home2.jpeg"/>',
                    // '<img class="img-slide d-block w-100" src="img/milk2.jpg"/>',

                    // equivalent to the above
                    // ['content' => '<img src="https://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"/>'],
                    // // the item contains both the image and the caption
                    [
                        'content' => '<img class="img-slide d-block w-100" src="img/home.jpeg" alt="alt image"/>',
                        'caption' => '<h4>This is title slide #1</h4><p>This is the caption text</p>',
                        'captionOptions' => ['class' => ['d-none', 'd-md-block bg-opacity-50 bg-dark']]
                        // 'options' => [...],
                    ],
                    [
                        'content' => '<img class="img-slide d-block w-100" src="img/milk.jpg"  alt="alt image"/>',
                        'caption' => '<h4>This is title slide #2</h4><p>This is the caption text</p>',
                        'captionOptions' => ['class' => ['d-none', 'd-md-block bg-opacity-50 bg-dark']]
                        // 'options' => [...],
                    ],
                    [
                        'content' => '<img class="img-slide d-block w-100" src="img/home2.jpeg" alt="alt image"/>',
                        'caption' => '<h4>This is title slide #3</h4><p>This is the caption text</p>',
                        'captionOptions' => ['class' => ['d-none', 'd-md-block bg-opacity-50 bg-dark']]
                        // 'options' => [...],
                    ],
                    [
                        'content' => '<img class="img-slide d-block w-100" src="img/milk2.jpg" alt="alt image"/>',
                        'caption' => '<h4>This is title slide #4</h4><p>This is the caption text</p>',
                        'captionOptions' => ['class' => ['d-none', 'd-md-block bg-opacity-50 bg-dark']]
                        // 'options' => [...],
                    ],
                    
                ]
            ]);
        ?>

        <div class='d-flex justify-content-start align-items-end'>
            <img src="img/milk.jpg" class="d-block w-50" alt="..."> 
            <div class='fs-2 ms-5'>text image</div>
        </div>    
        <div class='d-flex justify-content-end align-items-end'>
            <div class='fs-2 ms-5'>text image</div>
            <img src="img/milk.jpg" class="d-block w-50" alt="..."> 
        </div>    

        <div class='d-flex flex-column w-50 justify-content-center'>
            <img src="img/milk.jpg" class="d-block  rounded-circle" alt="..."> 
            <div class='text-center fs-2 ms-5'>text image</div>
        </div>
    </div>
</div>
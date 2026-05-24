@extends('layouts.app')

@section('title', 'تواصل معنا')

<head>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>    
@section('content')

<section class="contact-hero">

    <div class="container">

        <div class="text-center hero-content">

            <span class="contact-badge">
                تواصل معنا
            </span>

            <h1>
                نحن هنا لخدمتك دائمًا
            </h1>

            <p>
                فريق مستشفى الوكيل جاهز للرد على جميع استفساراتكم
                وتقديم الدعم الكامل لكم في أي وقت.
            </p>

        </div>

    </div>

</section>

<section class="contact-section py-5">

    <div class="container">

        <div class="row g-4">

            
            <div class="col-lg-5">

                <div class="contact-info-card">

                    <h3 class="mb-4 fw-bold">
                        معلومات التواصل
                    </h3>

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>
                            <h6>العنوان</h6>

                            <p>
                                القاهرة - مصر
                            </p>
                        </div>

                    </div>

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div>
                            <h6>رقم الهاتف</h6>

                            <p>
                                +20 100 000 0000
                            </p>
                        </div>

                    </div>

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>
                            <h6>البريد الإلكتروني</h6>

                            <p>
                                support@example.com
                            </p>
                        </div>

                    </div>

                    <div class="contact-item">

                        <div class="contact-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <div>
                            <h6>مواعيد العمل</h6>

                            <p>
                                السبت - الخميس <br>
                                9:00 ص - 6:00 م
                            </p>
                        </div>

                    </div>

                    <div class="social-links mt-4">

                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    </div>

                </div>

            </div>

           
            <div class="col-lg-7">

                <div class="contact-form-card">

                    <h3 class="fw-bold mb-4">
                        أرسل رسالة
                    </h3>

                    <form>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    الاسم الكامل
                                </label>

                                <input type="text"
                                       class="form-control"
                                       placeholder="ادخل اسمك">

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    البريد الإلكتروني
                                </label>

                                <input type="email"
                                       class="form-control"
                                       placeholder="example@email.com">

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                رقم الهاتف
                            </label>

                            <input type="text"
                                   class="form-control"
                                   placeholder="+20">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                الرسالة
                            </label>

                            <textarea class="form-control"
                                      rows="6"
                                      placeholder="اكتب رسالتك هنا"></textarea>

                        </div>

                        <button class="btn contact-btn">

                            <i class="fa-solid fa-paper-plane ms-2"></i>

                            إرسال الرسالة

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
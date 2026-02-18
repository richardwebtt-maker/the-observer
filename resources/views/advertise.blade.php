@extends('layouts.app')

@section('title', 'Advertise')

@section('content')


<style>
    .advertise-info-section {
        padding: 40px 20px;
        border-radius: 8px;
        max-width: 800px;
        margin: 0 auto;
    }

    .advertise-info-main {
        margin-top: 20px;
    }

    .advertise-info-section h3 {
        margin-bottom: 20px;
        justify-self: center;
    }

    .advertise-info-section h4 {
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .advertise-info-section i {
        font-size: 24px;
        color: var(--primary-color);
        margin-right: 10px;
    }
</style>
<main class="main">

    <!-- New Hero Section -->
    <br>
    <br>
    <br>
    <br>
    <section class="advertise-info-section">
        <h2 class="text-center mb-4">Advertise With Us</h2>

        <div class="advertise-info-main">
            <h3>
                Reach real people. Grow real visibility.
            </h3>

            <h4>Why partner with us?</h4>

            <i class="bi bi-eye"></i> Guaranteed exposure.<br>
            Your business is seen by thousands of engaged viewers and growing.
            <br><br>
            <i class="bi bi-wrench-adjustable-circle-fill"></i> We handle the production.<br>
            No need to create anything yourself.
            We produce your video, audio and digital advertisements professionally.
            <br><br>
            <i class="bi bi-card-checklist"></i> Multi-platform reach <br>
            Your promotion doesn’t live in one place.<br>
            You’ll be featured:
            <br>
            On our website
            <br>
            During the show
            <br>
            Across partner platforms where your audience awaits!
            <br><br>
            <i class="bi bi-currency-dollar"></i> Professional presence without premium pricing.<br>
            High-quality advertising at reasonable, accessible rates designed for real businesses.
            </h3>
        </div>
    </section>

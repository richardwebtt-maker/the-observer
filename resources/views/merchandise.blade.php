@extends('layouts.app')

@section('title', 'Home')

@section('content')


<style>

    .merch-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.8rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .merch-item {
        cursor: pointer;
        text-align: center;
        transition: transform .25s ease, box-shadow .25s ease;
        max-width: 280px;
        border-radius: 10px;
    }

    .merch-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
    }

    .merch-item:hover .merch-thumb::after {
        content: "Click to Request";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .5);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        border-radius: 10px;
        font-family: var(--nav-font);
    }

    .merch-thumb {
        position: relative;
    }


    .merch-thumb {
        aspect-ratio: 4 / 5;
        border-radius: 10px;
        overflow: hidden;
        background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color), transparent 90%) 15%, color-mix(in srgb, var(--contrast-color), transparent 50%) 100%);
    }

    .merch-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .merch-title {
        margin-top: .6rem;
        font-weight: 600;
    }

    .merch-sizes {
        font-size: .85rem;
        opacity: .8;
        font-family: var(--nav-font);
    }

    .placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #222, #111);
    }

    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .7);
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .modal p {
        color: var(--default-color);
        font-family: var(--nav-font);
    }
</style>
<main class="main">

    <!-- New Hero Section -->
    <br>
    <br>
    <br>
    <br>
    <section class="merch-grid-section">
        <h2 class="text-center mb-4">Available Merchandise</h2>

        <div class="merch-grid">

            @php
            $sizes = "S • M • L • XL • XXL";
            @endphp

            @foreach([
            ['img' => 'observer black polo.png', 'name' => 'Observer Black Polo'],
            ['img' => 'observer blue polo.png', 'name' => 'Observer Blue Polo'],
            ['img' => 'observer white polo.png', 'name' => 'Observer White Polo'],
            ['img' => 'observer grey polyester polo.png', 'name' => 'Observer Grey Polyester Polo'],
            ['img' => 'observer blue polyester polo.png', 'name' => 'Observer Blue Polyester Polo'],
            ['img' => 'observer purple polyester polo.png', 'name' => 'Observer Purple Polyester Polo'],
            ] as $item)

            <div class="merch-item open-shirt-modal" data-img="{{ asset('assets/img/'.$item['img']) }}"
                data-name="{{ $item['name'] }}">

                <div class="merch-thumb">
                    <img src="{{ asset('assets/img/'.$item['img']) }}" alt="{{ $item['name'] }}">
                </div>

                <h5 class="merch-title">{{ $item['name'] }}</h5>
                <p class="merch-sizes">Sizes: {{ $sizes }}</p>

            </div>
            @endforeach

            <!-- Coming soon card -->
            <div class="merch-item coming-soon">
                <div class="merch-thumb placeholder"></div>
                <h5 class="merch-title">More Merch Coming Soon</h5>
                <p class="merch-sizes">Stay tuned</p>
            </div>

        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("shirtModal");
    const modalImg = document.getElementById("modalImage");
    const shirtNameInput = document.getElementById("shirtNameInput");
    const requestBtn = document.getElementById("requestBtn");
    const form = document.getElementById("shirtRequestForm");
    const closeBtn = document.querySelector("#shirtModal .close");

    // OPEN MODAL FROM MERCH ITEM
    document.querySelectorAll(".open-shirt-modal").forEach(item => {
        item.addEventListener("click", () => {

            const img = item.dataset.img;
            const name = item.dataset.name;

            modal.style.display = "flex";
            modalImg.src = img;
            shirtNameInput.value = name;

            // reset UI state
            form.style.display = "none";
            requestBtn.style.display = "block";
            form.reset();
        });
    });

    // SHOW REQUEST FORM
    requestBtn.addEventListener("click", () => {
        requestBtn.style.display = "none";
        form.style.display = "block";
    });

    // CLOSE BUTTON
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // CLICK OUTSIDE CLOSE
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

});
    </script>

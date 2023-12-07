@extends('layouts.app')

@section('content')
<main class="main-page">
    <div class="main-text-div">
        <h1 class="main-h1">Change background using AI - free and in HD</h1>
        <label class="main-text-label">Automatically - Fast - Free and Easy</label>
        <img src="https://remove-bg.ai/images/hero_remove_bg_static_banner.png" style="width: 800px; height: 400px;" alt="Remove BG Image">
    </div>
    <div class="form-upload">
        <form action="{{ route('change-bg-submit') }}" method="POST" class="d-flex flex-column align-items-center" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <label class="upload-image flex-row d-flex">
   <span class="inline-flex">
                <div class="inline-block text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="me-3" width="36" height="36" fill="currentColor"  viewBox="0 0 16 16" id="IconChangeColor"> <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" id="mainIconPathAttribute" fill="#ffffff"></path> <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" id="mainIconPathAttribute" fill="#ffffff"></path> </svg>
                </div>
            </span>
                <input  accept="image/*" type="file" name="image">
            </label>
            <hr>

            <label class="upload-image flex-row d-flex">
   <span class="inline-flex">
                <div class="inline-block text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" viewBox="0 0 256 256" id="IconChangeColor" height="45" width="45"><rect width="256" height="256" fill="none"></rect><rect x="40" y="88" width="128" height="128" rx="8" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></rect><line x1="160" y1="40" x2="144" y2="40" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><path d="M200,40h8a8,8,0,0,1,8,8v8" fill="#ffffff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" id="mainIconPathAttribute"></path><line x1="216" y1="112" x2="216" y2="96" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><path d="M200,168h8a8,8,0,0,0,8-8v-8" fill="#ffffff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" id="mainIconPathAttribute"></path><path d="M104,40H96a8,8,0,0,0-8,8v8" fill="#ffffff" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" id="mainIconPathAttribute"></path><path d="M208,40H96a8,8,0,0,0-8,8V88h72a8,8,0,0,1,8,8v72h40a8,8,0,0,0,8-8V48A8,8,0,0,0,208,40Z" opacity="0" id="mainIconPathAttribute" fill="#ffffff"></path></svg>
                </div>
            </span>
                <input  accept="image/*" type="file" name="background">
            </label>
            <hr>

            <button type="submit" class="upload-image flex-row d-flex">
            <span class="inline-flex">
                <div class="inline-block text-white">
                     <svg class="w-full h-full ms-2" width="30" height="30" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5561 8.11084L9.00009 11.6668L5.44409 8.11084" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9 1V11.67" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 13.4438C17 14.387 16.6254 15.2914 15.9585 15.9583C15.2916 16.6252 14.3871 16.9998 13.444 16.9998H4.556C3.61289 16.9998 2.70841 16.6252 2.04153 15.9583C1.37465 15.2914 1 14.387 1 13.4438" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </div>
            </span>
                <label class="ms-3 text-bold">Download new image</label>
            </button>
            <div class="instuction">
                <label class=" main-text-label fs-6 ms-4 mt-1">You select image and background and press "Download new image" and you get new picture with changed background</label>
            </div>
        </form>
    </div>

</main>
@endsection

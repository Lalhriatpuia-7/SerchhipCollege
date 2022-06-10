<x-layout>
    <x-highlight />

    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Syllabus</h1>
                <br>
            </div>
            <div class="streamouter-box">
                @foreach ($syllabus as $syllabi)
                    <div class="streambox " style="overflow: hidden">
                        <img src="/storage/Defaulted and Hardcoded/Chemistryimg.jpg"
                            style="object-fit:cover; height:400px;">
                        <div class="streambox-text title-text"><a href=""> {{ $syllabi->name }}</a></div>
                        <div class="subject-text" style=""><a href="">{{ $syllabi->description }}</a></div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>

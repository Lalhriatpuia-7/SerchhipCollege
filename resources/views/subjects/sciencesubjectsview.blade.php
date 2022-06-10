<x-layout>
    <x-highlight />

    <div class="big-box" style="align-content: center">
        <div>
            <div class="" style="margin-top:40px">
                <br>
                <h1 class="title-head">Academic Stream</h1>
                <br>
                <br>
                <h1 class="title-head">Science</h1>
                <br>
            </div>
            <div class="streamouter-box">
                @foreach ($categoriesscience as $category)
                    <div class="streambox " style="overflow: hidden">
                        <img src="/storage/Defaulted and Hardcoded/Chemistryimg.jpg"
                            style="object-fit:cover; height:400px;">
                        <div class="streambox-text title-text"><a href=""> {{ $category->name }}</a></div>
                        <div class="subject-text" style=""><a href="">{{ $category->description }}</a></div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>
